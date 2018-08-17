<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use File;
use Image;
use Illuminate\Support\Facades\Validator;

class PhotoController extends Controller
{
    //
     public function uploadpic(Request $request)
    {
        // dd($request->image);
 

        $validator = Validator::make($request->all(), [
                    'image'   =>  'required |nullable',
                ]);

        if ($validator->fails())
        {
            return back()->with('warning', 'กรุณาเลือกรูปของท่าน ก่อนเข้าร่วมกิจกรรม');
        }else{

                $image_name=str_random(10);
                $thumbnailImage = Image::make($request->image);
                $thumbnailImage->save('images/imgs/'.$image_name.'.png');
                $imagemodel= new Photo();
                // $imagemodel->user_id=Auth::id();
                // $imagemodel->fbid=$fbid;
                // $imagemodel->fb_name=Auth::user()->fb_name;
                // $imagemodel->descrition=$request->desc;
                $imagemode->image_id =22 ; 
                $imagemodel->image = $image_name.'.png';
                $imagemodel->save();
        }

        return redirect('share')->with('success', 'Your images has been successfully Upload');
  }

}
