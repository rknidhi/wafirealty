<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TaskReport;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use DataTables;
class TaskReportController extends Controller
{
    public function AddReport(Request $request)
    {
        $id = Session()->get('id');
        $username = Session()->get('name');
        $report = TaskReport::find($request->id);
        return view('report/add',['report'=>$report,'userid'=>$id,'username'=>$username]);
    }
    public function CreateReport(Request $request)
    {
        $report = new TaskReport;
        if($request->id!='')
        {
            $report = TaskReport::find($request->id);
        }
        $report->title = $request->title;
        $report->description = $request->description;
        $report->username = $request->username;
        $report->userid = $request->userid;
        $report->date = strtotime($request->date);
        if($report->save())
        {
            return redirect('report/myreport')->with('success','Report Added Successfully');
        }
        else
        {
            return redirect('report/myreport')->with('error','Something went wrong! Report Not Added');
        }
    }
    public function MyReport()
    {
        $userid = Session()->get('id');
        if(\request()->ajax()){
            $data = TaskReport::where('userid',$userid)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="/report/add?id='.$row['id'].'" class="edit btn btn-success btn-sm">Edit</a> <a href="/report/delete?id='.$row['id'].'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->addColumn('newdate',function($row){
                    $date = date('d-m-Y',$row['date']);
                    return $date;
                })
                ->addColumn('newdescription',function($row){
                    $description = strip_tags($row['description']);
                    return $description;
                })
                ->rawColumns(['action','newdate'])
                ->make(true);
        }
        return view('report/myreport');
    }
    public function AllReports()
    {
        $userid = Session()->get('id');
        $usertype = Session()->get('type');
        if($usertype=='super admin')
        {
            if(\request()->ajax()){
                $data = TaskReport::all();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('newdate',function($row){
                        $date = date('d-m-Y',$row['date']);
                        return $date;
                    })
                    ->addColumn('action', function($row){
                        $actionBtn = '<a href="/report/add?id='.$row['id'].'" class="edit btn btn-success btn-sm">View</a>';
                        return $actionBtn;
                    })
                    ->rawColumns(['action','newdate'])
                    ->make(true);
            }
            return view('report/allreport');
        }
        else
        {
            return view('unauthorized');
        }
    }
    public function DeleteReport(Request $request)
    {

      $delete = TaskReport::destroy($request->id);
      return redirect('report/myreport')->with('success','Report Deleted Successfully');
    }
}
