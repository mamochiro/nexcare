<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Users_play;
use App\Photo;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $usersCount   = Users_play::all()->count();
        $photosCount  = Photo::all()->count();
        $choice1  = Users_play::where('choice' , 1 )->count();
        $choice2  = Users_play::where('choice' , 2 )->count();
        $choice3  = Users_play::where('choice' , 3 )->count();
        $choice4  = Users_play::where('choice' , 4 )->count();
        $users = DB::table('users_play')
            ->leftjoin('image_user', 'users_play.id', '=', 'image_user.image_id')
            ->select('users_play.*', 'image_user.image')
            // ->groupBy('users.id')
            ->paginate(50);

        return view('admin.dashboard', [ 
                    'users' => $users ,
                    'photosCount' => $photosCount ,
                    'usersCount' => $usersCount,
                    'choice1' => $choice1,
                    'choice2' => $choice2,
                    'choice3' => $choice3,
                    'choice4' => $choice4,

            ]);
    }

    public function search(Request $request)
    {   
    if($request->search !== null){
        // header('Access-Control-Allow-Origin: *');
        // header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
        // header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
        if($request->ajax())
        {
                $output="";
                // $users=DB::table('users')->where('name','LIKE','%'.$request->search."%")->get();
                $users = DB::table('users_play')
                    ->leftjoin('image_user', 'users_play.id', '=', 'image_user.image_id')
                    ->select('users_play.*', 'image_user.image')
                    ->where('users_play.name','LIKE','%'.$request->search."%")
                    ->get();
                if($users !== null)
                {
                        foreach ($users as $key => $user) {
                            if(isset($user->image)){
                                $view = '<a href="https://www.nexventure2018.com/images/imgs/'.$user->image.'">View</a>' ; 
                            }else{
                                $view = 'ไม่ได้อัพรูป'; 
                            }
                        $output.='<tr>'.                    
                        '<td>'.$user->id.'</td>'.
                        '<td>'.$user->name.'</td>'.                       
                        '<td>'.$user->phone.'</td>'.                     
                        '<td>'.$user->mail.'</td>'.
                        '<td>'.$user->child_name.'</td>'.
                        // '<td>'.$user->child_date.'</td>'. 
                        '<td>'.$user->province.'</td>'. 
                        '<td>'.$user->join_date.'</td>'. 
                        '<td>'.$user->choice.'</td>'.  
                        '<td>'.$view.'</td>'.  
                        '<td>'.'<button type="button" class="btn btn-danger" onclick="del('.$user->id.')">ลบ</button>'.'</td>'.                       
                        '</tr>';                 
                         }        
                
                return Response($output);
               }

            }
        }else{
            if($request->ajax())
            {
            $output="";
                // $allUsers  = User::paginate(5);
                $allUsers = DB::table('users_play')
                    ->leftjoin('image_user', 'users_play.id', '=', 'image_user.image_id')
                    ->select('users_play.*', 'image_user.image')
                    ->paginate(50);
                if($allUsers !== null)
                {
                        foreach ($allUsers as $key => $user) {
                        if(isset($user->image)){
                                $view = '<a href="https://www.nexventure2018.com/images/imgs/'.$user->image.'">View</a>' ; 
                            }else{
                                $view = 'ไม่ได้อัพรูป'; 
                            }
                        $output.='<tr>'.                    
                        '<td>'.$user->id.'</td>'.
                        '<td>'.$user->name.'</td>'.                       
                        '<td>'.$user->phone.'</td>'.                     
                        '<td>'.$user->mail.'</td>'.
                        '<td>'.$user->child_name.'</td>'.
                        // '<td>'.$user->child_date.'</td>'. 
                        '<td>'.$user->province.'</td>'. 
                        '<td>'.$user->join_date.'</td>'. 
                        '<td>'.$user->choice.'</td>'.  
                        '<td>'.$view.'</td>'.
                        '<td>'.'<button type="button" class="btn btn-danger" onclick="del('.$user->id.')">ลบ</button>'.'</td>'.                             
                        '</tr>';                      
                         }        
                
                return Response($output);
               }
           }
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->guest(route( 'admin.login' ));
    }
}