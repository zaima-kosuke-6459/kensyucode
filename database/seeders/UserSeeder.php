<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        //constにて登録処理
        const USERS = [
            ['name' => '中島 みすず','email' => 'j85b50@oihriv.com', 'tel' => '07089639580', 'address' => '東京都リスキル市8-1-1'],
            ['name' => '石川 厚子','email' => 'a3rkfapk8y012@frlklngdy.net', 'tel' => '07093350023', 'address' => '東京都リスキル市5-4-1'],
            ['name' => '石川 陽二','email' => 'vniff6u@ugfqqppce.co.jp', 'tel' => '07098139120', 'address' => '東京都リスキル市5-4-1'],
            ['name' => '田中 あゆ子','email' => 'vcwk_@iosge.com', 'tel' => '07057231896', 'address' => '東京都リスキル市4-2-8'],
            ['name' => '森 繁之','email' => 'rt1@wdknle.ac.jp', 'tel' => '07058586379', 'address' => '東京都リスキル市4-5-6'],
            ['name' => '伊藤 優花','email' => 'uh2u@mfjyxxksn.net', 'tel' => '07025814708', 'address' => '東京都リスキル市3-4-2'],
            ['name' => '坂本 利枝','email' => 'lke27w137xzx@ghrixu.jp', 'tel' => '07095614670', 'address' => '東京都リスキル市3-4-11'],
            ['name' => '清水 勇作','email' => 'vfk5_p7d@jmeqvpbx.ac.jp', 'tel' => '07025620895', 'address' => '東京都リスキル市4-4-12'],
            ['name' => '山下 孝則','email' => 'iit0aq1vbt6p8zwk@chdloa.ac.jp', 'tel' => '07097711216', 'address' => '東京都リスキル市2-2-10'],
            ['name' => '三浦 仁実','email' => 'yj_fvo@nbfistucv.com', 'tel' => '07068940641', 'address' => '東京都リスキル市3-4-2'],
        ];

    public function run()
    {
        foreach (self::USERS as $user) {
            (new \App\Models\User($user))->save();
        }
    }
}
