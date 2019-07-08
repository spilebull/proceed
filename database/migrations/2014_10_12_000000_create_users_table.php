<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * マイグレーション実行.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->comment('社員ID');
            $table->integer('code')->comment('社員番号');
            $table->string('department', 30)->comment('部署名');
            $table->string('last_name', 10)->comment('社員姓');
            $table->string('first_name', 10)->comment('社員名');
            $table->string('email')->unique()->comment('メールアドレス');
            $table->string('password')->comment('パスワード');
            $table->rememberToken()->comment('パスワード保持');
            $table->tinyInteger('is_sec')->default(0)->comment('書記フラグ');
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('登録日時');
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->comment('更新日時');
        });
    }

    /**
     * マイグレーションを戻す.
     */
    public function down()
    {
        Schema::drop('users');
    }
}
