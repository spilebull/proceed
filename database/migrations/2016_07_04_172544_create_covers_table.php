<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoversTable extends Migration
{
    /**
     * マイグレーション実行
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covers', function (Blueprint $table) {
            $table->increments('id')->comment('表紙ID');
            $table->date('date')->comment('日時（年月日）');
            $table->time('start_time')->nullable()->comment('日時（開始時間）');
            $table->time('end_time')->nullable()->comment('日時（終了時間）');
            $table->string('area', 20)->nullable()->comment('場所');
            $table->string('attendee', 255)->nullable()->comment('出席者');
            $table->integer('secretary')->comment('書記');
            $table->string('distribute', 50)->comment('配布先');
            $table->string('doc', 50)->comment('文書名');
            $table->string('doc_no', 50)->comment('文書番号');
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('登録日時');
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->comment('更新日時');
        });
    }

    /**
     * マイグレーションを戻す
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('covers');
    }
}
