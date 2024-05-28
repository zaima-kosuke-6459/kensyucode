<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::create([
                'name' => '伊藤滉規',
                'email' => 'ito-hiro@example.com',
                'password' => bcrypt('himitu'),
                'two_factor_secret'=> null,
                'two_factor_recovery_codes'=>null,
                'two_factor_confirmed_at'=>null,
                'created_at'=> new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        \App\Models\Admin::create([
                'name' => '鈴木ひかる',
                'email' => 'hikaru-suzuki@example.com',
                'password' => bcrypt('himituda'),
                'two_factor_secret'=> null,
                'two_factor_recovery_codes'=>null,
                'two_factor_confirmed_at'=>null,
                'created_at'=> new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        \App\Models\Admin::create([
                'name' => '木村歩',
                'email' => 'ayumu-kimura@example.com',
                'password' => bcrypt('himitudayo'),
                'two_factor_secret'=> null,
                'two_factor_recovery_codes'=>null,
                'two_factor_confirmed_at'=>null,
                'created_at'=> new DateTime(),
                'updated_at' => new DateTime(),
        ]);
    }
}
