<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Project;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $members = Member::where('user_id', $id)->get();
        $projects = Project::where('user_id', $id)->get();
        return view('dashboard',compact('members','projects'));
    }
}
