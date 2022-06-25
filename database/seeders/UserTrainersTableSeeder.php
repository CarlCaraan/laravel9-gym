<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTrainersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_trainers')->insert(
            [
                [
                    'id' => "1",
                    'name' => "Johnny Sins",
                    'position' => "Cardio Vascular Expert",
                    'image' => NULL,
                    'facebook_link' => "https://www.facebook.com/",
                    'twitter_link' => "https://www.twitter.com/",
                    'instagram_link' => "https://www.instagram.com/",
                ],
                [
                    'id' => "2",
                    'name' => "Jordiii",
                    'position' => "Weight Lifting Expert",
                    'image' => NULL,
                    'facebook_link' => "https://www.facebook.com/",
                    'twitter_link' => "https://www.twitter.com/",
                    'instagram_link' => "https://www.instagram.com/",
                ],
                [
                    'id' => "3",
                    'name' => "Leana Lovings",
                    'position' => "Mind & Conditioning Expert",
                    'image' => NULL,
                    'facebook_link' => "https://www.facebook.com/",
                    'twitter_link' => "https://www.twitter.com/",
                    'instagram_link' => "https://www.instagram.com/",
                ],
                [
                    'id' => "4",
                    'name' => "Peter Parker",
                    'position' => "Professional Wrestler",
                    'image' => NULL,
                    'facebook_link' => "https://www.facebook.com/",
                    'twitter_link' => "https://www.twitter.com/",
                    'instagram_link' => "https://www.instagram.com/",
                ],
            ]
        );
    }
}
