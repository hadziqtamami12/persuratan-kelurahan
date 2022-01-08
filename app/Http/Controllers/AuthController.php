<?php

namespace App\Http\Controllers;

use App\Http\Request\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loginView()
    {
        return view('login/main', [
            'layout' => 'login'
        ]);
    }

    public function registerView()
    {
        return view('login/register', [
            'layout' => 'login'
        ]);
    }

    public function register(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'no_hp' => 'required',
            'gender' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);

        if ($request->hasFile('photo')) {
        $filenameWithExt = $request->file('photo')->getClientOriginalName ();
        // Get Filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just Extension
        $extension = $request->file('photo')->getClientOriginalExtension();
        // Filename To store
        $fileNameToStore = $filename.'_'. 'user'.'.'.$extension;
        $path = $request->file('photo')->storeAs('user', $fileNameToStore, 'public');
        }
        // Else add a dummy photo
        else {
        $path = 'Nophoto.jpg';
        }


        $user = new User;
        $user->name = $request->input('name');
        $user->no_hp = $request->input('no_hp');
        $user->gender = $request->gender;
        $user->role = $request->role;
        $user->active = 1;
        $user->password =  Hash::make($request->input('password'));
        $user->remember_token = Str::random(10);
        $user->photo = $path;
        $user->save();


         if($user){
            return redirect()->route('user')->with(['success' => 'Data Berhasil Terekam!']);
        }else{
            return redirect()->route('user')->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    /**
     * Authenticate login user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        if (!\Auth::attempt([
            'name' => $request->name, 
            'password' => $request->password
        ])) {
            throw new \Exception('Wrong name or password.');
        }
    }

    /**
     * Logout user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        \Auth::logout();
        return redirect('login');
    }
}
