<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    //

    public function index(){
        return view('attendance.view_Reports');
    }

    public function add(){
        return view('attendance.add_attendance');
    }
}
