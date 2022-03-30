<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('authorization.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:20'
        ]);
        $user = User::where('email','=', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId', $user->id);
                return redirect('');
            } else {
                return back()->with('fail','Password does not match.');
            }
        } else {
            return back()->with('fail','This email is not registered.');
        }
    }

    public function showProfile()
    {
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return view('user.profile', compact('data'));
    }

    public function logout()
    {
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('');
        }
        else {
            return redirect('');
        }
    }
}