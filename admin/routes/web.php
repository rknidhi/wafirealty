<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
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
// Route::prefix('admin')->group(function(){
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

    //Menu Routes
    Route::get('menu/listmenu', [MenuController::class, 'listmenu'])->name('listmenu');
    Route::get('menu/edit/{id}', [MenuController::class, 'edit'])->name('edit');
    Route::get('menu/delete/{id}', [MenuController::class, 'delete'])->name('delete');
    Route::get('menu/add', [MenuController::class, 'add'])->name('add');
    Route::post('menu/submit', [MenuController::class, 'submit'])->name('submit');
    Route::post('menu/update/{id}', [MenuController::class, 'update'])->name('update');
    Route::get('menu/fetch_page/{name}', [MenuController::class, 'fetch_page'])->name('fetch_page');

    //User Routes
    Route::get('user/list',[UserController::class,'UserList']);
    Route::get('user/edit',[UserController::class,'EditUser']);
    Route::get('user/add',[UserController::class,'AddUser']);
    Route::post('user/create',[UserController::class,'CreateUser']);

    //Category Routes
    Route::get('category/list',[CategoryController::class,'CategoryList']);
    Route::get('category/edit',[CategoryController::class,'EditCategory']);
    Route::get('category/add',[CategoryController::class,'AddCategory']);
    Route::post('category/create',[CategoryController::class,'CreateCategory']);


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

// });
//    