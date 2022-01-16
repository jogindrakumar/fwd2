<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Models\Admin;
use App\Http\Controllers\SliderController;
use App\Models\Slider;
use App\Http\Controllers\ServiceController;
use App\Models\Service;
use App\Http\Controllers\WorkController;
use App\Models\Work;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;
use App\Models\Client;
use App\Models\Contact;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $sliders = Slider::all();
    $services = Service::all();
    $first_works = DB::table('works')->find(1);
    $second_works = DB::table('works')->find(2);
    $third_works = DB::table('works')->find(3);
    $sliders = Slider::all();
    return view('home',compact('sliders','services','first_works','second_works','third_works','sliders'));
});




Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//admin route
Route::group(['prefix' => 'admin', 'middleware'=>['admin:admin']],function(){

    Route::get('/login',[AdminController::class,'loginForm']);
    Route::post('/login',[AdminController::class,'store'])->name('admin.login');
});


//Admin All routes

 Route::get('/admin/logout',[AdminController::class,'destroy'])->name('admin.logout');
 Route::get('/admin/profile',[AdminProfileController::class,'AdminProfile'])->name('admin.profile');
 Route::get('/admin/profile/edit',[AdminProfileController::class,'AdminProfileEdit'])->name('admin.profile.edit');


  // all slider route

Route::get('/admin/slider/all',[SliderController::class,'AllSlider'])->name('all.slider');
Route::post('/admin/slider/add',[SliderController::class,'AddSlider'])->name('store.slider');
Route::get('/admin/slider/edit/{id}',[SliderController::class,'Edit']);
Route::post('/admin/slider/update/{id}',[SliderController::class,'Update']);


  // services route


Route::get('/services',[ServiceController::class,'Service'])->name('service'); // home page route 

Route::get('/admin/service/all',[ServiceController::class,'AllService'])->name('all.service');
Route::post('/admin/service/add',[ServiceController::class,'AddService'])->name('store.service');
Route::get('/admin/service/edit/{id}',[ServiceController::class,'Edit']);
Route::post('/admin/service/update/{id}',[ServiceController::class,'Update']);
Route::get('/admin/service/delete/{id}',[ServiceController::class,'Delete']);

// work route


Route::get('/works',[WorkController::class,'Work'])->name('work');

Route::get('/admin/work/all',[WorkController::class,'AllWork'])->name('all.work');
Route::post('/admin/work/add',[WorkController::class,'AddWork'])->name('store.work');
Route::get('/admin/work/edit/{id}',[WorkController::class,'Edit']);
Route::post('/admin/work/update/{id}',[WorkController::class,'Update']);
Route::get('/admin/work/delete/{id}',[WorkController::class,'Delete']);


// client route


Route::get('/clients',[ClientController::class,'Client'])->name('client');

Route::get('/admin/client/all',[ClientController::class,'AllClient'])->name('all.client');
Route::post('/admin/client/add',[ClientController::class,'AddClient'])->name('store.client');
Route::get('/admin/client/edit/{id}',[ClientController::class,'Edit']);
Route::post('/admin/client/update/{id}',[ClientController::class,'Update']);
Route::get('/admin/client/delete/{id}',[ClientController::class,'Delete']);

// all message route
// message route

Route::get('/admin/message',[ContactController::class,'AllMessage'])->name('all.message');

Route::post('/admin/message/sent',[ContactController::class,'AddMessage'])->name('store.message');
Route::get('/admin/message/delete/{id}',[ContactController::class,'DeleteMessage']);

// home pages routes

Route::get('/about',[WorkController::class,'About'])->name('about');

// home portfolio route

Route::get('/portfolio',[PortfolioController::class,'Portfolio'])->name('portfolio');

// home contact route
Route::get('/contact',[ContactController::class,'Contact'])->name('contact');



Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');
