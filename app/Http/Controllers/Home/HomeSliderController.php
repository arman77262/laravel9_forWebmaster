<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlider;
use Image;

class HomeSliderController extends Controller
{
    public function HomeSlider(){

        $homeSlide = HomeSlider::find(1);
        return view('admin.homeslide.home_slider_all', compact('homeSlide'));

    }//end method

    public function UpdateSlider(Request $request){

        $slider_id = $request->id;

        if($request->file('slider_image')){
            $image = $request->file('slider_image');
            $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(636,852)->save('upload/home_slider/'.$image_name);
            $save_url = 'upload/home_slider/'.$image_name;

            HomeSlider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'short_disc' => $request->short_disc,
                'video_url' => $request->video_url,
                'slider_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Slider update with image',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }else{
            HomeSlider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'short_disc' => $request->short_disc,
                'video_url' => $request->video_url,
            ]);

            $notification = array(
                'message' => 'Slider update without image',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }

    }//end method
}
