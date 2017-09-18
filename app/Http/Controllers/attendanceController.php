<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class attendanceController extends Controller
{
    public function index(){
        return view('attendance.view_attendance');
    }


    public function create(){
        return view('attendance.add_attendance');
    }
}
