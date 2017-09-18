<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
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


   


    public function addKonnectArea(){
        $konnectAreas = User::all();
        return view('konnectArea.addKonnectArea', compact('konnectAreas'));
    }

    public function createKonnectArea(Request $request){
       if(User::create([
           'name' => $request->name,
           'password' => bcrypt($request->password),
       ])){
           Session::flash('areaSuccess', 'successfully added');
           return redirect('/konnectArea/add');
       }
       Session::flash('areaSuccess', 'something went wrong, try again');
       return redirect('/konnectArea/add');
    }

    public function createKonnectCenter(Request $request){
       if(KonnectCenter::create($request->all())){
           Session::flash('centerSuccess', 'successfully added');
           return redirect('/konnectArea/add');
       }
       Session::flash('centerSuccess', 'something went wrong, try again');
       return redirect('/konnectArea/add');
    }

    public function createGeographicalName(Request $request){
       if(GeographicalName::create($request->all())){
           Session::flash('geographicSuccess', 'successfully added');
           return redirect('/konnectArea/add');
       }
       Session::flash('geographicSuccess', 'something went wrong, try again');
       return redirect('/konnectArea/add');
    }

    public function createKonnectPastor(Request $request){
       if(KonnectPastor::create($request->all())){
           Session::flash('pastorSuccess', 'successfully added');
           return redirect('/konnectArea/add');
       }
       Session::flash('pastorSuccess', 'something went wrong, try again');
       return redirect('/konnectArea/add');
    }

    public function viewKonnectArea(){
        $konnectAreas = User::latest('updated_at')->paginate(5);
        $geographicalNames = GeographicalName::latest('updated_at')->paginate(5);
        $konnectPastors = KonnectPastor::latest('updated_at')->paginate(5);
        return view('konnectArea.viewKonnectArea', compact('konnectAreas', 'geographicalNames', 'konnectPastors'));
    }
}
