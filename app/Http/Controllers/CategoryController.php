<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;
class CategoryController extends Controller
{
    public function CategoryList()
    {
        if(\request()->ajax()){
            $data = Category::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="/category/edit?id='.$row['id'].'" class="edit btn btn-success btn-sm">Edit</a> <a href="/category/delete?id='.$row['id'].'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('event/category/list');
    }
    public function AddCategory()
    {
        return view('event/category/add');
    }

    public function EditCategory(Request $request)
    {
        $category = Category::find($request->id)->toArray();
        if(!empty($category))
        {
            return view('event/category/add',['category'=>$category]);
        }
        else
        {
            return redirect('/category/list')->with('error','Blog Not Found');
        }
    }

    public function CreateCategory(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'category'=>'required',
            'status'=>'required',
        ])->validate();
        $CategoryData = new Category;
        date_default_timezone_set('Asia/Kolkata');
        if(isset($request->id) && $request->id!='') 
        {
            $CategoryData = Category::find($request->id);
            $CategoryData->updated_at = date("Y-m-d H:i:s");
        }
        else
        {
            $CategoryData->created_at = date("Y-m-d H:i:s");
        }
        $CategoryData->category = $request->category;
        $CategoryData->status = $request->status;
        if($CategoryData->save())
        {
            return redirect('/category/list')->with('success','Category Added Successfully');
        }
        else
        {
            return redirect('/category/list')->with('error','Something went wrong! Category Not Added');
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

    public function DeleteCategory(Request $request)
    {
      $delete = Category::destroy($request->id);
      return redirect('/category/list')->with('success','Category Deleted Successfully');
    }

    // public function getAllBlog(Request $request)
    // {
    //     if($request->id)
    //     {
    //         $Blog = Blog::find($request->id)->toArray();
    //         if(!empty($Blog))
    //         {
    //             $Blogs = json_encode(array('success'=>'true','data'=>$Blog,'error_code'=>'20001'));
    //         }
    //         else
    //         {
    //             $Blogs = json_encode(array('success'=>'true','data'=>'Data Not Found','error_code'=>'20002'));
    //         }
    //     }
    //     else
    //     {
    //         $Blog = Blog::all()->toArray();
    //         if(!empty($Blog))
    //         {
    //             $Blogs = json_encode(array('success'=>'true','data'=>$Blog,'error_code'=>'20003'));
    //         }
    //         else
    //         {
    //             $Blogs = json_encode(array('success'=>'true','data'=>'No Records Found','error_code'=>'20004'));
    //         }
    //     }
    //     return $Blogs;
    // }
}
