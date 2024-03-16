<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\ClientEnquiry;
use App\Models\ContactUs;
use App\Models\CreateOwnProperty;
use App\Models\FloorPlanImage;
use App\Models\Image;
use App\Models\Project;
use App\Models\ProjectType;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\IpUtils;

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

    public function ProjectDetails($slug){
        $recentprojects = Project::latest()->take(10)->get()->toArray();
        foreach($recentprojects as $key=> $recentproject)
        {
            $images = Image::where('project_id',$recentproject['id'])->get('image_path')->toArray();
            $recentprojects[$key]['images'] = $images;
            $diff = strtotime(date('Y-m-d H:i:s')) - strtotime($recentproject['created_at']);
            $recentprojects[$key]['days'] = abs(round($diff / 86400));
        }
        print_r($slug);die("ds");
        $id = $req->id;
        $floorplans = FloorPlanImage::where('pid',$id)->get()->toArray();
        $project = Project::find($id)->toArray();
        $aminities = explode(', ',$project['amenities']);
        $images = Image::where('project_id',$id)->get('image_path')->toArray();
        return view('front.property-details',compact('id','project','images','aminities','recentprojects','floorplans'));
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
            // 'msg'=>'required',
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
        if(isset($request->category) && $request->category!='')
        {
            $blogs = Blog::where('category',$request->category)->paginate(10); 
        }
        $blogcategory = Category::all()->toArray();
        return view('front.Blog.blog',compact('blogs','blogcategory'));
    }

    function FrontBlogDetails(Request $request)
    {
        $blog = Blog::find($request->id)->toArray();
        $allblogs = Blog::all()->toArray();
        $relatedblogs = Blog::where('category',$blog['category'])->get()->toArray();
        $blogcategory = Category::all()->toArray();
        return view('front.Blog.details',['blogs'=>$blog,'allblogs'=>$allblogs,'relatedblogs'=>$relatedblogs,'blogcategory'=>$blogcategory]);
    }

    public function ClientEnquiry(Request $request)
    {
        $recaptcha_response = $request->input('g-recaptcha-response');

        if (is_null($recaptcha_response)) {
            $url = url()->previous();
            if(isset($request->error) && $request->error!='')
            {
                $url = $request->error.'&error=Please fill captcha';
            }
            return redirect($url)->with('error', 'Please Complete the Recaptcha Again to proceed');
        }

        $url = "https://www.google.com/recaptcha/api/siteverify";

        $body = [
            'secret' => config('services.recaptcha.secret'),
            'response' => $recaptcha_response,
            'remoteip' => IpUtils::anonymize($request->ip())
        ];

        $response = Http::asForm()->post($url, $body);

        $result = json_decode($response);
        if ($response->successful() && $result->success == true) {
            date_default_timezone_set('Asia/Kolkata');
            $enquiry = new ClientEnquiry;
            $enquiry->name = $request->name;
            $enquiry->email = $request->email;
            $enquiry->phone = $request->phone;
            $enquiry->msg = $request->msg;
            $enquiry->client = $request->client;
            $enquiry->created_at = date("Y-m-d H:i:s");
            if($enquiry->save())
            {
                $this->sendClientMails($enquiry);
                $url = url()->previous();
                if(isset($request->thanks) && $request->thanks!='')
                {
                    $url = $request->thanks;
                }
                return redirect($url)->with('success','We will call you for fixed the fixed your schedule');
            }
            else
            {
                $url = url()->previous();
                if(isset($request->error) && $request->error!='')
                {
                    $url = $request->error;
                }
                return redirect($url)->with('error','Some thing went wrong');
            }
        } else {
            $url = url()->previous();
            if(isset($request->error) && $request->error!='')
            {
                $url = $request->error.'&error=Please Complete the Recaptcha Again to proceed';
            }
            return redirect($url)->with('error', 'Please Complete the Recaptcha Again to proceed');
        }
    }

    public function SendForCreateList(Request $request)
    {
        $ownPropery = new CreateOwnProperty;
        $ownPropery->name = $request->name;
        $ownPropery->email = $request->email;
        $ownPropery->phone = $request->phone;
        $ownPropery->location = $request->location;
        $ownPropery->type = $request->type;
        $ownPropery->msg = $request->msg;
        $ownPropery->status = $request->status;
        $ownPropery->created_at = date('Y-m-d H:i:s');
        if($ownPropery->save())
        {
            return redirect(url()->previous())->with('success','Message sent admin, we will connect you soon!');
        }
        else
        {
            return redirect(url()->previous())->with('error','Something went wrong');
        }
    }

    public function SendContactUs(Request $request)
    {
        $contact = new ContactUs;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->msg = $request->msg;
        $contact->created_at = date('Y-m-d H:i:s');
        if($contact->save())
        {
            return redirect(url()->previous())->with('success','Message sent admin, we will connect you soon!');
        }
        else
        {
            return redirect(url()->previous())->with('error','Something went wrong');
        }
    }
}
