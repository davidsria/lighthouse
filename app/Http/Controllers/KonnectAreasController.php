<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;

class KonnectAreasController extends Controller
{
    //

    public function index(){
        $konnectAreas = User::latest('updated_at')->paginate(5);
        return view('konnectArea.viewKonnectArea', compact('konnectAreas'));
        
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


    public function destroy($id){
        $konnectArea = User::find($id);
        $konnectArea->delete();
    }

}
