<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\KonnectCenter;
use App\GeographicalName;
use App\KonnectPastor;
use App\KonnectLeader;
use Session;

class KonnectAreasController extends Controller
{
    //

    public function index(Request $id){
        $konnectAreas = User::all();
        $konnectArea_details = User::find($id);
        $konnectcenters = KonnectCenter::find($id);
        $konnectpastors = KonnectPastor::find($id);
        $geonames = GeographicalName::find($id);
        return view('konnectArea.viewKonnectArea', compact('konnectAreas','konnectArea_details','geonames','konnectcenters','konnectpastors'));
        
    }


     public function create(){
        $konnectAreas = User::all();
        return view('konnectArea.addKonnectArea', compact('konnectAreas'));
    }


    public function store(Request $request){
        $response = $this->preStore($request);
        Session::flash('areaResponse', $response);
        return redirect('/konnectArea/add');
    }


    protected function preStore(Request $request){
       $this->validate($request, [
        'name' => 'required|max:100',
        'password' => 'required',
        ]); 

       if(User::create([
           'name' => $request->name,
           'password' => bcrypt($request->password),
       ])){
           $response = 'successfully added';
          
       }else{
           $response = 'something went wrong, try again';
       }
       return $response;
    }

    public function update(Request $request, $id){
        $konnectArea = User::find($id);
        $konnectArea->update($request->all());
    }

    public function destroy($id){
        $konnectArea = User::find($id);
        $konnectArea->delete();
    }

}
