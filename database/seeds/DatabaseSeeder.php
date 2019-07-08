<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * データベース初期値設定実行
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CoversTableSeeder::class);
        $this->call(SharesTableSeeder::class);
        $this->call(MinutesTableSeeder::class);
        $this->call(RelationsTableSeeder::class);
    }
}
