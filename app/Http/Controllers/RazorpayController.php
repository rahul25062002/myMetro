<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Auth;
class RazorpayController extends Controller
{

    public function razorpay(Request $request){
        //dd($request->all());
        if(isset($request->razorpay_payment_id) && $request->razorpay_payment_id != '')
        {
        $api= new Api(env('RAZORPAY_KEY'),env('RAZORPAY_SECRET'));
        $payment =$api->payment->fetch($request->razorpay_payment_id);
        $response=$payment->capture(array('amount'=>$payment->amount));

        $payment= new Payment();
        $payment->payment_id = $response['id'];
        $payment->product_name = $response['notes']['product_name'];
        $payment->quantity = $response['notes']['quantity'];
        $payment->amount = $response['amount']/100;
        $payment->currency = $response['currency'];
        $payment->customer_name = $response['notes']['customer_name'];
        $payment->customer_email = $response['notes']['customer_email'];
        $payment->payment_status = $response['status'];
        $payment->payment_method = 'Razorpay';
        $id=Auth::id();
        $payment->user_id=$id;
        $payment->save();
        return redirect()->route('success',['id'=>$id]);
        }
        else
        {
            return redirect()->route('cancel');
        }
    }

    public function success($id){
        $data=Payment::where('user_id',$id)->GET();
        return view('paysuccessfull',['data'=>$data]);
    }
    public function cancel(){
        return "Payment Cancel";
    }
}
