<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index(){
        return view('attendance.view_Reports');
    }

    public function create(){
        return view('attendance.add_attendance');
    }

    public function store(){
        
    }
}
