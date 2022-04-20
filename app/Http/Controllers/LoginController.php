<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use DB;

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
                $request->session()->put('userInfo', [
                    'id' => $user->id,
                    'isAdmin' => $user->admin
                ]);
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
        $userid = Session::get('userInfo')['id'];
        $users = DB::table('users')->where('id', $userid)->get();
        foreach($users as $user){
            $id = $user->id;
            $name = $user->name;
            $email = $user->email;
        }
        return view('user.profile')->with('id', $id)->with('name', $name)->with('email', $email);
    }

    public function saveEditedProfile(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $result = DB::table('users')->where('id', $id)->update([
            'name' => $name,
            'email' => $email
        ]);
        return view('user.profile')->with('id', $id)->with('name', $name)->with('email', $email);
    }

    public function logout()
    {
        if(Session::has('userInfo')){
            Session::pull('userInfo');
            return redirect('');
        }
        else {
            return redirect('');
        }
    }
}
