<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use DataTables;
class HomeController extends Controller
{
    public function Index()
    {
        $Projects = Project::all()->count();
        $UnderCustructionProperty = Project::where('status','Under Cunstruction')->count();
        $ReadyToMoveProperty = Project::where('status','Ready To Move')->count();
        $SoldProperty = Project::where('status','Sold')->count();
        if(\request()->ajax()){
            $data = Project::latest()->take(5)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('index',compact('Projects','UnderCustructionProperty','ReadyToMoveProperty','SoldProperty'));
    }
}
