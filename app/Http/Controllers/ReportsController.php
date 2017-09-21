<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index(){
        return view('report');
    }

    public function create(){
        return view('attendance.add_attendance');
    }

    public function store(){
        
    }
}
