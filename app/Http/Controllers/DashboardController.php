<?php

namespace App\Http\Controllers;

use App\Models\MetroDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\role;
use App\Models\station;
use App\Models\Payment;

class DashboardController extends Controller
{
    function driverdashboard()
    {
        return view('/driverdashboard');
    }

    function bookticket(Request  $request){
       $email=Auth::User()->email;
       $nm=Auth::user()->name;
       $dt1=station::where('stationname',$request->startStation)->first();
       $dt2=station::where('stationname',$request->endStation)->first();
        return view('bookticket',['dt1'=>$dt1,'dt2'=>$dt2,'email'=>$email,'nm'=>$nm]);
    }

    function dashboard(){
        $data=MetroDetails::all();
        $dt=station::all();
        return view('dashboard',['data'=>$data,'dt'=>$dt]);
    }
    function admindashboard(){
        $data=MetroDetails::all();
        return view('admindashboard',['data'=>$data]);
    }
    function trash(){
        $data=MetroDetails::onlyTrashed()->get();
        return view('trash',['data'=>$data]);
    }

    function paysuccessfull(){
        $id=Auth::id();
        $data=Payment::where('user_id',$id)->get();
        return view('paysuccessfull',['data'=>$data]);
    }

    public function restore($id){
            $data=MetroDetails::withTrashed()->find($id);
            $data->restore();
            return redirect()->back();
    }

    public function permanentdelete($id){
        $data=MetroDetails::withTrashed()->find($id);
        $data->forcedelete();
        return redirect()->back();
    }

    function addstation(){
        return view('addstation');
    }

    function bookmetro(){
        $data=MetroDetails::all();
        return view('bookmetro',['data'=>$data]);
    }
    function adminview(){
        return view('adminregistration');
    }

    function approvedriver(){

        $data = User::with('getrole')->get();
        return view('approvedriver',['data'=>$data]);
    }

    function showstation(){

        $data=station::all();
        return view('/showstation',['data'=>$data]);
    }

    function addedstation(Request $request){

        $request->validate([
            'stationname'=>'required',
            'stationcode'=>'required'
        ]);
        $stationcode=station::where('stationcode',$request->stationcode)->first();
        if($stationcode){
            return back()->with('error','Code  is Already Exist');
        }
        $data= new station();
        $data->stationname=$request->stationname;
        $data->stationcode=$request->stationcode;
        $data->save();
        return back()->with('success','Station Added Successfully');
    }
    function registered(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'pincode'=>'required',
            'role'=>'required'

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
        $data->save();


        $emaildata=User::where('email',$request->email)->first();
        $id=$emaildata->id;
        $dt=new role();
        $dt->user_id=$id;
        $dt->rolename=$request->role;
        $dt->save();
        return redirect()->route('/adminview')->with('success','Added Successfully');
    }

}

