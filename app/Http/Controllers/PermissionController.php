<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;   
use DataTables;

class PermissionController extends Controller
{
    public function PermissionList()
    {
        if(\request()->ajax()){
            $data = User::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" onclick="getUserPermission('.$row['id'].')" class="edit btn btn-success btn-sm">Edit</a> <a href="/permission/delete?id='.$row['id'].'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action','user'])
                ->make(true);
        }
        return view('permission/list');
    }
    public function AddPermission()
    {
        return view('permission/add');
    }

    public function EditPermission(Request $request)
    {
        $permission = Permission::find($request->id)->toArray();
        if(!empty($permission))
        {
            return view('permission/add',['permission'=>$permission]);
        }
        else
        {
            return redirect('/permission/list')->with('error','Permission Not Found');
        }
    }

    public function CreatePermission(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'name'=>'required',
            'status'=>'required',
        ])->validate();
        $permission = new Permission;
        date_default_timezone_set('Asia/Kolkata');
        if(isset($request->id) && $request->id!='') 
        {
            $permission = Permission::find($request->id);
            $permission->updated_at = date("Y-m-d H:i:s");
        }
        else
        {
            $permission->created_at = date("Y-m-d H:i:s");
        }
        $permission->name = $request->name;
        $permission->status = $request->status;
        if($permission->save())
        {
            return redirect('/permission/list')->with('success','Permission Added Successfully');
        }
        else
        {
            return redirect('/permission/list')->with('error','Something went wrong! Permission Not Added');
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

    public function DeletePermission(Request $request)
    {
      $delete = Permission::destroy($request->id);
      return redirect('/permission/list')->with('success','Permission Deleted Successfully');
    }

    public function getAllPermission(Request $request)
    {
        $user = User::find($request->id);
        $allPermissions = Permission::where('userid',$request->id)->get()->toArray();
        $modules = Module::all();
        return response()->view('permission/allpermission', compact('allPermissions','user','modules'));
    }
    public function addUserPermission(Request $request)
    {
        $setPermission = new Permission;
        $permissions = $request->all();
        $userid = $permissions['userid'];
        $username = $permissions['username'];
        unset($permissions['_token']);
        unset($permissions['userid']);
        unset($permissions['username']);
        if(!empty($permissions))
        {
            foreach($permissions as $key => $value)
            {
                $explode = explode('_', $key);
                $moduleid = $explode[0];
                $permission[$moduleid-1][$explode[1]] = $value;
                $permission[$moduleid-1]['userid'] = $userid;
                $permission[$moduleid-1]['username'] = $username;
                $permission[$moduleid-1]['module'] = $moduleid;
               
            }
            foreach($permission as $value)
            {
                $setPermission->insert($value);
            }
        }

    }
}
