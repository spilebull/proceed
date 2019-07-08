<?php

use Illuminate\Database\Seeder;

class CoversTableSeeder extends Seeder
{
    /**
     * 表紙情報.
     */
    public function run()
    {
        DB::table('covers')->truncate();

        DB::table('covers')->insert([
            'date' => '2016-07-05',
            'start_time' => '16:30:00',
            'end_time' => '18:00:00',
            'area' => '渋谷ビル　9B　会議室',
            'attendee' => '5,4,3,2,1',
            'secretary' => '1',
            'distribute' => 'サービスシステム開発部　中島、放送システム課',
            'doc' => '201600021-01-01_放送システム課定例議事録20160705',
            'doc_no' => 'SPA9999M0001-010-201600021',
        ]);
        DB::table('covers')->insert([
            'date' => '2016-07-06',
            'start_time' => '16:30:00',
            'end_time' => '18:00:00',
            'area' => '渋谷ビル　9B　会議室',
            'attendee' => '5,4,3,2,1',
            'secretary' => '2',
            'distribute' => 'サービスシステム開発部　中島、放送システム課',
            'doc' => '201600022-01-01_放送システム課定例議事録20160706',
            'doc_no' => 'SPA9999M0001-010-201600022',
        ]);
        DB::table('covers')->insert([
            'date' => '2016-07-07',
            'start_time' => '16:30:00',
            'end_time' => '18:00:00',
            'area' => '渋谷ビル　9B　会議室',
            'attendee' => '5,4,3,2,1',
            'secretary' => '3',
            'distribute' => 'サービスシステム開発部　中島、放送システム課',
            'doc' => '201600023-01-01_放送システム課定例議事録20160707',
            'doc_no' => 'SPA9999M0001-010-201600023',
        ]);
        DB::table('covers')->insert([
            'date' => '2016-07-08',
            'start_time' => '16:30:00',
            'end_time' => '18:00:00',
            'area' => '渋谷ビル　9B　会議室',
            'attendee' => '5,4,3,2,1',
            'secretary' => '4',
            'distribute' => 'サービスシステム開発部　中島、放送システム課',
            'doc' => '201600024-01-01_放送システム課定例議事録20160708',
            'doc_no' => 'SPA9999M0001-010-201600024',
        ]);
    }
}
