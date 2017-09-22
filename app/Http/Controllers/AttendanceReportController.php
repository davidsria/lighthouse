<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Attendance;
use App\Http\Requests\AddAttendance;

class AttendanceController extends Controller
{
    //

    public function index(){
        return view('attendance.view_attendance');
    }

    public function create(){
        return view('attendance.add_attendance');
    }

    public function store(AddAttendance $request){
        $response = 'Member successfully added';

        auth()->user()->submit(
            new Attendance(request()->all())
        );

        return back();
    }
}
