@extends('layouts.master_home')
 
 @section('main_content')

<div class="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage text_align_center ">
                        <h2>Portfolio</h2>
                        <p>that it has a more-or-less normal distribution of letters, as </p>
                    </div>
                </div>
            </div>
            <div class="row d_flex">
                <div class=" col-md-6">
                    <div id="ho_img" class="portfolio_img">
                         
                        <figure><img src=" {{asset('frontend/images/potoub.jpg')}}" alt="#" /></figure>
                        <a href="#" class="btn btn-outline-info">View</a>
                    </div>
                   
                </div>
                <div class=" col-md-6">
                    <div id="ho_img" class="portfolio_img">
                        <figure><img src=" {{asset('frontend/images/dash.jpg')}}" alt="#" /></figure>
                        <a href="#" class="btn btn-outline-info">View</a>
                    </div>
                </div>
                <div class=" col-md-6">
                    <div id="ho_img" class="portfolio_img">
                        <figure><img src=" {{asset('frontend/images/digitalex.jpg')}}" alt="#" /></figure>
                        
                        <a href="#" class="btn btn-outline-info">View</a>
                    </div>
                </div>
                <div class=" col-md-6">
                    
                    <div id="ho_img" class="portfolio_img">
                        <figure><img src=" {{asset('frontend/images/ears.jpg')}}" alt="#" /></figure>
                        <a href="#" class="btn btn-outline-info">View</a>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
 
 @endsection