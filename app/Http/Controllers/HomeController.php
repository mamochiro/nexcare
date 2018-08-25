<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Users_play;
use App\Content;
use Auth;

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
            // dd($request->day);
            $child_date = $request->day . '-' . $request->month . '-' . $request->year ; 

            $data = new Users_play();
            // $data->fill($request->all());
            $data->name = $request->name;
            $data->phone = $request->phone;
            $data->mail = $request->mail;
            $data->child_name = $request->child_name;
            $data->child_date = $child_date;
            $data->address = $request->address;
            $data->post_code=$request->post_code;
            $data->province = $request->province;
            $data->join_date = $request->join_date;
            $data->choice = $request->choice;
    
            // $data->user_id = Null;
            $data->save();
            $choice = $data->choice;
            $child = $data->child_name;
            $id = $data->id ; 
        } catch(\exception $e){
            die($e->getMessage());
        }
        return redirect()->route('decorate', compact('choice', 'child' ,'id'));
    }

    public function decorate(Request $request,$choice,$child,$id)
    {
        // $data = $choice;
        $data2 = $child;
        $id = $id ; 
        $image_array  = ['protect.png' , 'activity.png' , 'manage.png' ,'opportunity.png'];
        $image = $image_array[$choice-1];
        return view('fontend.decorate', compact('image', 'data2' , 'id'));
    }

    public function share()
    {
        return view('fontend.share');
    }

    public function gallery(Request $request)
    {
        $q = Input::get('q');
        $users = Users_play::with('image')
                            ->when(!empty($q), function($query) use ($q) {
                                return $query->where('child_name', 'LIKE', '%' . $q . '%');
                            })
                            ->orderBy('created_at', 'DESC')
                            ->paginate(30);

        $uses = Users_play::all();                 
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
        $contents = Content::all();
        // dd(count($contents));
        return view('fontend.content' , ['contents' => $contents]);
    }
    
    public function result()
    {
        return view('fontend.result');
    }

    public function uploadpic(Request $request)
    {
        return view('fontend.result');
    }

    public function updateUser()
    {
        return view('fontend.update');
    }

    public function update(Request $request)
    {
        try {
            //dd($request->day);
            $child_date = $request->day . '-' . $request->month . '-' . $request->year ; 

            $data = new Users_play();
            // $data->fill($request->all());
            $data->name = $request->name;
            $data->phone = $request->phone;
            $data->mail = $request->mail;
            $data->child_name = $request->child_name;
            $data->child_date = $child_date;
            $data->address = $request->address;
            $data->post_code=$request->post_code;
            $data->province = $request->province;
            $data->join_date = $request->join_date;
            $data->choice = $request->choice;
    
            // $data->user_id = Null;
            $data->save();
            $data->save();
            $choice = $data->choice;
            $child = $data->child_name;
            $user_id = $data->id;
        } catch(\exception $e){
            die($e->getMessage());
        }
        return redirect()->route('decorate', compact('choice', 'child', 'user_id'));
    }
}
