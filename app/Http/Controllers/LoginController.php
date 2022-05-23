<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
                    'isAdmin' => $user->admin,
                    'name' => $user->name
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
        $user = User::get();
        return view('user.profile', [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email
        ]);
    }

    public function saveEditedProfile(Request $request)
    {
        $id = session()->get('userInfo')['id'];
        $request->validate([
            'name'=>'required',
            'email'=> [
                'required',
                'email',
                Rule::unique('users')->ignore($id),
            ],
            'oldpassword'=>'required|min:5|max:20',
            'newpassword'=>'required|min:5|max:20'
        ]);
        $user = User::find($request->input('id'));
        if(Hash::check($request->oldpassword, $user->password)){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->newpassword);
            $user->save();
            $request->session()->put('userInfo', [
                'id' => $user->id,
                'isAdmin' => $user->admin
            ]);
            $user = User::get();
            return view('user.profile', [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email
            ])->with(['success' => 'Password changed.']);
        }
        else {
            $user = User::get();
            return view('user.profile', [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email
            ])->with(['fail' => 'Password does not match.']);
        }
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
