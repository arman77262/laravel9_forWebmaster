<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Image;

class AboutController extends Controller
{
    public function Index(){
        $aboutPage = About::find(1);
        return view('admin.about_all_page.about_all', compact('aboutPage'));
    }

    public function AboutUpdate(Request $request){
        $about_id = $request->id;

        if($request->file('about_image')){
            $image = $request->file('about_image');
            $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(523,605)->save('upload/about_slider/'.$image_name);
            $save_url = 'upload/about_slider/'.$image_name;

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_dis' => $request->short_dis,
                'long_dis' => $request->long_dis,
                'about_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'About update with image',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }else{
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_dis' => $request->short_dis,
                'long_dis' => $request->long_dis,
            ]);

            $notification = array(
                'message' => 'About update without image',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }

    }
}
