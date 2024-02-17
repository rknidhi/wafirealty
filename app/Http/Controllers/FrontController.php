<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Image;
use App\Models\Project;
use App\Models\ProjectType;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function Index(Request $req)
    { 
        $category = ProjectType::latest()->take(6)->get()->toArray();
        $projects = Project::latest()->take(10)->get()->toArray();
        foreach($projects as $key=> $project)
        {
            $images = Image::where('project_id',$project['id'])->get('image_path')->toArray();
            $projects[$key]['images'] = $images;
            $diff = strtotime(date('Y-m-d H:i:s')) - strtotime($project['created_at']);
            $projects[$key]['days'] = abs(round($diff / 86400));
        }
        $experts = User::where('type','super admin')->get()->toArray();
        $news = Blog::latest()->take(3)->get()->toArray();
        $categoryoption = '<option>Property Type</option>';
        foreach($category as $cat){
            $categoryoption .= '<option value="'.$cat['type'].'">'.$cat['type'].'</option>';
        }
        return view('front.index',compact('category','projects','news','categoryoption','experts'));
    }

    public function ProjectDetails(Request $req){
        $id = $req->id;
        $project = Project::find($id)->toArray();
        $aminities = explode(', ',$project['amenities']);
        $images = Image::where('project_id',$id)->get('image_path')->toArray();
        return view('front.property-details',compact('id','project','images','aminities'));
    }

    public function FrontProjectList(Request $req){
        $projects = Project::all()->toArray();
        foreach($projects as $key=> $project)
        {
            $images = Image::where('project_id',$project['id'])->get('image_path')->toArray();
            $projects[$key]['images'] = $images;
            $diff = strtotime(date('Y-m-d H:i:s')) - strtotime($project['created_at']);
            $projects[$key]['days'] = abs(round($diff / 86400));
        }
        $projectlist = $this->paginate($projects, 10);
        $projectlist->withPath('');
        return view('front.property-list',['project'=>$projectlist]);
    }

    public function setScheduleForClient(Request $req){
        $validate = $req->validate([
            'time'=>'required',
            'date'=>'required',
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'msg'=>'required',
        ]);
        date_default_timezone_set('Asia/Kolkata');        
        $schedule = new Schedule;
        $schedule->date = $req->date;
        $schedule->time = $req->time;
        $schedule->name = $req->name;
        $schedule->email = $req->email;
        $schedule->phone = $req->phone;
        $schedule->msg = $req->msg;
        $schedule->project_id = $req->project_id;
        $schedule->created_at = date("Y-m-d H:i:s");
        if($schedule->save())
        {
            return redirect(url()->previous())->with('success','We will call you for fixed the fixed your schedule');
        }
        else
        {
            return redirect(url()->previous())->with('error','Some thing went wrong');
        }
    }

    public function FilterPropert(Request $req)
    {
        $type = $req->type;
        $status = $req->status;
        $location = $req->location;
        $projects = Project::where('type',$type)->where('status',$status)->where('location','LIKE',"%$location%")->get()->toArray();
        foreach($projects as $key=> $project)
        {
            $images = Image::where('project_id',$project['id'])->get('image_path')->toArray();
            $projects[$key]['images'] = $images;
            $diff = strtotime(date('Y-m-d H:i:s')) - strtotime($project['created_at']);
            $projects[$key]['days'] = abs(round($diff / 86400));
        }
        $projectlist = $this->paginate($projects, 10);
        $projectlist->withPath('');
        return view('front.property-list',['project'=>$projectlist]);
    }

    function FrontBlog(Request $request)
    {
        $blogs = Blog::paginate(10);
        return view('front.Blog.blog',compact('blogs'));
    }

    function FrontBlogDetails(Request $request)
    {
        $blog = Blog::find($request->id)->toArray();
        $allblogs = Blog::all()->toArray();
        $relatedblogs = Blog::where('category',$blog['category'])->get()->toArray();
        return view('front.Blog.details',['blogs'=>$blog,'allblogs'=>$allblogs,'relatedblogs'=>$relatedblogs]);
    }
}
