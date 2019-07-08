<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationsTable extends Migration
{
    /**
     * マイグレーション実行.
     */
    public function up()
    {
        Schema::create('relations', function (Blueprint $table) {
            $table->increments('id')->comment('関連ID');
            $table->integer('cover_id')->nullable()->comment('表紙ID');
            $table->integer('share_id')->nullable()->comment('共有ID');
            $table->integer('minute_id')->nullable()->comment('議事録ID');
        });
    }

    /**
     * マイグレーションを戻す.
     */
    public function down()
    {
        Schema::drop('relations');
    }
}
