<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GeographicalName;
use Session;

class GeographicalNamesController extends Controller
{
    //

    public function store(Request $request){
        $response = $this->preStore($request);
        Session::flash('geographicalResponse', $response);
        return redirect('/konnectArea/add');
    }


     protected function preStore(Request $request){
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


    public function show($id){
        $result = GeographicalName::where('user_id', $id)->get();
        return $result;
    }

    public function destroy($id){
        $geographical = GeographicalName::find($id);
        $geographical->delete();
        return response()->json(['success' => $geographical->name." successfully deleted as a geographical name"]);
    }

    public function update(Request $request, $id){
        $geographical = GeographicalName::find($id);
        $geographical->update($request->all());
        return response()->json(['success' => "Updated successfully"]);
    }

}
