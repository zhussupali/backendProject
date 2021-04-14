<?php

namespace App\Http\Controllers;
// select * from users u, post p where u.id = p.user_id
use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisteredMail;


class BlogController extends Controller
{


    public function index($lang){

        App::setlocale($lang);

//     if(session()->has('name')){
//         $command = "
//         DROP PROCEDURE IF EXISTS `select_by_user_id`;
// delimiter ;;
// CREATE PROCEDURE `select_by_user_id` (IN idx int)
// BEGIN
// 	SELECT * FROM users WHERE id = idx;
// END
//  ;;
// delimiter ;
//         ";
//         $result = DB::connection()->getPdo()->exec($command);

//         return $result;
$id = session('id');
if ($id != null) {
    $post = DB::select('select * from users u, post p where u.id = p.user_id');
    return view('wall',['post'=>$post]);

}
    return redirect('/login');
    }

    public function tweet(Request $req){

        if($req->input('tweetarea')==null) {
            return back();
        }

        DB::table('post')->insert([
            'text' => $req->input('tweetarea'),
            'user_id' => session('id'),
            'created_at' => now()
        ]);  

        return back();
    }
    

    //

    public function login_user(Request $req) {
        // login
        $user = User::where('email', $req->input('email'))->get();
        if (empty($user[0])) { 
            return 'wrong email or you have not registered yet, please relog <a href="login">login</a> ';
        }
        if(CRYPT::decrypt($user[0]->password)==$req->input('password')){
            $req->session()->put('name', $user[0]->name);
            $req->session()->put('id', $user[0]->id);
            return redirect('/wall');
        } else {
            return 'wrong password, please <a href="login">relog</a>';
        }
    }



    public function register_user(Request $req) {
        // register
        $valid = false;

        //valid name check
        
        // return strlen($req->input('name')) >= 3;


        if (strlen($req->input('name')) >= 3 && ctype_alpha($req->input('name'))){
            $valid =  true;
        } else {
            $valid = false;
            return 'invalid namefield. it should contain not less than 3 letters.';
        } 
        
        //valid email check
        if (strlen($req->input('email')) >= 3){
            $valid =  true;
        } else {
            $valid = false;
            return 'invalid email. it should contain not less than 3 letters or numbers.';
        } 


        if (strlen($req->input('password')) >= 3 && !preg_match('/[^A-Za-z0-9]/', $req->input('password'))) {
            //valid password contains only english letters & digits check
            $valid = true;
        } else {
            $valid = false;
            return 'invalid password. it should contain not less than 3 letters or numbers.';
        }

        //password macth check
        if ($req->input('password')==$req->input('confirm')) {
            $valid = true;
        } else {
            $valid = false;
            return "passwords don't match";
        } 

        if ($valid) {
             

            $obj = new \stdClass();
            $obj->name = $req->name;
            Mail::to($req->email)->send(new RegisteredMail($obj));


            DB::table('users')->insert([
                'name' => $req->input('name'),
                'email' => $req->input('email'),
                'password' => CRYPT::encrypt($req->input('password')),
                'created_at' => now(),
                'image_url' => '',
                'remember_token' => $req->input('_token')
            ]); 

            
            
                    // login
        $user = User::where('email', $req->input('email'))->get();
        if (empty($user[0])) { 
            return 'wrong email or you have not registered yet, please relog <a href="login">login</a> or <a href="register">register</a> ';
        }
        if(CRYPT::decrypt($user[0]->password)==$req->input('password')){
            $req->session()->put('name', $user[0]->name);
            $req->session()->put('id', $user[0]->id);
            return redirect('/wall');
        } else {
            return 'wrong password, please <a href="login">relog</a>';
        }
        }
    }



    public function setProfImage(Request $req){
        $userId = session('id');
        $toDelete = DB::table('users')
        ->select('image_url')
        ->where('id', $userId)
        ->get();
        $toDelete = $toDelete[0]->image_url;
        
        $unlinkPath = storage_path('app/'.$toDelete);
        if (file_exists($unlinkPath)) {
            unlink($unlinkPath);
        }
        

        $file = $req->file('file');

        if ($file == null) {
            return back();
        }


        $image_url = $file->store('files');

        DB::table('users')
              ->where('id', $userId)
              ->update(['image_url' => $image_url]
            );
        
        return back();
    }

    public function profileIndex($lang) {
        App::setlocale($lang);

        $userId = session('id');
        if($userId==null){
            return redirect('/login');
        }

        $userInfo = User::where('id', $userId)->get();

        return view('profile',['userInfo'=>$userInfo]);
    }


    public function loginIndex($lang) {
    
        App::setlocale($lang);
    
        if(session()->has('name')){
            session()->pull('name');
            session()->pull('id');
        }
    
        return view("login");
    }


    public function registerIndex($lang) {
    
        App::setlocale($lang);
    
        if(session()->has('name')){
            session()->pull('name');
            session()->pull('id');
        }
    
        return view("register");
    }
}
