<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Illuminate\Support\Facades\Auth;
use Session;
use App\GeographicalName;
use Excel;
use Carbon\Carbon; 
use Illuminate\Foundation\Validation\ValidatesRequests;

class MembersController extends Controller
{
    //

    /* display the view */
    public function index(){
        $id = Auth::user()->id;
        $carbon_today = Carbon::today();
        $date = $carbon_today->format('d-m-Y');
        $members = Member::where('user_id', $id)->get();
        $geographicalNames = GeographicalName::where('user_id', $id)->get();
        foreach($members as $member){
            $getGeographicalId = $member['geographicalName_id'];
            $member['geographicalName_id'] = $this->showGeographicalName($getGeographicalId);
        }
       return view('member.viewMembers', compact('date', 'members', 'geographicalNames'));
    }
    
    /* show the view */
    public function create(){
        return view('member.add');
    }

    /* get all members for a konnect area */
    public function show($id){
        $result = Member::where('user_id', $id)->get();
        return $result;
    }

    /* get a member details */
    public function showMember($id){
        $members = Member::where('id', $id)->get();
        foreach($members as $member){
            $getGeographicalId = $member['geographicalName_id'];
            $member['geographicalName_id'] = $this->showGeographicalName($getGeographicalId);
        }
        return $members;
    }

    /* redirect after insertion */
    public function store(Request $request){
        $response = $this->preStore($request);
        Session::flash('memberResponse', $response);
        return redirect('/members/add');
    }

    /* get geographicalName id */
    public function showGeographicalId($name, $user_id){
        $result = GeographicalName::where([
                ['name', $name],
                ['user_id', $user_id],
            ])->first();
        return $result['id'];
    }

     /* get geographicalName from given Id */
    public function showGeographicalName($id){
        $result = GeographicalName::where('id', $id)->first();
        return $result['name'];
    }

    /* insert to database a member */
    public function preStore(Request $request){
        $this->validate($request, [
        'name' => 'required|max:100',
        'email' => 'required',
        'geographicalName_id' => 'required',
        'sex' => 'required|max:6',
        'status' => 'required|max:8',
        'telephone' => 'required|max:20',
        'address' => 'required',
        'birthday'=>'required',
        ]);

       if(Member::create([
           'geographicalName_id' => $request['geographicalName_id'],
           'name' => $request['name'],
           'status' => $request['status'],
           'email' => $request['email'],
           'sex' => $request['sex'],
           'telephone' => $request['telephone'],
           'address' => $request['address'],
           'birthday' => $request['birthday'],
           'anniversary' => $request['anniversary'],
           'user_id' => Auth::user()->id,
           ])){
           $response = 'Member successfully added';
       }else{
           $response = "Something went wrong";
       }
       return $response;
    }

    /* read excel of multiple members */
    public function multipleMembers(Request $request){
        $validMembers = array();
        $invalidMembers = array();
        if($request->hasFile('membersList')) {
            if ($request->file('membersList')->isValid()) {
                $path = $request->file('membersList')->getRealPath();
                //load excel sheet from path
                $data = Excel::load($path, function ($reader) {
                    $reader->select(array('name','email', 'telephone', 'sex', 'address', 'status','geographical','user_id'))->get();
                });
               foreach ($data->all() as $key) { 
                   /* gets the geographicalName Id */
                   $user_id = Auth::user()->id;
                   $result = $this->showGeographicalId($key->geographical,$user_id);
                   if($result){  
                        $validMembers[] = [
                            'name' => $key->name,
                            'email' => $key->email,
                            'telephone' => $key->telephone,
                            'sex' => $key->sex,
                            'address' => $key->address,
                            'status' => $key->status,
                            'geographicalName_id' => $result,
                            'user_id' => $user_id,
                        ];                 
                    }else{
                        $invalidMembers[] = [
                            'name' => $key->name,
                            'email' => $key->email,
                            'telephone' => $key->telephone,
                            'sex' => $key->sex,
                            'address' => $key->address,
                            'status' => $key->status,
                            'geographicalName_id' => $key->geographical,
                            'user_id' => $user_id,
                        ];

                    }
                }
            }
        }
        return $this->storeMultiple([$validMembers, $invalidMembers]);
    /*return $this->storeMultiple($validMembers);*/
    }


    /* to insert the members list into the database */
    public function storeMultiple(array $requests){
        list($valids, $invalids) = $requests;
        $number = count($valids);
        foreach($valids as $valids){
            Member::create($valids);
        }
        Session::flash('multipleResponse', $number.' members successfully added');
        return redirect('/members/add');
    }

    

    /* display the view */
    public function printer(){
        $id = Auth::user()->id;
        $carbon_today = Carbon::today();
        $date = $carbon_today->format('d-m-Y');
        $members = Member::where('user_id', $id)->get();
        $geographicalNames = GeographicalName::where('user_id', $id)->get();
        foreach($members as $member){
            $getGeographicalId = $member['geographicalName_id'];
            $member['geographicalName_id'] = $this->showGeographicalName($getGeographicalId);
        }
       return view('member.printMembers', compact('date', 'members', 'geographicalNames'));
    }

   
    /* updates a member */
    public function update(Request $request, $id){
        $member = Member::find($id);
        $member->update($request->all());
    }

     /* deletes a member */
    public function destroy($id){
        $member = Member::find($id);
        $member->delete();
    }

}

