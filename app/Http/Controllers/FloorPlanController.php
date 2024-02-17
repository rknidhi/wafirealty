<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FloorPlan;
use App\Models\Project;
use Illuminate\Http\Request;
use DataTables;
class FloorPlanController extends Controller
{
    public function FloorPlanList()
    {
        if(\request()->ajax()){
            $data = FloorPlan::orderBy('pid')->get()->toArray();
            dd($data);
            foreach($data as $k=>$dt)
            {
                $projectname = Project::find($dt['pid'])->toArray();
                $data[$k]['pname'] = $projectname['project_name'];
            }
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="/floorplan/edit?id='.$row['id'].'" class="edit btn btn-success btn-sm">Edit</a> <a href="/florrplan/delete?id='.$row['id'].'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('floorplan.list');
    }

    public function AddFloorPlan()
    {
        $project = Project::all()->toArray();
        $option = '<option></option>';
        foreach($project as $pro)
        {
            $option .= '<option value="'.$pro['id'].'">'.$pro['project_name'].'</option>';
        }
        return view('floorplan.add',compact('option'));
    }

    public function CreateFloorPlan(Request $req)
    {
        $data = $req->all();
        for($i=1;$i<=$req->room;$i++)
        {
            $Floorplan = new FloorPlan;
            date_default_timezone_set('Asia/Kolkata');
            if(isset($req->id) && $req->id!='') 
            {
                $Floorplan = FloorPlan::find($req->id);
                $Floorplan->updated_at = date("Y-m-d H:i:s");
            }
            else
            {
                $Floorplan->created_at = date("Y-m-d H:i:s");
            }
            if($req->file('plan_'.$i)!=null)
            {
                $name = time().rand(1,50).'.'.$req->file('plan_'.$i)->extension();
                $req->file('plan_'.$i)->move(public_path('/uploads/floorplan/'.$req->pid.'/'), $name); 
                $path = '/uploads/floorplan/'.$req->pid.'/'.$name; 
                $Floorplan->pid = $req->pid;
                $Floorplan->room = $i;
                $Floorplan->image = $path;
                $Floorplan->save();
            }
        }
        return redirect('/floorplan/list')->with('success','Floor Plan Added');
    }
}
