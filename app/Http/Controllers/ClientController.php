<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use App\Models\Client;

class ClientController extends Controller
{
    //

  
    
     //show home page Clients

    public function Client(){
        $clients = DB::table('clients')->where('client_name','Web Development')->first();
        $second_client = DB::table('clients')->where('client_name','SEO Expert')->first();
        return view('pages.client',compact('clients','second_client'));
    }

      // all client function 

    public function AllClient(){
        $clients = Client::all();
        return view('admin.client.index',compact('clients'));
    }

    // Add client function 

    public function AddClient(Request $request){
        $validated = $request->validate([
        'client_name' => 'required|unique:clients|min:4',
        'client_text' => 'required',
        'client_image' => 'required|mimes:png,jpg,jpeg',
    ]);
    $client_image = $request->file('client_image');
    $name_gen = hexdec(uniqid());
    $img_ext = strtolower($client_image->getClientOriginalExtension());
    $upload_location = 'image/client/';
    $image_name = $name_gen.'.'.$img_ext;
    $last_img = $upload_location.$image_name;
    $client_image->move($upload_location,$image_name);



    Client::insert([
        'client_name' =>$request->client_name,
        'client_text' => $request->client_text,
        'client_image' => $last_img,
        'created_at' => Carbon::now()
    ]);
$notification = array(
                        'message' => 'client inserted successfully',
                        'alert-type' => 'success'
                    );
    return Redirect()->back()->with($notification);

    }

    //edit client 

    public function Edit($id){
        $clients = Client::find($id);
        return view('admin.client.edit',compact('clients'));
    }

    // update client function

    public function Update(Request $request , $id){
        $validated = $request->validate([
        'client_name' => 'required|min:4',
        'client_text' => 'required',
        
    ]);
    $client_image = $request->file('client_image');
    $old_image = $request->old_image;
    if($client_image){


    $name_gen = hexdec(uniqid());
    $img_ext = strtolower($client_image->getClientOriginalExtension());
    $upload_location = 'image/client/';
    $image_name = $name_gen.'.'.$img_ext;
    $last_img = $upload_location.$image_name;
    $client_image->move($upload_location,$image_name);
    unlink($old_image);

    Client::find($id)->update([
        'client_image' => $last_img,
        'updated_at' => Carbon::now()
    ]);

    return Redirect()->route('all.client')->with('success','client image image updated  successfully');

    }else{
Client::find($id)->update([
        'client_name' =>$request->client_name,
        'client_text' =>$request->client_text,
        'updated_at' => Carbon::now()
    ]);

    return Redirect()->route('all.client')->with('success','client name updated successfully');
    }

    }
}
