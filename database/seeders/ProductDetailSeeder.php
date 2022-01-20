<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('product_detail')->insert([
            [
                'product_id'=>1,
                'desc'=>'Indomie Enak dan Mantap',
                'stock'=>'10',
                'price'=>500000
            ],
            [
                'product_id'=>2,
                'desc'=>'Indomie Enak dan Mantap',
                'stock'=>'15',
                'price'=>1000000
            ],
            [
                'product_id'=>3,
                'desc'=>'Indomie Enak dan Mantap',
                'stock'=>'12',
                'price'=>750000
            ],
            [
                'product_id'=>4,
                'desc'=>'Indomie Enak dan Mantap',
                'stock'=>'5',
                'price'=>100000
            ],
            [
                'product_id'=>5,
                'desc'=>'Indomie Enak dan Mantap',
                'stock'=>'11',
                'price'=>125000
            ],
            [
                'product_id'=>6,
                'desc'=>'Indomie Enak dan Mantap',
                'stock'=>'20',
                'price'=>150000
            ],
            [
                'product_id'=>7,
                'desc'=>'JIndomie Enak dan Mantap',
                'stock'=>'3',
                'price'=>30000
            ],
            [
                'product_id'=>8,
                'desc'=>'Indomie Enak dan Mantap',
                'stock'=>'5',
                'price'=>90000
            ],
            [
                'product_id'=>9,
                'desc'=>'Indomie Enak dan Mantap',
                'stock'=>'1',
                'price'=>75000
            ],
        ]);
    }
}
