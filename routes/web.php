<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\WebsiteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

    //Blog Routs
    Route::get('generatetocken',[BlogController::class,'GenerateTocken']);
    Route::get('blog/list',[BlogController::class,'BlogList']);
    Route::get('blog/edit',[BlogController::class,'EditBlog']);
    Route::get('blog/add',[BlogController::class,'AddBlog']);
    Route::post('blog/create',[BlogController::class,'CreateBlog']);

    // Project Routs
    Route::get('project/list',[ProjectController::class,'ProjectList']);
    Route::get('project/edit',[ProjectController::class,'EditProject']);
    Route::get('project/add',[ProjectController::class,'AddProject']);
    Route::post('project/create',[ProjectController::class,'CreateProject']);
    Route::get('project/delete',[ProjectController::class,'DeleteProject']);



Route::get('/', [HomeController::class,'Index']);
Route::get('/dashboard', [HomeController::class,'Index']);
Route::get('/Login',function(){
    return view('login');
});
Route::post('/UserLogin',[UserController::class,'Login']);

Route::get('/UserProfile',function(){
    return view('/user/user-profile');
});
Route::post('/UpdateProfile',[UserController::class,'UpdateProfile']);
Route::get('/EditUser/{uid}',function($uid){
    return view('/user/edituser',['uid'=>$uid]);
});
Route::get('/AddUser',function(){
    return view('/user/adduser');
});
Route::post('/CreateUser',[UserController::class,'CreateUser']);
Route::get('/Logout',[UserController::class,'LogoutUser']);
Route::post('/UpdateUser',[UserController::class,'UpdateUser']);
Route::post('/website/testimonials/add',[WebsiteController::class,'CreateTestimonials']);
Route::any('/website/testimonial/list',function(){return view('/website/testimonials/alltestimonials');});
Route::get('/website/testimonial/add',function(){return view('/website/testimonials/addtestimonials');});
