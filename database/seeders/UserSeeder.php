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
        $user_data = [
            [
                "full_name" => "Ben Yuwono",
                "gender" => "male",
                "address" => "Jalan Admin Raya No. 1",
                "email" => "ben@mail.com",
                "password" => bcrypt("admin123"),
                "role" => "admin"]
            ,[
                "full_name" => "Audrey Hall",
                "gender" => "male",
                "address" => "Jalan Admin Raya No. 1",
                "email" => "audrey@mail.com",
                "password" => bcrypt("member123"),
                "role" => "member"
            ]
        ];

        DB::table("users")->insert($user_data);
    }
}
