<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;

class KonnectAreasController extends Controller
{
    //

    public function index(){
        $konnectAreas = User::all();
        return view('konnectArea.addKonnectArea', compact('konnectAreas'));
    }

    public function store(Request $request){
        $response = $this->create($request);
        Session::flash('areaResponse', $response);
        return redirect('/konnectArea/add');
    }

    protected function create(Request $request){
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

    public function view(){
        $konnectAreas = User::latest('updated_at')->paginate(5);
        return view('konnectArea.viewKonnectArea', compact('konnectAreas'));
    }

    public function delete($id){
        $konnectArea = User::find($id);
        $konnectArea->delete();
    }

}
