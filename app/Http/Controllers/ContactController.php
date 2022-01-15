<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use App\Models\Contact;

class ContactController extends Controller
{
    //
    
    //all message list

    public function AllMessage(){
        $messages = Contact::all();
        return view('admin.message.index',compact('messages'));
    }

    public function AddMessage(Request $request){
        $validated = $request->validate([
        'name' => 'required',
        'email' => 'required',
        'subject' => 'required',
        'message' => 'required',
    ]);


    Contact::insert([
        'name' =>$request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' => $request->message,
        'created_at' => Carbon::now()
    ]);
    $notification = array(
                        'message' => 'Message Send successfully | ThankYou :)',
                        'alert-type' => 'success'
                    );

    return Redirect()->route('contact')->with($notification);

    }

    // delete message
    public function DeleteMessage($id){
        Contact::find($id)->delete();
        $notification = array(
                        'message' => 'Message delete successfully',
                        'alert-type' => 'error'
                    );
        return Redirect()->back()->with($notification);

    }
}
