<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use App\Models\Work;
use Illuminate\Support\Facades\DB;

class WorkController extends Controller
{
    //

     //show home page works

     public function About(){
         $abouts = Work::all();
        $first_works = DB::table('works')->find(1);
        $second_works = DB::table('works')->find(2);
        $third_works = DB::table('works')->find(3);
         return view('pages.about',compact('abouts','first_works','second_works','third_works'));
     }

    public function Work(){
        $works = DB::table('works')->where('work_name','Web Development')->first();
        $second_work = DB::table('works')->where('work_name','SEO Expert')->first();
        return view('pages.work',compact('works','second_work'));
    }

      // all work function 

    public function AllWork(){
        $works = Work::all();
        return view('admin.work.index',compact('works'));
    }

    // Add work function 

    public function AddWork(Request $request){
        $validated = $request->validate([
        'work_name' => 'required|unique:works|min:4',
        'work_text' => 'required',
        'work_image' => 'required|mimes:png,jpg,jpeg',
    ]);
    $work_image = $request->file('work_image');
    $name_gen = hexdec(uniqid());
    $img_ext = strtolower($work_image->getClientOriginalExtension());
    $upload_location = 'image/work/';
    $image_name = $name_gen.'.'.$img_ext;
    $last_img = $upload_location.$image_name;
    $work_image->move($upload_location,$image_name);



    Work::insert([
        'work_name' =>$request->work_name,
        'work_text' => $request->work_text,
        'work_image' => $last_img,
        'created_at' => Carbon::now()
    ]);
$notification = array(
                        'message' => 'work inserted successfully',
                        'alert-type' => 'success'
                    );
    return Redirect()->back()->with($notification);

    }

    //edit work 

    public function Edit($id){
        $works = Work::find($id);
        return view('admin.work.edit',compact('works'));
    }

    // update work function

    public function Update(Request $request , $id){
        $validated = $request->validate([
        'work_name' => 'required|min:4',
        'work_text' => 'required',
        
    ]);
    $work_image = $request->file('work_image');
    $old_image = $request->old_image;
    if($work_image){


    $name_gen = hexdec(uniqid());
    $img_ext = strtolower($work_image->getClientOriginalExtension());
    $upload_location = 'image/work/';
    $image_name = $name_gen.'.'.$img_ext;
    $last_img = $upload_location.$image_name;
    $work_image->move($upload_location,$image_name);
    unlink($old_image);

    Work::find($id)->update([
        'work_image' => $last_img,
        'updated_at' => Carbon::now()
    ]);

    return Redirect()->route('all.work')->with('success','work image image updated  successfully');

    }else{
Work::find($id)->update([
        'work_name' =>$request->work_name,
        'work_text' =>$request->work_text,
        'updated_at' => Carbon::now()
    ]);

    return Redirect()->route('all.work')->with('success','work name updated successfully');
    }

    }
}
