<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserSiteInfo;
use App\Models\UserServices;
use App\Models\UserHerosection;
use App\Models\UserFacilities;
use App\Models\UserTrainers;
use App\Models\UserAbout;

class CustomerController extends Controller
{
    public function WelcomeView()
    {
        $data['userSiteInfos'] = UserSiteInfo::first();
        $data['userServices'] = UserServices::get();
        $data['userHerosections'] = UserHerosection::get();
        $data['userFacilities'] = UserFacilities::get();
        $data['userTrainers'] = UserTrainers::get();
        $data['userAbout'] = UserAbout::first();
        return view('welcome', $data);
    }
}
