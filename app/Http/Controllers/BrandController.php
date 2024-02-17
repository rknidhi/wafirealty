<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Validator;   
use DataTables;
class BrandController extends Controller
{
    public function BrandList()
    {
        if(\request()->ajax()){
            $data = Brand::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="/brand/edit?id='.$row['id'].'" class="edit btn btn-success btn-sm">Edit</a> <a href="/brnad/delete?id='.$row['id'].'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('brand/list');
    }
    public function AddBrand()
    {
        return view('brand/add');
    }

    public function EditBrand(Request $request)
    {
        $brand = Brand::find($request->id)->toArray();
        if(!empty($brand))
        {
            return view('brand/add',['brand'=>$brand]);
        }
        else
        {
            return redirect('/brand/list')->with('error','Brand Not Found');
        }
    }

    public function CreateBrand(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'name'=>'required',
            'status'=>'required',
        ])->validate();
        $brand = new Brand;
        date_default_timezone_set('Asia/Kolkata');
        if(isset($request->id) && $request->id!='') 
        {
            $brand = Brand::find($request->id);
            $brand->updated_at = date("Y-m-d H:i:s");
        }
        else
        {
            $brand->created_at = date("Y-m-d H:i:s");
        }
        $brand->name = $request->name;
        $brand->status = $request->status;
        if($request->file('files')!=null)
        {
            $name = time().rand(1,50).'.'.$request->file('files')->extension();
            $request->file('files')->move(public_path('/uploads/brand/files/'), $name); 
            $path = '/uploads/brand/files/'.$name; 
            $brand->files = $path;
        }
        if($request->file('image')!=null)
        {
            $name2 = time().rand(1,50).'.'.$request->file('image')->extension();
            $request->file('image')->move(public_path('/uploads/brand/image/'), $name2); 
            $path2 = '/uploads/brand/image/'.$name2; 
            $brand->image = $path2;
        }
        if($brand->save())
        {
            return redirect('/brand/list')->with('success','Brand Added Successfully');
        }
        else
        {
            return redirect('/brand/list')->with('error','Something went wrong! Brand Not Added');
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

    public function DeleteBrand(Request $request)
    {
      $delete = Brand::destroy($request->id);
      return redirect('/brand/list')->with('success','Brand Deleted Successfully');
    }

    public function getAllBrand(Request $request)
    {
        if($request->id)
        {
            $Blog = Brand::find($request->id)->toArray();
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
            $Blog = Brand::all()->toArray();
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
