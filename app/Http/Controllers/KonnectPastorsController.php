<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KonnectPastor;
use Session;

class KonnectPastorsController extends Controller
{
    //

    public function store(Request $request){
        $response = $this->create($request);
        Session::flash('pastorResponse', $response);
        return redirect('/konnectArea/add');
    }
    
    protected function create(Request $request){
       if(KonnectPastor::create($request->all())){
            $response = 'successfully added';
       }else{
           $response = 'something went wrong, try again';
       }
       return $response;
    }

    public function getAll($id){
        $result = KonnectPastor::where('user_id', $id)->get();
        return $result;
    }
}
