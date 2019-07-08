<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * 社員情報.
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            'code' => '66709',
            'department' => 'システム統括部　サービスシステム開発部　放送システム課',
            'last_name' => '京河',
            'first_name' => '亘亮',
            'email' => 'k-kyoukawa@usen.co.jp',
            'password' => bcrypt('k-kyoukawa'),
            'is_sec' => '1',
        ]);
        DB::table('users')->insert([
            'code' => '67114',
            'department' => 'システム統括部　サービスシステム開発部　放送システム課',
            'last_name' => '西村',
            'first_name' => '由梨香',
            'email' => 'yur-nishimura@usen.co.jp',
            'password' => bcrypt('yur-nishimura'),
            'is_sec' => '1',
        ]);
        DB::table('users')->insert([
            'code' => '67417',
            'department' => 'システム統括部　サービスシステム開発部　放送システム課',
            'last_name' => '孫',
            'first_name' => '承均',
            'email' => 'se-son@usen.co.jp',
            'password' => bcrypt('se-son'),
            'is_sec' => '1',
        ]);
        DB::table('users')->insert([
            'code' => '66402',
            'department' => 'システム統括部　サービスシステム開発部　放送システム課',
            'last_name' => '小山',
            'first_name' => '哲洋',
            'email' => 'te-koyama@usen.co.jp',
            'password' => bcrypt('te-koyama'),
        ]);
    }
}
