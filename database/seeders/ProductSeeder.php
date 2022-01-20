<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('product')->insert([
            [
                'category_id'=>2,
                'nama'=>'Indomie Kornet',
                'image'=>'assets/IndomieKornet.jpg'
            ],
            [
                'category_id'=>2,
                'nama'=>'Indomie Polos',
                'image'=>'assets/indomieunikjakarta01.jpg'
            ],
            [
                'category_id'=>2,
                'nama'=>'Indomie Goreng Sosis',
                'image'=>'assets/mie-goreng-sosi.jpg'
            ],
            [
                'category_id'=>1,
                'nama'=>'Indomie sambal matah',
                'image'=>'assets/IndomieKornet.jpg'
            ],
            [
                'category_id'=>1,
                'nama'=>'Indomie Pedas',
                'image'=>'assets/indomieunikjakarta01.jpg'
            ],
            [
                'category_id'=>1,
                'nama'=>'Indomie sambal bawang',
                'image'=>'assets/mie-goreng-sosi.jpg'
            ],
            [
                'category_id'=>2,
                'nama'=>'Indomie Soto',
                'image'=>'assets/IndomieKornet.jpg'
            ],
            [
                'category_id'=>1,
                'nama'=>'Indomie Kari',
                'image'=>'assets/indomieunikjakarta01.jpg'
            ],
            [
                'category_id'=>2,
                'nama'=>'Indomie Goreng',
                'image'=>'assets/mie-goreng-sosi.jpg'
            ],
        ]);
    }
}
