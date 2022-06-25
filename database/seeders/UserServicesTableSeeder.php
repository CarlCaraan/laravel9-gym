<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_services')->insert(
            [
                [
                    'id' => "1",
                    'title' => "Personal Training",
                    'body' => "Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.",
                    'image' => NULL,
                    'background' => NULL,
                ],
                [
                    'id' => "2",
                    'title' => "Weight Lifting",
                    'body' => "Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.",
                    'image' => NULL,
                    'background' => NULL,
                ],
                [
                    'id' => "3",
                    'title' => "Combat Sports",
                    'body' => "Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.",
                    'image' => NULL,
                    'background' => NULL,
                ]
            ]
        );
    }
}
