<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;   
use DataTables;

class ModuleController extends Controller
{
    public function ModuleList()
    {
        if(\request()->ajax()){
            $data = Module::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="/module/edit?id='.$row['id'].'" class="edit btn btn-success btn-sm">Edit</a> <a href="/module/delete?id='.$row['id'].'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('module/list');
    }
    public function AddModule()
    {
        return view('module/add');
    }

    public function EditModule(Request $request)
    {
        $module = Module::find($request->id)->toArray();
        if(!empty($module))
        {
            return view('module/add',['module'=>$module]);
        }
        else
        {
            return redirect('/modle/list')->with('error','Module Not Found');
        }
    }

    public function CreateModule(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'name'=>'required',
            'status'=>'required',
        ])->validate();
        $module = new Module;
        date_default_timezone_set('Asia/Kolkata');
        if(isset($request->id) && $request->id!='') 
        {
            $module = Module::find($request->id);
            $module->updated_at = date("Y-m-d H:i:s");
        }
        else
        {
            $module->created_at = date("Y-m-d H:i:s");
        }
        $module->name = $request->name;
        $module->status = $request->status;
        if($module->save())
        {
            return redirect('/module/list')->with('success','Module Added Successfully');
        }
        else
        {
            return redirect('/module/list')->with('error','Something went wrong! Module Not Added');
        }

    }

    // public function UpdateBlog(Request $request)
    // {
    //     $validated = $request->validate([
    //         'title'=>'requred|max:255',
    //         'description'=>'required',
    //     ]);
    //     $BlogData = Blog::find($request->id);
    //     $BlogData->title = $request->title;
    //     $BlogData->add_by = $request->add_by;
    //     $BlogData->description = $request->description;
    //     if($request->file('blog_image')!=null)
    //     {
    //         $name = time().rand(1,50).'.'.$request->file('blog_image')->extension();
    //         $request->file('blog_image')->move(public_path('uploads/blogimages'), $name); 
    //         $path = 'uploads/blogimages/'.$name; 
    //         $BlogData->image_path = $path;
    //     }
    //     if($BlogData->save())
    //     {
    //         return redirect('/blog/list')->with('success','Blog Updated Successfully');
    //     }
    //     else
    //     {
    //         return redirect('/blog/list')->with('error','Something went wrong! Blog Not Update');
    //     }

    // }

    public function DeleteModule(Request $request)
    {
      $delete = Module::destroy($request->id);
      return redirect('/module/list')->with('success','Module Deleted Successfully');
    }

    public function getAllModule(Request $request)
    {
        if($request->id)
        {
            $Blog = Module::find($request->id)->toArray();
            if(!empty($Blog))
            {
                $Blogs = json_encode(array('success'=>'true','data'=>$Blog,'error_code'=>'20001'));
            }
            else
            {
                $Blogs = json_encode(array('success'=>'true','data'=>'Data Not Found','error_code'=>'20002'));
            }
        }
        else
        {
            $Blog = Module::all()->toArray();
            if(!empty($Blog))
            {
                $Blogs = json_encode(array('success'=>'true','data'=>$Blog,'error_code'=>'20003'));
            }
            else
            {
                $Blogs = json_encode(array('success'=>'true','data'=>'No Records Found','error_code'=>'20004'));
            }
        }
        return $Blogs;
    }
}
