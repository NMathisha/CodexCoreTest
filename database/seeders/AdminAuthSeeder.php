<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminAuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('admin')->insert([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=>'password'
        ]);
    }
}


