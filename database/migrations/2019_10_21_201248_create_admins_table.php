<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nickname')->comment('昵称');
            $table->string('account')->comment('帐号');
            $table->string('password')->comment('密码');

            $table->timestamps();
            $table->softDeletes();
        });

        // Create Root Administrator Account
        $admin = new \App\Models\Admin();
        $admin->nickname    =  config('system.admin.root.nickname');
        $admin->account     =  config('system.admin.root.account');
        $admin->password    =  bcrypt(config('system.admin.root.password'));
        $admin->save();

        $admin->assignRole('admin.root');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
