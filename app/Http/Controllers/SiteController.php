<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Sites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class SiteController extends Controller
{
    public function SiteList()
    {
        if(\request()->ajax()){
            $data = Sites::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="/site/edit?id='.$row['id'].'" class="edit btn btn-success btn-sm">Edit</a> <a href="/site/delete?id='.$row['id'].'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('site/list');
    }
    public function AddSite()
    {
        return view('site/add');
    }

    public function EditSite(Request $request)
    {
        $sites = Sites::find($request->id)->toArray();
        if(!empty($sites))
        {
            return view('site/add',['sites'=>$sites]);
        }
        else
        {
            return redirect('/site/list')->with('error','Site Not Found');
        }
    }

    public function CreateSite(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'name'=>'required',
            'domain'=>'required',
        ])->validate();
        $SiteData = new Sites;
        date_default_timezone_set('Asia/Kolkata');
        if(isset($request->id) && $request->id!='') 
        {
            $SiteData = Sites::find($request->id);
            $SiteData->updated_at = date("Y-m-d H:i:s");
        }
        else
        {
            $SiteData->created_at = date("Y-m-d H:i:s");
        }
        $SiteData->name = $request->name;
        $SiteData->domain = $request->domain;
        if($SiteData->save())
        {
            return redirect('/site/list')->with('success','Site Added Successfully');
        }
        else
        {
            return redirect('/site/list')->with('error','Something went wrong! Site Not Added');
        }

    }

    public function DeleteSite(Request $request)
    {
      $delete = Sites::destroy($request->id);
      return redirect('/site/list')->with('success','Site Deleted Successfully');
    }

    ////Site Blog manage controller start
    public function SiteBlogList()
    {
        if (\request()->ajax()) {
            $session = session()->all();
            if(isset($session['siteid']) && $session['siteid']!='')
            {
                $getSiteUrl = Sites::where('id',$session['siteid'])->get('domain')->toArray();
                $url['domain'] = $getSiteUrl[0]['domain'];
                $returndata = $this->manageOuterBlogs(array(),$url,'fetch','');
                $bloglist = json_decode($returndata,true);
                $bloglist = json_decode($bloglist,true);
                $data = collect($bloglist['data']);
            }
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="/siteblog/edit?id=' . $row['id'] . '" class="edit btn btn-success btn-sm">Edit</a> <a href="/siteblog/delete?id=' . $row['id'] . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('siteblog/list');
    }
    public function AddSiteBlog()
    {
        $session = session()->all();
        $sites = Sites::all()->toArray();
        $category = Category::all()->toArray();
        $option = '<option></option>';
        $siteoption = '<option></option>';
        $category = Category::where('siteid',$session['siteid'])->get()->toArray();
        $option ='<option></option>';
        if(!empty($category))
        {
            foreach($category as $cat)
            {
                $option .= '<option value="'.$cat['category'].'">'.$cat['category'].'</option>';
            }
        }
        if (!empty($sites)) {

            foreach ($sites as $site) {
                $selectedsite = '';
                if($site['id']==$session['siteid'])
                {
                    $selectedsite = 'selected';
                }
                $siteoption .= '<option value="' . $site['id'] . '" "'.$selectedsite.'">' . $site['name'] . '</option>';
            }
        }
        return view('siteblog/add', ['option' => $option, 'siteoption' => $siteoption]);
    }

    public function EditSiteBlog(Request $request)
    {
        $session = session()->all();
        if(isset($session['siteid']) && $session['siteid']!='')
        {
            $getSiteUrl = Sites::where('id',$session['siteid'])->get('domain')->toArray();
            $url['domain'] = $getSiteUrl[0]['domain'];
            $returndata = $this->manageOuterBlogs(array('id'=>$request->id),$url,'fetch','');
            $bloglist = json_decode($returndata,true);
            $bloglist = json_decode($bloglist,true);
            $blogs = $bloglist['data'][0];
        }
        
        $sites = Sites::all()->toArray();
        $siteoption = '<option></option>';
        if (!empty($sites)) {

            foreach ($sites as $site) {
                $selectsite = '';
                if ($site['id'] == $session['siteid']) {
                    $selectsite = "selected";
                }
                $siteoption .= '<option value="' . $site['id'] . '" ' . $selectsite . '>' . $site['name'] . '</option>';
            }
        }
        $category = Category::where('siteid',$session['siteid'])->get()->toArray();
        $option ='<option></option>';
        if(!empty($category))
        {
            
            foreach($category as $cat)
            {
                $select = '';
                if($cat['category']==$blogs['category']){$select = "selected";}
                $option .= '<option value="'.$cat['category'].'" '.$select.'>'.$cat['category'].'</option>';
            }
        }
        if (!empty($blogs)) {
            return view('siteblog/add', ['blogs' => $blogs,'siteoption' => $siteoption,'option'=>$option]);
        } else {
            return redirect('siteblog/list')->with('error', 'Blog Not Found');
        }
    }

    public function CreateSiteBlog(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ])->validate();
        if (isset($request->siteid) && $request->siteid != '') {
            $siteurl = Sites::find($request->siteid, 'domain')->toArray();
            if (isset($request->id) && $request->id != '') {
                $method = 'update';
            } else {
                $method = 'insert';
            }
            $path = '';
            if ($request->file('blog_image') != null) {
                $name = time() . rand(1, 50) . '.' . $request->file('blog_image')->extension();
                $request->file('blog_image')->move(public_path('uploads/blogimages/' . $request->siteid), $name);
                $path = 'https://wafirealty.com//public/uploads/blogimages/' . $request->siteid . '/' . $name;
            }
            $outerBlogsend = $this->manageOuterBlogs($request->all(), $siteurl, $method, $path);
            $result = json_decode($outerBlogsend,true);
            $result = json_decode($result,true);
            if ($result['status'] == 'success') {
                return redirect('/siteblog/list')->with('success', 'Blog Added Successfully');
            } else {
                return redirect('/siteblog/list')->with('error', 'Something went wrong! Blog Not Added');
            }
        } 
    }
    public function DeleteSiteBlog(Request $request)
    {
        $session = session()->all();
        if(isset($session['siteid']) && $session['siteid']!='')
        {
            $getSiteUrl = Sites::where('id',$session['siteid'])->get('domain')->toArray();
            $url['domain'] = $getSiteUrl[0]['domain'];
            $returndata = $this->manageOuterBlogs(array('id'=>$request->id),$url,'delete','');
            $bloglist = json_decode($returndata,true);
            $bloglist = json_decode($bloglist,true);
            $blogs = $bloglist['data'];
        }
        return redirect('/siteblog/list')->with('success', 'Blog Deleted Successfully');
    }
}
