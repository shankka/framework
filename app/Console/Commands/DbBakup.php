<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DbBakup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DbBakup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '数据库备份';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $bak_setting = config('system.DbBakup');
        //未开启备份，直接返回
        if (!$bak_setting['ENABLE']) {
            return;
        }

        //判断当前是否需要执行备份任务
        $schedule_setting = $bak_setting['SCHEDULEDATE'];  
        foreach ($schedule_setting as $type=>$setting) {
            //如果设置的值为*，即任意，则不检查
            if ($setting == '*') {
                continue;
            }

            switch ($type) {
                case 'month':
                    $nowval = date('n');
                    break;
                case 'dayofmonth':
                    $nowval = date('j');
                    break;
                case 'dayofweek':
                    $nowval = date('w');
                    break;
                case 'hour':
                    $nowval = date('G');
                    break;
                case 'minute':
                    $nowval = date('i');
                    if ($nowval[0] == '0') {
                        $nowval = $nowval[1];
                    } 
                    break;
            }

            if (strpos(',', $setting)) {
                $setting = explode(',', $setting);

                if (!in_array($nowval, $setting)) {
                    return;
                }
            } else {
                if ($nowval != $setting) {
                    return;
                }
            }
        }

        //拼接mysqldump命令
        $mysqldump_setting = $bak_setting['MYSQLDUMP'];
        $sqlfile = $bak_setting['DATADIR'].env('DB_DATABASE').'_'.date('Ymd.\s\q\l');
        $include_tables = '';
        $exclude_tables = '';
        if ($bak_setting['INCLUDETBLS']) {
            $include_tables = implode(' ', $bak_setting['INCLUDETBLS']);
        }
        if ($bak_setting['EXCLUDETBLS']) {
            $exclude_tbls = [];
            foreach ($bak_setting['EXCLUDETBLS'] as $tbl) {
                $exclude_tbls[] = '--ignore-table='.env('DB_DATABASE').'.'.$tbl;
            }
            $exclude_tables = implode(' ', $exclude_tbls);
        }
        $cmd = sprintf(
                "%s -u%s -p%s -h%s -P%s %s %s %s %s > %s",
                $mysqldump_setting['path'],
                $mysqldump_setting['user'],
                $mysqldump_setting['pwd'],
                env('DB_HOST'),
                env('DB_PORT'),
                $mysqldump_setting['options'],
                env('DB_DATABASE'),
                $include_tables,
                $exclude_tables,
                $sqlfile
                );
        system($cmd);

        if ($bak_setting['GZIP']['enable']) {
            system("{$bak_setting['GZIP']['path']} {$sqlfile}");
        }
    }
}
