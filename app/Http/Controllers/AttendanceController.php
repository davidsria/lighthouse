<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Attendance;
use App\Http\Requests\AddAttendance;
use Carbon\Carbon;
use Session;
use Auth;

class AttendanceController extends Controller
{
    //

    public function index(){
        $id = Auth::user()->id;
        $date = Carbon::today()->format('d-m-Y');
        $attendances = Attendance::where('user_id', $id)->latest('created_at')->get();
        return view('attendance.view_attendance',compact('date','attendances'));
    }

    public function create(){
        $date = Carbon::today()->format('d-m-Y');
        return view('attendance.add_attendance',compact('date'));
    }

    public function store(AddAttendance $request){
        
        if(auth()->user()->submit(
            new Attendance(request()->all())
        )){
            $response = 'Successfully added';
        }

        Session::flash('attendanceResponse', $response);
        return back();
    }

    public function printer(){

        $id = Auth::user()->id;
        $date = Carbon::today()->format('d-m-Y');
        $attendances = Attendance::where('user_id', $id)->latest('created_at')->get();
        return view('attendance.printAttendance',compact('date','attendances'));
    }
}
