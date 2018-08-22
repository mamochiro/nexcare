<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Users_play;
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
                // $user_play = Users_play::where('mail' , Auth::id())->first();
                // $image_id = $user_play->id; 
                // dd( Auth::id() );

                $image_name=str_random(10);
                $thumbnailImage = Image::make($request->image);
                $thumbnailImage->save('images/imgs/'.$image_name.'.png');
                $imagemodel= new Photo();
                $imagemodel->image_id=$request->id;
                $imagemodel->image = $image_name.'.png';
                $imagemodel->save();
                $imageName = 'images/imgs/'.$image_name.'.png' ; 
        }

        return view('fontend.share', [ 'imageName' => $imageName ,
                                        'image_name' => $image_name,
                                        ]);
  }

  public function sharePage($imageName)
    {
          $imageShare = $imageName;

          $imageForShare = $imageName;
          return view('fontend.sharePage', ['imageForShare' => $imageForShare,
                                      ]);
    }

}
