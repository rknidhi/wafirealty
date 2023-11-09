<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use DataTables;
class BlogController extends Controller
{
    public function GenerateTocken()
{
    return csrf_token(); 
}
    public function BlogList()
    {
        if(\request()->ajax()){
            $data = Blog::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="/blog/edit?id='.$row['id'].'" class="edit btn btn-success btn-sm">Edit</a> <a href="/blog/delete?id='.$row['id'].'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('blog/list');
    }
    public function AddBlog()
    {
        return view('blog/add');
    }

    public function EditBlog(Request $request)
    {
        $blogs = Blog::find($request->id)->toArray();
        if(!empty($blogs))
        {
            return view('blog/add',['blogs'=>$blogs]);
        }
        else
        {
            return redirect('/blog/list')->with('error','Blog Not Found');
        }
    }

    public function CreateBlog(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required',
        ])->validate();
        Validator::validate($request->file(), [
            'blog_image' => [
                'required',
                File::image()
                    ->min(100)
                    ->max(10 * 1024)
                    ->dimensions(Rule::dimensions()->maxWidth(1000)->maxHeight(500)),
            ],
        ]);
        $BlogData = new Blog;
        date_default_timezone_set('Asia/Kolkata');
        if(isset($request->id) && $request->id!='') 
        {
            $BlogData = Blog::find($request->id);
            $BlogData->updated_at = date("Y-m-d H:i:s");
        }
        else
        {
            $BlogData->created_at = date("Y-m-d H:i:s");
        }
        $BlogData->title = $request->title;
        $BlogData->add_by = $request->add_by;
        $BlogData->description = $request->description;
        // $BlogData->created_at = $request->date;
        $BlogData->metatitle = $request->metatitle;
        $BlogData->metadescription = $request->metadescription;
        if($request->file('blog_image')!=null)
        {
            $name = time().rand(1,50).'.'.$request->file('blog_image')->extension();
            $request->file('blog_image')->move(public_path('uploads/blogimages'), $name); 
            $path = 'uploads/blogimages/'.$name; 
            $BlogData->image_path = $path;
        }
        if($BlogData->save())
        {
            return redirect('/blog/list')->with('success','Blog Added Successfully');
        }
        else
        {
            return redirect('/blog/list')->with('error','Something went wrong! Blog Not Added');
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

    public function DeleteBlog(Request $request)
    {
      $delete = Blog::destroy($request->id);
      return redirect('/blog/list')->with('success','Blog Deleted Successfully');
    }
}










