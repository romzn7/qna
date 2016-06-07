<?php

namespace App\Http\Controllers\users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Requests\CreateUserRequest;
use App\Http\Controllers\Controller;
use App\User;



class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(CreateUserRequest $request, User $user)
    {
        if($request['password'] == $request['password_confirmation']){
            $password = bcrypt($request['password']);
            $user->username = $request->username;
            $user->password = $password;
            $user->save();
            return redirect()->route('home')->with(['success' => 'You have been registered successfully']);
        }else{
            return redirect()->route('register')->with(['error' => "Password do not match"]);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }

    public function getLogin(){

        return view('users.login');
    }

    public function postLogin(Request $request){
        $username = $request->username;
        $password = $request->password;

        if(!Auth::attempt(['username' => $username, 'password' => $password])){
            return redirect()->back()->with(['fail' => 'Invalid Username/ Password']);
        }
        return redirect()->route('home')->with(['success' => 'You have been Logged In']);
              
    }

    public function getLogout(){
        if(Auth::check()){
            Auth::logout();
            return redirect()->route('home');
        }
    }
}
