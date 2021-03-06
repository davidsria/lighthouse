<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KonnectCenter;
use Session;

class KonnectCenterController extends Controller
{
    //
    

    public function store(Request $request){
        $response = $this->preStore($request);
        Session::flash('centerResponse', $response);
        return redirect('/konnectArea/add');
    }
    
    protected function preStore(Request $request){
       $this->validate($request, [
        'name' => 'required|max:100',
        'user_id' => 'required',
        ]);  

       if(KonnectCenter::create($request->all())){
           $response = 'successfully added';
       }else{
           $response = 'something went wrong, try again';
       }
       return $response;
    }
    public function show($id){
        $result = KonnectCenter::where('user_id', $id)->get();
        return $result;
    }

    public function update(Request $request, $id){
        $konnectCenter = KonnectCenter::find($id);
        $konnectCenter->update($request->all());
        return response()->json(['success' => "Konnect area succesfully updated"]);
    }
}
