<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\role;
use App\Events\SendMails;
use Illuminate\Support\Facades\Event;

class LoginController extends Controller
{
    function login(Request $request){

        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $data=$request->only('email','password');

        if(Auth::attempt($data)){
            $id=Auth::user()->id;
            $name=Auth::user()->name;
           $role=role::where('user_id',$id)->first();
           $rolecode=$role->rolename;
           $status=$role->status;
           if($rolecode=='Admin')
           {
            if($status==1)
            {
                Event::dispatch(new SendMails($id));
            return redirect('/admindashboard')->with('success', "Welcome back, $name! Login successfully.")->with('name',$name);
            }
            else if($status==0)
            {
                Auth::logout();
                return back()->with('success',"You are in Waiting");
            }
            else if($status==2)
            {
                Auth::logout();
                return back()->with('error',"You are Blocked ");
            }
            else if($status==3)
            {
                Auth::logout();
                return back()->with('success',"You Request is Cancelled");
            }
            else
            {
                Auth::logout();
                return back()->with('success',"Not Available data");
            }
        }
           else if($rolecode =='Driver')
           {
            if($status==1)
            {
                Event::dispatch(new SendMails($id));
            return redirect('/driverdashboard')->with('success', "Welcome back, $name! Login successfully.")->with('name',$name);
            }
            else if($status==0)
            {
                Auth::logout();
                return back()->with('success',"You are in Waiting");
            }
            else if($status==2)
            {
                Auth::logout();
                return back()->with('error',"You are Blocked ");
            }
            else if($status==3)
            {
                Auth::logout();
                return back()->with('success',"You Request is Cancelled");
            }
            else
            {
                Auth::logout();
                return back()->with('success',"Not Available data");
            }
        }

           else
           {
            if($status==1)
            {
                Event::dispatch(new SendMails($id));
            return redirect('/dashboard')->with('success', "Welcome back, $name! Login successfully.")->with('name',$name);
            }
            else if($status==0)
            {
                Auth::logout();
                return back()->with('success',"You are in Waiting");
            }
            else if($status==2)
            {
                Auth::logout();
                return back()->with('error',"You are Blocked ");
            }
            else if($status==3)
            {
                Auth::logout();
                return back()->with('success',"You Request is Cancelled");
            }
            else
            {
                Auth::logout();
                return back()->with('success',"Not Available data");
            }
           }

        }
    }
    function logout(){
        Auth::logout();
        return redirect('/')->with('success','Logout Successfully');
    }
}
