<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Attendance;
use App\Http\Requests\AddAttendance;
use Carbon\Carbon;
use Session;
use Auth;
use App\Report;

class AttendanceController extends Controller
{
    //

    public function index(){
        $id = Auth::user()->id;
        $date = Carbon::today()->format('d-m-Y');
        $attendances = Attendance::where('user_id', $id)->latest('created_at')->get();
        foreach($attendances as $attendance){
            $attendance['date'] = $this->getDate($attendance['report_id'], $attendance['day']);
        }
        return view('attendance.view_attendance',compact('date','attendances'));
    }

    private function getMeetingHold($data){
        if($data==1){
            $response = "Yes";
        }elseif($data==0){
            $response = "No";
        }else{
            $response = "Invalid";
        }
        return $response;
    }

    private function getDate($report_id, $day){
        $date = Report::find($report_id);
        $response = $date['month'].' '.$day.', '.$date['year'];
        return $response;
    }

    public function create(){
        $date = Carbon::today()->format('d-m-Y');
        $reports = Report::all();
        return view('attendance.add_attendance',compact('date', 'reports'));
    }

    public function store(){

        try{
            auth()->user()->submit(
                new Attendance(request()->all())
            );
            $response = 'Successfully added';
            Session::flash('attendanceResponse', $response);
            return back();
        }
        catch(Exception $e){
            return $e->getMessage();
        }
        
    }

    public function printer(){

        $id = Auth::user()->id;
        $date = Carbon::today()->format('d-m-Y');
        $attendances = Attendance::where('user_id', $id)->latest('created_at')->get();
        foreach($attendances as $attendance){
            $attendance['date'] = $this->getDate($attendance['report_id'], $attendance['day']);
        }
        return view('attendance.printAttendance',compact('date','attendances'));
    }
}
