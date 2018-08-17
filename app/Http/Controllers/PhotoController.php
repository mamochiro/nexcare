<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use File;
use Image;
use DB; 
use Auth;
use Illuminate\Support\Facades\Validator;

class PhotoController extends Controller
{
    //
     public function uploadpic(Request $request)
    {
        // dd($request->image);
		 
    	// $imageName = null ; 
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
                $imagemodel->image_id=1;
                $imagemodel->image = $image_name.'.png';
                $imagemodel->save();
    //            DB::table('image_user')->insert([
				//     ['image_id' => 1, 'image' => $image_name.'.png']
				    
				// ]);
                $imageName = 'images/imgs/'.$image_name.'.png' ; 
        }

        return view('fontend.share', [ 'imageName' => $imageName ]);
  }

}
