<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('dashboard.index');
    }
    public function userlist()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        //print_r($users);die();
        return view('dashboard.userlist',['users' => $users]);
    }
    public function useredit(Request $request)
    {
        $auths=new User();
        if(!is_null($request->input('name'))) {
            $id=$request->input('id');
            if(!is_null($request->input('password'))) {
                if($request->input('password') != $request->input('cpassword'))
                return redirect('useredit?id='.$id)->with('status', 'error')->with('message','password not match');

                $enpwd = \Hash::make($request->input('password'));
                $auths->updatePassword($enpwd,$id);
            }
            $users1=array();
            $users1[0]=$request->input('name');
            $users1[1]=$request->input('id');
            $users1[2]=$request->input('email');
            $auths->updateUser($users1);
            return redirect('userlist')->with('status', 'Success')->with('message','User Details Updated!');
        } else {
        $id=$request->input('id');
        $users = User::where('id', '=', $id)->get();
        //print_r($users);die();
        return view('dashboard.form',['users' => $users]);
    }
    }
    public function changepassword(Request $request)
    {
        $auths=new User();
            $id=$request->input('ids');
            if(!is_null($request->input('password'))) {
                $id=$request->input('id');
                if($request->input('password') != $request->input('cpassword'))
                return redirect('useredit?id='.$id)->with('status', 'error')->with('message','password not match');

                $enpwd = \Hash::make($request->input('password'));
                $auths->updatePassword($enpwd,$id);
                return redirect('dashboard')->with('status', 'Success')->with('message','Password Sucessfully Changed!');
            }
            return view('dashboard.changepassword',['id'=> $id]);
        
    }
    
}
