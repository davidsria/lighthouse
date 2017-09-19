<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Illuminate\Support\Facades\Auth;
use Session;
use App\GeographicalName;
use Excel;
use Carbon\Carbon; 

class MembersController extends Controller
{
    //

    /* show the view */
    public function index(){
        return view('member.add');
    }

    /* get all members for a konnect area */
    public function getAll($id){
        $result = Member::where('user_id', $id)->get();
        return $result;
    }

    /* get a member details */
    public function getMember($id){
        $members = Member::where('id', $id)->get();
        foreach($members as $member){
            $getGeographicalId = $member['geographicalName_id'];
            $member['geographicalName_id'] = $this->getGeographicalName($getGeographicalId);
        }
        return $members;
    }

    /* redirect after insertion */
    public function store(Request $request){
        $response = $this->create($request);
        Session::flash('memberResponse', $response);
        return redirect('/members/add');
    }

    /* get geographicalName id */
    public function getGeographicalId($name){
        $result = GeographicalName::where('name', $name)->first();
        return $result['id'];
    }

     /* get geographicalName from given Id */
    public function getGeographicalName($id){
        $result = GeographicalName::where('id', $id)->first();
        return $result['name'];
    }

    /* insert to database a member */
    public function create(Request $request){
       if(Member::create([
           'geographicalName_id' => $request['geographicalName_id'],
           'name' => $request['name'],
           'status' => $request['status'],
           'email' => $request['email'],
           'sex' => $request['sex'],
           'telephone' => $request['telephone'],
           'address' => $request['address'],
           'user_id' => Auth::user()->id,
           ])){
           $response = 'Member successfully added';
       }else{
           $response = "Something went wrong";
       }
       return $response;
    }

    /* read excel of multiple members */
    public function generate(Request $request){
        $members = array();
        if($request->hasFile('membersList')) {
            if ($request->file('membersList')->isValid()) {
                $path = $request->file('membersList')->getRealPath();
                //load excel sheet from path
                $data = Excel::load($path, function ($reader) {
                    $reader->select(array('name','email', 'telephone', 'sex', 'address', 'status','geographical','user_id'))->get();
                });
               foreach ($data->all() as $key) { 
                   /* gets the geographicalName Id */
                   $result = $this->getGeographicalId($key->geographical);
                   if($result){  
                        $members[] = [
                            'name' => $key->name,
                            'email' => $key->email,
                            'telephone' => $key->telephone,
                            'sex' => $key->sex,
                            'address' => $key->address,
                            'status' => $key->status,
                            'geographicalName_id' => $result,
                            'user_id' => Auth::user()->id,
                        ];                 
                    }
                }
            }
        }
        return $this->storeMultiple($members);
    }

    /* to insert the members list into the database */
    public function storeMultiple(array $requests){
        foreach($requests as $request){
            Member::create($request);
        }
        Session::flash('multipleResponse', 'Successfully added');
        return redirect('/members/add');
    }

    /* display the view */
    public function view(){
        $id = Auth::user()->id;
        $carbon_today = Carbon::today();
        $date = $carbon_today->format('d-m-Y');
        $members = Member::where('user_id', $id)->get();
        $geographicalNames = GeographicalName::where('user_id', $id)->get();
        foreach($members as $member){
            $getGeographicalId = $member['geographicalName_id'];
            $member['geographicalName_id'] = $this->getGeographicalName($getGeographicalId);
        }
       return view('member.viewMembers', compact('date', 'members', 'geographicalNames'));
    }

    /* display the view */
    public function print(){
        $id = Auth::user()->id;
        $carbon_today = Carbon::today();
        $date = $carbon_today->format('d-m-Y');
        $members = Member::where('user_id', $id)->get();
        $geographicalNames = GeographicalName::where('user_id', $id)->get();
        foreach($members as $member){
            $getGeographicalId = $member['geographicalName_id'];
            $member['geographicalName_id'] = $this->getGeographicalName($getGeographicalId);
        }
       return view('member.printMembers', compact('date', 'members', 'geographicalNames'));
    }

    /* deletes a member */
    public function delete($id){
        $member = Member::find($id);
        $member->delete();
    }

    /* updates a member */
    public function update(Request $request, $id){
        $member = Member::find($id);
        $member->update($request->all());
    }
}

