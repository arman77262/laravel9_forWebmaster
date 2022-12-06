<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlider;

class HomeSliderController extends Controller
{
    public function HomeSlider(){

        $homeSlide = HomeSlider::find(1);
        return view('admin.homeslide.home_slider_all', compact('homeSlide'));

    }//end method
}
