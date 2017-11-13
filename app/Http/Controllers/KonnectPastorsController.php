<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KonnectPastor;
use Session;

class KonnectPastorsController extends Controller
{
    //

    public function store(Request $request){
        $response = $this->preStore($request);
        Session::flash('pastorResponse', $response);
        return redirect('/konnectArea/add');
    }
    
    protected function prestore(Request $request){
       $this->validate($request, [
        'name' => 'required|max:100',
        'user_id' => 'required',
        ]);
        $pastors = $this->explodePastors($request->name);
        for($i=0; $i<count($pastors); $i++){
            $pastor = new KonnectPastor;
            $pastor->name = $pastors[$i];
            $pastor->user_id = $request->user_id;
            $pastor->save();
        }
        if(count($pastors)>1){
            return count($pastors)." Konnect pastors were successfully added";
        }else{
            return count($pastors)." Konnect pastor was successfully added";
        }
    }

    public function explodePastors($request){
        $arrayPastor = explode(';', $request);
        return $arrayPastor;
    }

    public function show($id){
        $result = KonnectPastor::where('user_id', $id)->get();
        return $result;
    }

    public function destroy($id){
        $konnectPastor = KonnectPastor::find($id);
        $konnectPastor->delete();
        return response()->json(['success' => $konnectPastor->name." successfully deleted"]);
    }

    public function update(Request $request, $id){
        $konnectPastor = KonnectPastor::find($id);
        $konnectPastor->update($request->all());
        return response()->json(['success' => "Successfully updated"]);
    }
}
