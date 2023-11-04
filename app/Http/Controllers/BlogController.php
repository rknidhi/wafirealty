<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function GenerateTocken()
{
    return csrf_token(); 
}
    public function BlogList()
    {
        $blogs = Blog::all()->toArray();
        return view('blog/list',['blogs'=>$blogs]);
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
        
        // $request->validate([
        //     'title'=>'requred',
        //     'description'=>'required',
        // ]);
        $BlogData = new Blog;
        if(isset($request->id) && $request->id!='') 
        {
            $BlogData = Blog::find($request->id);
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










