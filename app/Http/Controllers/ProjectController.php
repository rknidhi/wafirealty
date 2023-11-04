<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function ProjectList()
    {
        $Projects = Project::all()->toArray();
        return view('project/list',['Projects'=>$Projects]);
    }
    public function AddProject()
    {
        return view('project/add');
    }

    public function EditProject(Request $request)
    {
        $Projects = Project::find($request->id)->toArray();
        if(!empty($Project))
        {
            return view('project/add',['Projects'=>$Projects]);
        }
        else
        {
            return redirect('project/list')->with('error','Project Not Found');
        }
    }

    public function CreateProject(Request $request)
    {
        $validated = $request->validate([
            'location'=>'requred|max:255',
            'type'=>'required',
            'builder'=>'required',
            'project_name'=>'required',
            'price'=>'required',
        ]);
        $ProjectData = new Project;
        if(isset($request->id) && $request->id!='') 
        {
            $ProjectData = Project::find($request->id);
        }
        $ProjectData->location = $request->location;
        $ProjectData->type = $request->type;
        $ProjectData->builder = $request->builder;
        $ProjectData->project_name = $request->project_name;
        $ProjectData->price = $request->price;
        if($ProjectData->save())
        {
            if($request->file('project_images')!=null)
            {
                foreach($request->file('project_images') as $file)
                    {
                            $name = time().rand(1,50).'.'.$file->extension();
                            $file->move(public_path($request->project_name.'/uploads/projectimage'), $name); 
                            $path = $request->project_name.'/uploads/projectimage/'.$name; 
                            $images = new Image;
                            $images->image_path = $path;
                            $images->project_id = $ProjectData->id;
                            $images->save(); 
                    }
            }
            return redirect('project/list')->with('success','Project Added Successfully');
        }
        else
        {
            return redirect('project/list')->with('error','Something went wrong! Project Not Added');
        }

    }

    // public function UpdateProject(Request $request)
    // {
    //     $validated = $request->validate([
    //         'title'=>'requred|max:255',
    //         'description'=>'required',
    //     ]);
    //     $ProjectData = Project::find($request->id);
    //     $ProjectData->title = $request->title;
    //     $ProjectData->add_by = $request->add_by;
    //     $ProjectData->description = $request->description;
    //     if($request->file('project_image')!=null)
    //     {
    //         $name = time().rand(1,50).'.'.$request->file('project_image')->extension();
    //         $request->file('project_image')->move(public_path('uploads/projectimages'), $name); 
    //         $path = 'uploads/projectimages/'.$name; 
    //         $ProjectData->image_path = $path;
    //     }
    //     if($ProjectData->save())
    //     {
    //         return redirect('project/list')->with('success','Project Updated Successfully');
    //     }
    //     else
    //     {
    //         return redirect('project/list')->with('error','Something went wrong! Project Not Update');
    //     }

    // }

    public function DeleteProject(Request $request)
    {
      $delete = Project::destroy($request->id);
      return redirect('project/list')->with('success','Project Deleted Successfully');
    }
}










