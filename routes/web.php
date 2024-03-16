<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FloorPlanController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TaskReportController;
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
    Route::get('blog/delete',[BlogController::class,'DeleteBlog']);
    
    //Outer Site Blogs
    Route::get('siteblog/list',[SiteController::class,'SiteBlogList']);
    Route::get('siteblog/edit',[SiteController::class,'EditSiteBlog']);
    Route::get('siteblog/add',[SiteController::class,'AddSiteBlog']);
    Route::post('siteblog/create',[SiteController::class,'CreateSiteBlog']);
    Route::get('siteblog/delete',[SiteController::class,'DeleteSiteBlog']);


    //Sites Routs
    Route::get('site/list',[SiteController::class,'SiteList']);
    Route::get('site/edit',[SiteController::class,'EditSite']);
    Route::get('site/add',[SiteController::class,'AddSite']);
    Route::post('site/create',[SiteController::class,'CreateSite']);
    Route::get('site/delete',[SiteController::class,'DeleteSite']);


    // Project Routs
    Route::get('project/list',[ProjectController::class,'ProjectList']);
    Route::get('project/edit',[ProjectController::class,'EditProject']);
    Route::get('project/add',[ProjectController::class,'AddProject']);
    Route::post('project/create',[ProjectController::class,'CreateProject']);
    Route::get('project/delete',[ProjectController::class,'DeleteProject']);

    ///Project Type Routes
    Route::get('projecttype/list',[ProjectController::class,'ProjectTypeList']);
    Route::get('projecttype/edit',[ProjectController::class,'EditProjectType']);
    Route::get('projecttype/add',[ProjectController::class,'AddProjectType']);
    Route::post('projecttype/create',[ProjectController::class,'CreateProjectType']);
    Route::get('projecttype/delete',[ProjectController::class,'DeleteProjectType']);
    
    
    ///Project Amenities Routes
    Route::get('projectamenities/list',[ProjectController::class,'ProjectAmenityList']);
    Route::get('projectamenities/edit',[ProjectController::class,'EditProjectAmenity']);
    Route::get('projectamenities/add',[ProjectController::class,'AddProjectAmenity']);
    Route::post('projectamenities/create',[ProjectController::class,'CreateProjectAmenity']);
    Route::get('projectamenities/delete',[ProjectController::class,'DeleteProjectAmenity']);
    Route::get('/deletefloor',[ProjectController::class,'DeleteFloorPlan']);


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
    Route::get('user/delete',[UserController::class,'DeleteUser']);
    Route::get('/UserProfile',[UserController::class,'UserProfile']);
    Route::post('/CreateUser',[UserController::class,'CreateUser']);
    Route::get('/Logout',[UserController::class,'LogoutUser']);
    Route::post('/UpdateUser',[UserController::class,'UpdateUser']);
    Route::post('/UserLogin',[UserController::class,'Login']);
    Route::post('/UpdateProfile',[UserController::class,'UpdateProfile']);


    //Category Routes
    Route::get('category/list',[CategoryController::class,'CategoryList']);
    Route::get('category/edit',[CategoryController::class,'EditCategory']);
    Route::get('category/add',[CategoryController::class,'AddCategory']);
    Route::post('category/create',[CategoryController::class,'CreateCategory']);
    Route::get('category/delete',[CategoryController::class,'DeleteCategory']);


    //Brand Routes
    Route::get('brand/list',[BrandController::class,'BrandList']);
    Route::get('brand/edit',[BrandController::class,'EditBrand']);
    Route::get('brand/add',[BrandController::class,'AddBrand']);
    Route::post('brand/create',[BrandController::class,'CreateBrand']);
    Route::get('brand/delete',[BrandController::class,'DeleteBrand']);


    //Permission Routes
    Route::get('permission/list',[PermissionController::class,'PermissionList']);
    Route::get('permission/edit',[PermissionController::class,'EditPermission']);
    Route::get('permission/add',[PermissionController::class,'AddPermission']);
    Route::post('permission/create',[PermissionController::class,'CreatePermission']);
    Route::get('permission/delete',[PermissionController::class,'DeletePermission']);
    Route::post('permission/userpermission',[PermissionController::class,'getAllPermission']);
    Route::post('permission/addpermission',[PermissionController::class,'addUserPermission']);


    //Module Routes
    Route::get('module/list',[ModuleController::class,'ModuleList']);
    Route::get('module/edit',[ModuleController::class,'EditModule']);
    Route::get('module/add',[ModuleController::class,'AddModule']);
    Route::post('module/create',[ModuleController::class,'CreateModule']);
    Route::get('module/delete',[ModuleController::class,'DeleteModule']);


    //Task Report Routes
    Route::get('report/add',[TaskReportController::class,'AddReport']);
    Route::post('report/create',[TaskReportController::class,'CreateReport']);
    Route::get('report/myreport',[TaskReportController::class,'MyReport']);
    Route::get('report/allreport',[TaskReportController::class,'AllReports']);
    Route::get('report/delete',[TaskReportController::class,'DeleteReport']);


    ///Floor Plan Routs////
    Route::get('floorplan/list',[FloorPlanController::class,'FloorPlanList']);
    Route::get('floorplan/add',[FloorPlanController::class,'AddFloorPlan']);
    Route::post('floorplan/create',[FloorPlanController::class,'CreateFloorPlan']);
    ///Front End Routs//////
    Route::controller(FrontController::class)->group(function(){
            Route::get('/','Index');
            Route::any('/project-details/{slug}','ProjectDetails');
            Route::any('/project-list','FrontProjectList');
            Route::post('/schedule','setScheduleForClient');
            Route::any('/search-propert','FilterPropert');
            Route::get('blog','FrontBlog');
            Route::get('detail-blog','FrontBlogDetails');
            Route::post('/clientenquiry','ClientEnquiry');
            Route::post('/createownlist','SendForCreateList');
            Route::post('/submitcontact','SendContactUs');
            Route::get('/contactus',function(){return view('front.ContactUs.contact-us');});
            Route::get('/listyourown',function(){return view('front.list-your-properties');});
            Route::get('/termscondition',function(){return view('front.terms-and-conditions');});
            Route::get('/privacy',function(){return view('front.privacy-policy');});
            Route::get('/about',function(){return view('front.about-us');});
    });


    ///Miscelenious Routes
    Route::get('/Admin', [HomeController::class,'Index']);
    Route::get('/dashboard', [HomeController::class,'Index']);
    Route::get('/Login',function(){return view('login');});
    Route::get('/EditUser/{uid}',function($uid){return view('/user/edituser',['uid'=>$uid]);});
    Route::get('/AddUser',function(){return view('/user/adduser');});
    Route::post('/website/testimonials/add',[WebsiteController::class,'CreateTestimonials']);
    Route::any('/website/testimonial/list',function(){return view('/website/testimonials/alltestimonials');});
    Route::get('/website/testimonial/add',function(){return view('/website/testimonials/addtestimonials');});

// });
//    
