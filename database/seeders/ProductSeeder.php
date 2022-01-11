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
        $product_data = [
            [
            "category_id" => 2,
            "name" => "Samsung A52",
            "description" => "Samsung newest smartphone for mid-end user",
            "price" => 3200000,
            "image_path" => "image/samsung_a52.jpg"
            ],
            [
                "category_id" => 2,
                "name" => "Samsung A21",
                "description" => "Samsung newest smartphone for low-end user",
                "price" => 2500000,
                "image_path" => "image/samsung_a21.jpg"
            ],
            [
                "category_id" => 3,
                "name" => "Lenovo Legion",
                "description" => "Lenovo newest gaming laptop",
                "price" => 15000000,
                "image_path" => "image/lenovo_legion.jpg",
            ],
            [
                "category_id" => 3,
                "name" => "Asus ROG",
                "description" => "A new ROG series laptop by Asus",
                "price" => 25000000,
                "image_path" => "image/asus_ROG.jpg",
            ],
            [
                "category_id" => 1,
                "name" => "Samsung 55 OLED",
                "description" => "Samsung newest OLED television",
                "price" => 20000000,
                "image_path" => "image/samsung_55OLED.jpg",
            ],
            [
                "category_id" => 1,
                "name" => "Samsung 32 HD",
                "description" => "A good television for mid-end consumer",
                "price" => 15000000,
                "image_path" => "image/samsung_32HD.jpg",
            ],
            [
                "category_id" => 2,
                "name" => "Samsung A32",
                "description" => "A mid-end model for a fast 5g capable smartphone",
                "price" => 3000000,
                "image_path" => "image/samsung_32HD.jpg",
            ],
            [
                "category_id" => 3,
                "name" => "Acer Predator",
                "description" => "A low-end gaming laptop for gamer",
                "price" => 11000000,
                "image_path" => "image/acer_predator.jpg",
            ]
        ];

        DB::table("products")->insert($product_data);
    }
}
