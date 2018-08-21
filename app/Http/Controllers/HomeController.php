<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Users_play;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fontend.home');
    }

    public function reward()
    {
        return view('fontend.reward');
    }

    public function registers()
    {
        return view('fontend.registers');
    }

    public function store(Request $request)
    {
        try {

            $data = new Users_play();
            $data->fill($request->all());
            $data->save();
            $choice = $data->choice;
            $child = $data->child_name;
        } catch(\exception $e){
            die($e->getMessage());
        }
        return redirect()->route('decorate', compact('choice', 'child'));
    }

    public function decorate(Request $request,$choice,$child)
    {
        // $data = $choice;
        $data2 = $child;

        $image_array  = ['protect.png' , 'activity.png' , 'manage.png' ,'opportunity.png'];
        $image = $image_array[$choice-1];
        return view('fontend.decorate', compact('image', 'data2'));
    }

    public function share()
    {
        return view('fontend.share');
    }

    public function gallery(Request $request)
    {
        $q = Input::get('q');
        $users = Users_play::with('Image')
                            ->when(!empty($q), function($query) use ($q) {
                                return $query->where('child_name', 'LIKE', '%' . $q . '%');
                            })
                            ->paginate(10);
        return view('fontend.gallery', compact('users') );
        // if($q !== ""){
        //     $users = Users_play::where('child_name', 'LIKE', '%' . $q . '%')->paginate(10);
        //     if (count($users) > 0) {
        //         return view('fontend.gallery')->withDetails($users)->withQuery($q);
        //     }
        // }
        // return view('fontend.gallery')->withMessage(" No match found!");

        // $data = Users_play::paginate(10);
        // return view('fontend.gallery', compact('data'));
    }

    public function content()
    {
        return view('fontend.content');
    }
    
    public function result()
    {
        return view('fontend.result');
    }

    public function uploadpic(Request $request)
    {
        return view('fontend.result');
    }
}
