<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GeographicalName;
use Session;

class GeographicalNamesController extends Controller
{
    //

    public function store(Request $request){
        $response = $this->create($request);
        Session::flash('geographicalResponse', $response);
        return redirect('/konnectArea/add');
    }

     protected function create(Request $request){
       $this->validate($request, [
        'name' => 'required|max:100',
        'user_id' => 'required',
        ]);   
       if(GeographicalName::create($request->all())){
           $response = 'successfully added';
       }else{
           $response = 'something went wrong, try again';
       }
       return $response;
    }

    public function getAll($id){
        $result = GeographicalName::where('user_id', $id)->get();
        return $result;
    }

}
