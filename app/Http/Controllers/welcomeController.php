<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Member;
use Session;
use App\KonnectCenter;
use App\GeographicalName;
use App\KonnectPastor;

class welcomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('dashboard');
    }
}
