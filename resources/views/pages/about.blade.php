@extends('layouts.master_home')
 @section('main_content')

<div class="work">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage text_align_center ">
                        <h2>About Us</h2>
                        <p>that it has a more-or-less normal distribution of letters, as </p>
                    </div>
                </div>
            </div>
           <div class="row">
                <div class="col-md-12">
                    <div class="margi_bottom30">
                        <div class="row d_flex grid">
                            <div class=" col-md-6 marg_left">
                                <div id="ho_img" class="work_img">
                                   
                                        
                                   
                                    <figure><img src="{{asset($first_works->work_image)}}" alt="#" /></figure>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="work_box">
                                   
                                    <h3>{{$first_works->work_name}}</h3>
                                    <p>{{$first_works->work_text}}</p>
                                    <a class="read_more" href="Javascript:void(0)">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="margi_bottom30">
                        <div class="row d_flex">
                            <div class="col-md-6">
                                <div class="work_box">
                                    <h3>{{$second_works->work_name}}</h3>
                                    <p>{{$second_works->work_text}}</p>
                                    <a class="read_more" href="Javascript:void(0)">Read More</a>
                                </div>
                            </div>
                            <div class=" col-md-6 marg_right order">
                                <div id="ho_img" class="work_img">
                                    <figure><img src="{{asset($second_works->work_image)}}" alt="#" /></figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="margi_bottom30">
                        <div class="row d_flex">
                            <div class=" col-md-6 marg_left">
                                <div id="ho_img" class="work_img">
                                    <figure><img src="{{asset($third_works->work_image)}}" alt="#" /></figure>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="work_box">
                                    <h3>{{$third_works->work_name}}</h3>
                                    <p>{{$third_works->work_text}}</p>
                                    <a class="read_more" href="Javascript:void(0)">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection