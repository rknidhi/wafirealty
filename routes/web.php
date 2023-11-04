<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'admin'], function(){
    //Blog Routs
    Route::get('blog/list',[BlogController::class,'BlogList']);
    Route::get('blog/edit/{id}',[BlogController::class,'EditBlog']);
    Route::get('blog/add',[BlogController::class,'AddBlog']);
    Route::post('blog/create',[BlogController::class,'CreateBlog']);

    // Project Routs
    Route::get('project/list',[ProjectController::class,'ProjectList']);
    Route::get('project/edit/{id}',[ProjectController::class,'EditProject']);
    Route::get('project/add',[ProjectController::class,'AddProject']);
    Route::post('project/create',[ProjectController::class,'CreateProject']);
});







