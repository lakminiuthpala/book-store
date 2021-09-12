<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'name' => 'Harry Potter',
            'cat_id' => 1,
            'description' => 'Children',
            'qty' => '50',
            'unit_price' => '200.00'

        ]);
        DB::table('books')->insert([
            'name' => 'Matilda',
            'cat_id' => 1,
            'description' => 'Children',
            'qty' => '20',
            'unit_price' => '250.00'

        ]);
        DB::table('books')->insert([
            'name' => 'Jane Eyre',
            'cat_id' => 2,
            'description' => 'Children',
            'qty' => '75',
            'unit_price' => '250.00'

        ]);
    }
}
