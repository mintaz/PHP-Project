<?php

use Illuminate\Database\Seeder;

class NhomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nhom')->insert([
            'nhom_ten' => 'Trái Cây Trong Nước',
        ]);
        DB::table('nhom')->insert([
            'nhom_ten' => 'Trái Cây Nước Ngoài',
        ]);
    }
}
