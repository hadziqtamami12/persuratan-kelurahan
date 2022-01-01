<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('app.users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
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
        $user->email = $request->input('email');
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $Request)
    {
        //
        $user = User::findOrFail($Request->get('id'));
        echo json_encode($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'role' => 'required',
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

        $user = User::find($request->id);
        if($request->input('password')){
            $user->password = $request->input('password');
        }else{
            unset($user->password);
        }
        $user->update($request->all());

        
         if($user){
            return redirect()->route('user')->with(['success' => 'Data Berhasil Terekam!']);
        }else{
            return redirect()->route('user')->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::where('id', $id)
              ->delete();
        return redirect()->route('user')
                        ->with('success','Post deleted successfully');
    }
}
