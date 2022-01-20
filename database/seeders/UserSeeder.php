<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'name'=>'Admin',
                'email'=>'admin@admin.com',
                'password'=>bcrypt('admin123'),
                'role'=>2,
                'gender'=>'male'
            ]
        ]);

        
    }
}