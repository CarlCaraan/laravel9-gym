<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSiteInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_site_infos')->insert([
            'admin_brand' => NULL,
            'admin_brand_mini' => NULL,
            'footer' => "All Rights Reserved &copy; 2022. <i class='mdi mdi-visualstudio text-info'></i> Designed with <i class='fas fa-heart text-danger'></i> by <a href='https://github.com/CarlCaraan'>BSIT 3A WAM</a>.",
        ]);
    }
}
