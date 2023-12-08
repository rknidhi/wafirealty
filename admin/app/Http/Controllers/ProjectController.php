<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Project;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use DataTables;
class ProjectController extends Controller
{
    public function ProjectList()
    {
        if(\request()->ajax()){
            $data = Project::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="/project/edit?id='.$row['id'].'" class="edit btn btn-success btn-sm">Edit</a> <a href="/project/delete?id='.$row['id'].'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        // dd($Projects);
        return view('project/list');
    }
    public function AddProject()
    {
        return view('project/add');
    }

    public function EditProject(Request $request)
    {
        $Projects = Project::find($request->id)->toArray();
        $images = Image::where('project_id',$request->id)->get()->toArray();
        if(!empty($Projects))
        {
            return view('project/add',['Projects'=>$Projects,'Images'=>$images]);
        }
        else
        {
            return redirect('project/list')->with('error','Project Not Found');
        }
    }

    public function CreateProject(Request $request)
    {
        // dd($request->file());die;
        $validator = $request->validate([
            'location'=>'required|max:255',
            'type'=>'required',
            'brand'=>'required',
            'project_name'=>'required',
            'price'=>'required',
            'metatitle' => 'required',
            'metadescription' => 'required',
            'configurations' => 'required',
            'status' => 'required',
            'rera_no' => 'required',
            'area' => 'required',
            'about_partner' => 'required',
            'about_project' => 'required',
            'why_choose' => 'required',
            'specification' => 'required',
            'amenities' => 'required',
            'about_developer' => 'required', 
            'map_location' => 'required',
            'home_project' => 'required',
           // 'project_images' => 'required',
               
        ]);        
        if(!empty($request->amenities))
        {
            $amenities = implode(', ',$request->amenities);
            
        }
        $ProjectData = new Project;
        date_default_timezone_set('Asia/Kolkata');
        if(isset($request->id) && $request->id!='') 
        {
            $ProjectData = Project::find($request->id);
            $ProjectData->updated_at = date("Y-m-d H:i:s");
        }
        else
        {
            $ProjectData->created_at = date("Y-m-d H:i:s");
        }
        $ProjectData->location = $request->location;
        $ProjectData->type = $request->type;
        $ProjectData->brand = $request->brand;
        $ProjectData->project_name = $request->project_name;
        $ProjectData->price = $request->price;
        $ProjectData->metatitle = $request->metatitle;
        $ProjectData->metadescription = $request->metadescription;
        $ProjectData->configurations = $request->configurations;
        $ProjectData->status = $request->status;
        $ProjectData->rera_no = $request->rera_no;
        $ProjectData->area = $request->area;
        $ProjectData->about_partner = $request->about_partner;
        $ProjectData->about_partner = $request->about_partner;
        $ProjectData->about_project = $request->about_project;
        $ProjectData->why_choose = $request->why_choose;
        $ProjectData->specification = $request->specification;
        $ProjectData->amenities = $amenities;
        $ProjectData->about_developer = $request->about_developer;
        $ProjectData->map_location = $request->map_location;
        $ProjectData->home_project = $request->home_project;
        if($ProjectData->save())
        {
            if($request->file('project_images')!=null)
            {
                foreach($request->file('project_images') as $file)
                    {
                            $name = time().rand(1,50).'.'.$file->extension();
                            $file->move(public_path('/uploads/projectimage/'.$request->project_name.'/'), $name); 
                            $path = '/uploads/projectimage/'.$request->project_name.'/'.$name; 
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
    public function getAllProject(Request $request)
    {
        $param = $request->query();
        $where = '';
        $query = '';
        $error_massege = '';
        $i = 0;
        if($request->isMethod('post'))
        {
            $filterdata = $request->all();
            if(!empty($filterdata))
            {
                foreach($filterdata as $filterkey => $filtervalue)
                {
                    $check = Schema::hasColumn('projets',$filterkey);
                    if($check!='')
                    {   
                        $i ++;
                        if($i==1)
                        {
                            $query = 'select * from projets where '.$filterkey.' LIKE "%'.$filtervalue.'%"';
                        }
                        else
                        {
                            $where .= ' and '.$filterkey.' LIKE "%'.$filtervalue.'%"';
                        }
                    }
                    else
                    {
                        $error_massege .=$filterkey.' Column Not Exist in Database';
                    }
                }
                if($query!='' && $where!='')
                {
                    $qry = $query.' '.$where;
                    $ProjectData = DB::select($qry);
                    if(empty($ProjectData))
                    {
                        $error_massege .= "Data Not Found";
                    }
                }
                else
                {
                    $ProjectData = array();
                    $error_massege .= 'Error in make query';
                }
                    if(!empty($ProjectData))
                {
                    $project = json_encode(array('status'=>'sucess','data'=>$ProjectData,'error_code'=>'10008'));
                }
                else
                {
                    $project = json_encode(array('status'=>'error','data'=>$error_massege,'error_code'=>'10009'));
                }
            }
        }
        else
        {
            if(isset($param) && !empty($param))
            {
                
                if(count($param)==1)
                {
                    
                    foreach($param as $key=>$value)
                    {
                        $check = Schema::hasColumn('projets',$key);
                        if(isset($check) && $check!='')
                        {
                            if($value!='')
                            {
                                if($key=='id')
                                {
                                    $ids = explode(',',$value);
                                    $ProjectData = Project::whereIn($key,$ids)->get()->toArray();
                                }
                                else
                                {
                                    $ProjectData = Project::where($key,$value)->get()->toArray();
                                }
                                if(!empty($ProjectData))
                                {
                                    $project = json_encode(array('status'=>'sucess','data'=>$ProjectData,'error_code'=>'10001'));
                                }
                                else
                                {
                                    $project = json_encode(array('status'=>'error','data'=>'Data Not Exist','error_code'=>'10002'));
                                }
                            } 
                        }
                        else
                        {
                            $error_massege .=$key.' Column Not Exist in Database';
                            $project = json_encode(array('status'=>'error','data'=>$error_massege,'error_code'=>'10003'));
                        }

                    }
                }
                else
                {
                    foreach($param as $key=>$value)
                    {
                        $check = Schema::hasColumn('projets',$key);
                        if(isset($check) && $check!='' && $check==0)
                        {
                            $i++;
                            if($i==1)
                            {
                                $query = 'select * from projets where '.$key.'= "'.$value.'"';
                            }
                            elseif($key=='id')
                            {
                                $where .= 'and '.$key.' in ('.$value.')';
                            }
                            else
                            {
                                $where .= 'and '.$key.'='.$value;
                            }
                        }
                        else
                        {
                            $error_massege .=$key.' Column Not Exist in Database';
                        }
                    }
                    if($query!='' && $where!='')
                    {
                        $qry = $query.' '.$where;
                        $ProjectData = DB::select($qry);
                    }
                    else
                    {   
                        $ProjectData = array();
                        $error_massege .= 'Error in make query';
                    }
                    if(!empty($ProjectData))
                    {
                        $project = json_encode(array('status'=>'sucess','data'=>$ProjectData,'error_code'=>'10004'));
                    }
                    else
                    {
                        $project = json_encode(array('status'=>'error','data'=>$error_massege,'error_code'=>'10005'));
                    }
                }
                
            }
            else
            {
                $ProjectData = Project::all()->toArray();
                if(!empty($ProjectData))
                {
                    $project = json_encode(array('status'=>'sucess','data'=>$ProjectData,'error_code'=>'10006'));
                }
                else
                {
                    $project = json_encode(array('status'=>'error','data'=>'','error_code'=>'10007'));
                }
            }
        }
        return $project;
    }
}










