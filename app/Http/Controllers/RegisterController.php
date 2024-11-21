<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\role;
use App\Events\SendMails;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Str;
class RegisterController extends Controller
{
    function register(){
        return view('register');
    }

    function signup(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'pincode'=>'required'

        ]);

        $exitingemail=User::where('email',$request->email)->first();
        if($exitingemail){
            return redirect('/register')->with('error','Email is already Registered');
        }

        $data=new User();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->password=Hash::make($request->password);
        $data->address=$request->address;
        $data->city=$request->city;
        $data->state=$request->state;
        $data->pincode=$request->pincode;
       // $data->remember_token=Str::random(7);
        $data->save();

        $emaildata=User::where('email',$request->email)->first();
        $id=$emaildata->id;
        $dt=new role();
        $dt->user_id=$id;
        $dt->save();
        Event::dispatch(new SendMails($id));
        return redirect()->route('/')->with('success','Successfully Registered');
    }
}
