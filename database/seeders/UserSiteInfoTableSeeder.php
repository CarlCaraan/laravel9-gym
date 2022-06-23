<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSiteInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_site_infos')->insert([
            'mobile' => "+63 9559 16 8806",
            'email' => "samgyup@fitness.com",
            'terms' => "<div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>",
            'privacy' => "<div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>",
            'facebook_link' => "https://www.facebook.com/",
            'twitter_link' => "https://www.twitter.com/",
            'linkedin_link' => "https://www.linkedin.com/",
            'instagram_link' => "https://www.instagram.com/",
            'address' => "<div>Brgy Batang Hamog</div>",
            'footer' => "All Rights Reserved &copy; 2022. <i class='mdi mdi-visualstudio'></i> Designed with <i class='fas fa-heart text-danger'></i> by <a href='https://github.com/CarlCaraan'>BSIT 3A WAM</a>.",
        ]);
    }
}
