<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMinutesTable extends Migration
{
    /**
     * マイグレーション実行
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minutes', function (Blueprint $table) {
            $table->increments('id')->comment('議事録ID');
            $table->integer('relation_id')->comment('関連ID');
            $table->integer('ticket_id')->nullable()->comment('チケット番号');
            $table->string('tracker', 11)->nullable()->comment('トラッカー');
            $table->string('project', 30)->nullable()->comment('プロジェクト');
            $table->string('subject', 255)->nullable()->comment('題名');
            $table->text('description')->nullable()->comment('説明');
            $table->date('due_date')->nullable()->comment('期日');
            $table->string('category', 11)->nullable()->comment('カテゴリ');
            $table->string('status', 11)->nullable()->comment('ステータス');
            $table->string('assigned_to', 11)->nullable()->comment('担当者');
            $table->string('priority', 11)->nullable()->comment('優先度');
            $table->string('version', 11)->nullable()->comment('バージョン');
            $table->string('author', 11)->nullable()->comment('チケット作成者');
            $table->dateTime('created_on')->nullable()->comment('チケット作成日');
            $table->dateTime('updated_on')->nullable()->comment('チケット更新日');
            $table->date('start_date')->nullable()->comment('開始日');
            $table->integer('done_ratio')->default(0)->nullable()->comment('進捗');
            $table->float('estimated_hours')->nullable()->comment('予定工数');
            $table->integer('parent_id')->nullable()->comment('親チケット番号');
            $table->string('reration_ticket', 255)->nullable()->comment('関連チケット番号');
            $table->string('is_private', 3)->default(0)->nullable()->comment('プライベート');
            $table->date('end_date')->nullable()->comment('終了日');
            $table->text('minute')->nullable()->comment('議事録');
            $table->text('memo')->nullable()->comment('メモ欄');
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
        Schema::drop('minutes');
    }
}
