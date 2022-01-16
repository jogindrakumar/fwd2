@extends('layouts.master_home')
 
 @section('main_content')

 <div class="wedo">
        <div class="wedo_white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage text_align_center ">
                            <h2>What We Do. </h2>
                            <p>that it has a more-or-less normal distribution of letters, as </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12">
                    <div class="ma_top">
                        <div class="row">
                            <div class="col-md-4"> 
                                <div class="web_box left0 text_align_center">
                                    <i><img src="{{asset('frontend/images/wedo_icon1.png')}}" alt="#"/></i>
                                    <h3>Web Development</h3>
                                    <p>web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will web sites still in</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="web_box left0 text_align_center">
                                    <i><img src="{{asset('frontend/images/wedo_icon2.png')}}" alt="#"/></i>
                                    <h3>App Development</h3>
                                    <p>web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will web sites still in</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="web_box text_align_center">
                                    <i><img src="{{asset('frontend/images/wedo_icon3.png')}}" alt="#"/></i>
                                    <h3>SEO Optimization</h3>
                                    <p>web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will web sites still in</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <a class="read_more" href="wedo.index">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
 @endsection