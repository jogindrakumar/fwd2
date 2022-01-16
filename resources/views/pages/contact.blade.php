@extends('layouts.master_home')
 
 @section('main_content')
 <div class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="titlepage text_align_center">
                        <h2>Contact Us</h2>
                    </div>
                </div>
                <div class="col-md-8 offset-md-2">
                
                        <form action="{{route('store.message')}}" id="request" method="POST" class="main_form">
                            @csrf
                        <div class="row">
                            <div class="col-md-12 ">
                                <input class="form_control" placeholder="Your name" type="text" name="name">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>        
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <input class="form_control" placeholder="Your email" type="email" name="email">
                                 @error('email')
                                <span class="text-danger">{{$message}}</span>        
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <input class="form_control" placeholder="Subject" type="text" name="subject">
                                 @error('subject')
                                <span class="text-danger">{{$message}}</span>        
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <textarea class="textarea" placeholder="Message" type="type" name="message"> </textarea>
                                  @error('message')
                                <span class="text-danger">{{$message}}</span>        
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <button class="send_btn" type="submit">Send Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


 @endsection