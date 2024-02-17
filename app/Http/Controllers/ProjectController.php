<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Image;
use App\Models\Project;
use App\Models\ProjectType;
use App\Models\ProjectAmenities;
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
        $brands = Brand::all()->toArray();
        $amenity = ProjectAmenities::all()->toArray();
        $option ='<option></option>';
        $amenityoption = '<option></option>';
        if(!empty($brands))
        {
           
            foreach($brands as $brand)
            {
                $option .= '<option value="'.$brand['name'].'">'.$brand['name'].'</option>';
            }
        }
        if(!empty($amenity))
        {
           
            foreach($amenity as $amt)
            {
                $amenityoption .= '<option value="'.$amt['amenity'].'">'.$amt['amenity'].'</option>';
            }
        }
        $projecttype = ProjectType::all()->toArray();
        $typeoption ='<option></option>';
        if(!empty($projecttype))
        {
           
            foreach($projecttype as $type)
            {
                $typeoption .= '<option value="'.$type['type'].'">'.$type['type'].'</option>';
            }
        }
        return view('project/add',['option'=>$option,'typeoption'=>$typeoption,'amenityoption'=>$amenityoption]);
    }
    
    public function EditProject(Request $request)
    {
        $Projects = Project::find($request->id)->toArray();
        $images = Image::where('project_id',$request->id)->get()->toArray();
        $brands = Brand::all()->toArray();
        $amenity = ProjectAmenities::all()->toArray();
        $option ='<option></option>';
        $amenityoption = '<option></option>';
        if(!empty($amenity))
        {
           
            foreach($amenity as $amt)
            {
                $amenityoption .= '<option value="'.strtolower($amt['amenity']).'">'.ucfirst($amt['amenity']).'</option>';
            }
        }
        if(!empty($brands))
        {
            foreach($brands as $brand)
            {   
                $select='';
                if($brand['name']==$Projects['brand']){$select = "selected";}
                $option .= '<option value="'.$brand['name'].'" '.$select.'>'.$brand['name'].'</option>';
            }
        }
        $projecttype = ProjectType::all()->toArray();
        $typeoption ='<option></option>';
        if(!empty($projecttype))
        {
           
            foreach($projecttype as $type)
            {
                $select1='';
                if($type['type']==$Projects['type']){$select1 = "selected";}
                $typeoption .= '<option value="'.$type['type'].'" '.$select1.'>'.$type['type'].'</option>';
            }
        }
        if(!empty($Projects))
        {
            return view('project/add',['Projects'=>$Projects,'Images'=>$images,'option'=>$option,'typeoption'=>$typeoption,'amenityoption'=>$amenityoption]);
        }
        else
        {
            return redirect('project/list')->with('error','Project Not Found');
        }
    }   

    public function CreateProject(Request $request)
    {
        // dd($request->file());die;
        // $validator = $request->validate([
        //     'location'=>'required|max:255',
        //     'type'=>'required',
        //     'brand'=>'required',
        //     'project_name'=>'required',
        //     'price'=>'required',
        //     'metatitle' => 'required',
        //     'metadescription' => 'required',
        //     'configurations' => 'required',
        //     'status' => 'required',
        //     'rera_no' => 'required',
        //     'area' => 'required',
        //     'about_partner' => 'required',
        //     'about_project' => 'required',
        //     'why_choose' => 'required',
        //     'specification' => 'required',
        //     'amenities' => 'required',
        //     'about_developer' => 'required', 
        //     'map_location' => 'required',
        //     'home_project' => 'required',
        //    // 'project_images' => 'required',
               
        // ]); 
        
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
            $ProjectData->updated_by = $request->session()->get('id');
        }
        else
        {
            $ProjectData->created_at = date("Y-m-d H:i:s");
            $ProjectData->add_by = $request->session()->get('id');
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
                $ProjectData = Project::join('project_image','projets.id', '=', 'project_image.project_id')->groupBy('project_image.project_id')->get()->toArray();
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

    ///Project Type Contollers
    public function ProjectTypeList()
    {
        if(\request()->ajax()){
            $data = ProjectType::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="/projecttype/edit?id='.$row['id'].'" class="edit btn btn-success btn-sm">Edit</a> <a href="/projecttype/delete?id='.$row['id'].'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        // dd($Projects);
        return view('projecttype/list');
    }
    public function AddProjectType()
    {
        return view('projecttype/add');
    }
    
    public function EditProjectType(Request $request)
    {
        $Projects = ProjectType::find($request->id)->toArray();
        if(!empty($Projects))
        {
            return view('projecttype/add',['Projects'=>$Projects]);
        }
        else
        {
            return redirect('projecttype/list')->with('error','Project Type Not Found');
        }
    }   

    public function CreateProjectType(Request $request)
    {
        // dd($request->file());die;
        $validator = $request->validate([
            'status'=>'required',
            'type'=>'required',
        ]);        
        
        $ProjectData = new ProjectType;
        date_default_timezone_set('Asia/Kolkata');
        if(isset($request->id) && $request->id!='') 
        {
            $ProjectData = ProjectType::find($request->id);
            $ProjectData->updated_at = date("Y-m-d H:i:s");
        }
        else
        {
            $ProjectData->created_at = date("Y-m-d H:i:s");
        }
        $ProjectData->status = $request->status;
        $ProjectData->type = $request->type;
        if($ProjectData->save())
        {
            return redirect('projecttype/list')->with('success','Project Type Added Successfully');
        }
        else
        {
            return redirect('projecttype/list')->with('error','Something went wrong! Project Type Not Added');
        }

    }
   
    public function DeleteProjectType(Request $request)
    {

      $delete = ProjectType::destroy($request->id);
      return redirect('projecttype/list')->with('success','Project Type Deleted Successfully');
    }
    
    ///Project Amanities Contollers
    public function ProjectAmenityList()
    {
        if(\request()->ajax()){
            $data = ProjectAmenities::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="/projectamenities/edit?id='.$row['id'].'" class="edit btn btn-success btn-sm">Edit</a> <a href="/projectamenities/delete?id='.$row['id'].'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        // dd($Projects);
        return view('amenities/list');
    }
    public function AddProjectAmenity()
    {
        return view('amenities/add');
    }
    
    public function EditProjectAmenity(Request $request)
    {
        $Projects = ProjectAmenities::find($request->id)->toArray();
        if(!empty($Projects))
        {
            return view('amenities/add',['Projects'=>$Projects]);
        }
        else
        {
            return redirect('projectamenities/list')->with('error','Project Amenity Not Found');
        }
    }   

    public function CreateProjectAmenity(Request $request)
    {
        // dd($request->file());die;
        $validator = $request->validate([
            'status'=>'required',
            'amenity'=>'required',
        ]);        
        
        $ProjectData = new ProjectAmenities;
        date_default_timezone_set('Asia/Kolkata');
        if(isset($request->id) && $request->id!='') 
        {
            $ProjectData = ProjectAmenities::find($request->id);
            $ProjectData->updated_at = date("Y-m-d H:i:s");
        }
        else
        {
            $ProjectData->created_at = date("Y-m-d H:i:s");
        }
        $ProjectData->status = $request->status;
        $ProjectData->amenity = $request->amenity;
        if($ProjectData->save())
        {
            return redirect('projectamenities/list')->with('success','Project Amenity Added Successfully');
        }
        else
        {
            return redirect('projectamenities/list')->with('error','Something went wrong! Project Amenity Not Added');
        }

    }
   
    public function DeleteProjectAmenity(Request $request)
    {

      $delete = ProjectAmenities::destroy($request->id);
      return redirect('projectamenities/list')->with('success','Project Amenity Deleted Successfully');
    }
}










