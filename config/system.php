<?php

return [
    'admin'         =>  [
        'root'  =>  [
            'nickname'      =>  env('ADMIN_ROOT_NICKNAME', 'ProtavelAdmin'),
            'account'       =>  env('ADMIN_ROOT_ACCOUNT', 'protavel'),
            'password'      =>  env('ADMIN_ROOT_PASSWORD', 'protavel'),
        ],
    ],
    'DbBakup'=>[
        //是否开启备份
        'ENABLE'=>true,
        //mysqldump的配置，包含路径、指定用户、密码
        'MYSQLDUMP'=>[
            'path'=>'mysqldump',
            'user'=>env('DB_USERNAME'), //mysqldump使用的用户名、密码，可另外配置
            'pwd'=>env('DB_PASSWORD'),
            'options'=>'--opt',      //选项，默认为--opt
        ],
        //定期执行的日期，可以设置的配置有month 月份,dayofmonth 日,dayofweek 周几(周一到周日为1到7),hour 小时,minue 分钟
        //值可以设置为三种情况:*为通配符任意时刻都符合;单个指定值;多个指定值，以英文半角逗号分隔
        //如hour设置为18，表示18点执行；6,18，表示6点和18点都执行
        'SCHEDULEDATE'=>[
            'month'=>'*',
            'dayofmonth'=>'*',
            'dayofweek'=>'*',
            'hour'=>'2',
            'minute'=>'10',
        ],
        //导出的表，不配置导出所有的表
        'INCLUDETBLS'=>['password_resets'],
        //不导出的表
        'EXCLUDETBLS'=>['failed_jobs'],
        //导出文件是否gzip
        'GZIP'=>[
            'enable'=>true,
            'path'=>'gzip',
        ],
        //备份文件保存的路径
        'DATADIR'=>'/tmp/',
    ],
];