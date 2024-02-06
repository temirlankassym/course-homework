<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $data = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string',
            'password_confirm' => 'required|string'
        ]);

        if($data["password"] === $data["password_confirm"]){
            User::create($data);
            return redirect('/login');
        }
        return view('auth.register',["error"=>"Passwords do not match"]);
    }

    public function login(Request $request){
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $user = User::where("email","$data[email]")->first();

        if(!$user || !Hash::check($data["password"],$user->password))
            return view('auth.login',["error"=>"Password or email is incorrect"]);

        auth()->login($user);
        return view('dashboard',['tasks'=>Task::getTasks(),'weather'=>ApiController::getApiData()]);
    }

    public function logout(){
        auth()->logout();
        return view('welcome');
    }
}
