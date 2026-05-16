<?php

namespace App\Http\Controllers;

use App\Models\Contact;

class ContactUsController extends Controller
{
    //
    public function index(){
       $contacts=Contact::all();
       $complaintMessage=Contact::where('type','complaint')->count();
        $suggestionMessage=Contact::where('type','suggestion')->count();
        $enquiryMessage=Contact::where('type','enquiry')->count();
        $newMessages = Contact::whereDate('created_at', today())->count();
       return view('contact-us.index',compact('contacts','complaintMessage','suggestionMessage','enquiryMessage','newMessages'));
    }
    public function delete($id){
        $contact=Contact::findOrFail($id);
        $contact->delete();
        return redirect()->back()->with('success', 'Successfully Delete Message');
    }
}
