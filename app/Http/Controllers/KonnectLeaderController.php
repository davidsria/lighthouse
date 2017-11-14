<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KonnectLeader;
use Session;

class KonnectLeaderController extends Controller
{
    public function store(Request $request){
        $response = $this->preStore($request);
        Session::flash('leaderResponse', $response);
        return redirect('/konnectArea/add');
    }
    
    protected function preStore(Request $request){
       $this->validate($request, [
        'name' => 'required|max:100',
        'user_id' => 'required',
        ]);  
       $leaders = $this->explodeLeaders($request->name);
        for($i=0; $i<count($leaders); $i++){
            $leader = new KonnectLeader;
            $leader->name = $leaders[$i];
            $leader->user_id = $request->user_id;
            $leader->save();
        }
        if(count($leaders)>1){
            return count($leaders)." Konnect leaders were successfully added";
        }else{
            return count($leaders)." Konnect leader was successfully added";
        }
    }

    public function explodeLeaders($request){
        $arrayLeader = explode(';', $request);
        return $arrayLeader;
    }

    public function show($id){
        $result = KonnectLeader::where('user_id', $id)->get();
        return $result;
    }

    public function destroy($id){
        $konnectLeader = KonnectLeader::find($id);
        $konnectLeader->delete();
        return response()->json(['success' => $konnectLeader->name." Konnect center successfully deleted"]);
    }

    public function update(Request $request, $id){
        $konnectLeader = KonnectLeader::find($id);
        $konnectLeader->update($request->all());
        return response()->json(['success' => "Successfully updated"]);
    }
}
