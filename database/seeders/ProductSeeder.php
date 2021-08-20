<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

use App\Models\Product;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //'created_at' => Carbon::now()->format('Y-m-d H:i:s');
        Product::insert([
            'name'          => "Apple",
            'description'   => "red",
            'price'         => 34,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'     => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        
        Product::insert([
            'name'          => "Orange",
            'description'   => "orange",
            'price'         => 25,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'     => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        Product::insert([
            'name'          => "Banana",
            'description'   => "yellow",
            'price'         => 36,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'     => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        Product::insert([
            'name'          => "Strawbarry",
            'description'   => "pink",
            'price'         => 65.34,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'     => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        Product::insert([
            'name'          => "Grapes",
            'description'   => "purple",
            'price'         => 125.98,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'     => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        Product::insert([
            'name'          => "Pomelo",
            'description'   => "peach",
            'price'         => 125.76,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'     => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        Product::insert([
            'name'          => "Dragon Fruit",
            'description'   => "Red",
            'price'         => 34.54,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'     => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        Product::insert([
            'name'          => "Cherry",
            'description'   => "Red",
            'price'         => 76.67,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'     => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        Product::insert([
            'name'          => "Lemon",
            'description'   => "Yellow",
            'price'         => 45.23,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'     => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        Product::insert([
            'name'          => "Avocado",
            'description'   => "Purple",
            'price'         => 45.69,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'     => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        Product::insert([
            'name'          => "Watermelon",
            'description'   => "Green",
            'price'         => 45.69,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'     => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        Product::insert([
            'name'          => "Blackberry",
            'description'   => "Black",
            'price'         => 76.69,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'     => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
