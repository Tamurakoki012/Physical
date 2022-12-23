<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // オーナー
        Player::create([
            'name' => 'オーナー太郎',
            'email' => 'owner@example.com',
            'password' => bcrypt('xxxxxxxx'),
            'role' => 'owner'
        ]);
    
        // お客さん
        Player::create([
            'name' => 'お客花子',
            'email' => 'customer@example.com',
            'password' => bcrypt('xxxxxxxx'),
            'role' => 'customer'
        ]);
    }
}
