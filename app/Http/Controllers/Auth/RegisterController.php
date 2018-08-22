<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            // 'password' => Hash::make($data['password']),
            'password' => md5(rand(1,10000)),
            'phone' => $data['phone'],
            'child_name' => $data['child_name'],
            'child_date' => $data['child_date'],
            'province' => $data['province'],
            'post_code' => $data['post_code'],
            'address' => $data['address'],
            'post_code' => $data['post_code'],
            'join_date' => $data['join_date'],
            'choice' => $data['choice'],
        ]);
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            // 'password' => 'required'
        ]);
        
        

            $data = new Users_play();
            $data->fill($request->all());
            $data->password = md5(rand(1,10000));
            // $data->user_id = Auth::id();
            $data->save();
            $choice = $data->choice;
            $child = $data->child_name;
        
            auth()->login($data);
        
        return redirect()->to('/');
    }
}
