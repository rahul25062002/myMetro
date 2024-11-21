<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\MetroDetails;
use App\Models\User;
use App\Models\role;
use Illuminate\Support\Facades\Auth;
use App\Models\BookMetro;
use Illuminate\Http\Request;

class MetroControlller extends Controller
{
    function addmetroview(){
        return view('addmetro');
    }


    function bookmetronow($id){
        $data=MetroDetails::where('id',$id)->get();
        return view('/bookmetronow',['data'=>$data]);
    }
    function assigndriver($id){
        return view('assigndriver');
    }

    function adddriverview(){
        return view('adddriver');
    }
    function edit($id){
        $data=MetroDetails::find($id);
        return view('metroedit')->with('data',$data);
    }
    function delete($id){
        $data=MetroDetails::find($id);
        $data->delete();
        return redirect('admindashboard');
    }

    function bookmetropay(){
        return view('/bookmetroppay');
    }

    function booknow(Request $request){
        $data=new BookMetro();
        $data->name=$request->name;
        $data->mobilenumber=$request->mobilenumber;
        $data->purpose=$request->purpose;
        $data->date=$request->date;
        $data->days=$request->days;
        $data->save();
        $id=BookMetro::orderBy('id','desc')->first();
        $dt=Bookmetro::where('id',$id->id)->first();
        $email=Auth::User()->email;
        return  view('/bookmetropay',['dt'=>$dt,'email'=>$email]);
    }

    function updatestatus(Request $request){
            $user = Role::find($request->id);
            $user->status = ($user->status + 1) % 4;
            $user->save();
            return redirect()->back();

    }
    function adddriver(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'address'=>'required',
            'adhar'=>'required',
            'city'=>'required',
            'state'=>'required',
            'role'=>'required',
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
        $data->save();


        $emaildata=User::where('email',$request->email)->first();
        $id=$emaildata->id;
        $dt=new role();
        $dt->user_id=$id;
        $dt->adhar=$request->adhar;
        $dt->status=0;
        $dt->rolename=$request->role;

        $dt->save();
        return redirect()->route('/')->with('success','Successfully Registered');
    }

    function addmetro(Request $request){
       $request->validate([
         'metroname'=>'required',
         'metrocode'=>'required',
         'metroline'=>'required',
         'metrocouch'=>'required',
         'stp'=>'required',
         'enp'=>'required',
         'starttime'=>'required',
         'endtime'=>'required'
       ]);
       $exitingcode=MetroDetails::where('metrocode',$request->metrocode)->first();
       if($exitingcode){
           return redirect('/addmetroview')->with('error','This metro code Already Exist');
       }

       $data=new MetroDetails();
       $data->metroname=$request->metroname;
       $data->metrocode=$request->metrocode;
       $data->metroline=$request->metroline;
       $data->metrocouch=$request->metrocouch;
       $data->stp=$request->stp;
       $data->enp=$request->enp;
       $data->starttime=$request->starttime;
       $data->endtime=$request->endtime;
       $data->save();
       return redirect('/admindashboard')->with('success','New Metro Added Successfully');
    }
    function update(Request $request){
       $request->validate([
         'metroname'=>'required',
         'metrocode'=>'required',
         'metroline'=>'required',
         'metrocouch'=>'required',
         'stp'=>'required',
         'enp'=>'required',
         'starttime'=>'required',
         'endtime'=>'required'
       ]);
       $data=MetroDetails::find($request->id);
       $data->metroname=$request->metroname;
       $data->metrocode=$request->metrocode;
       $data->metroline=$request->metroline;
       $data->metrocouch=$request->metrocouch;
       $data->stp=$request->stp;
       $data->enp=$request->enp;
       $data->starttime=$request->starttime;
       $data->endtime=$request->endtime;
       $data->save();
       return redirect('/admindashboard')->with('success','Metro Updated Successfully');
    }
}
