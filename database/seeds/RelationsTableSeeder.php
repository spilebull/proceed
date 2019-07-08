<?php

use Illuminate\Database\Seeder;

class RelationsTableSeeder extends Seeder
{
    /**
     * 関連情報.
     */
    public function run()
    {
        DB::table('relations')->truncate();

        DB::table('relations')->insert([
            'cover_id' => '1',
            'share_id' => '1',
            'minute_id' => '1',
        ]);
        DB::table('relations')->insert([
            'cover_id' => '2',
            'share_id' => '2',
            'minute_id' => '2',
        ]);
        DB::table('relations')->insert([
            'cover_id' => '3',
            'share_id' => '3',
            'minute_id' => '3',
        ]);
        DB::table('relations')->insert([
            'cover_id' => '4',
            'share_id' => '4',
            'minute_id' => '4',
        ]);
    }
}
