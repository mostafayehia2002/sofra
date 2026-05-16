<?php

namespace App\Http\Controllers;

use App\Models\PaymentType;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function index(){

        $payments= PaymentType::all();

        return view('payments.payment',compact('payments'));
    }
    public function  store(Request $request){

        $request->validate([
            'payment_name'=>['required','unique:payment_types,name'],
        ]);
        PaymentType::create([
            'name'=>$request->payment_name,
        ]);
        return redirect()->back()->with('success','Successfully Added Payment');
    }
    public function delete($id){
      $payment=PaymentType::findOrFail($id);
      $payment->delete();
        return redirect()->back()->with('success','Successfully Deleted Payment');
    }
    public function update(Request $request){
        $id=$request->id;
        $request->validate([
            'payment_name'=>['required','unique:payment_types,name,'.$id],
        ]);
        $payment=PaymentType::findOrFail($id);
        $payment->update([
            'name'=>$request->payment_name,
            ]);

        return redirect()->back()->with('success','Successfully Updated Payment');
    }
}
