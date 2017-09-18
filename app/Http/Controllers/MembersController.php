<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;

class MembersController extends Controller
{
    //
    public function index(){
        return('member.view_member');
    }

    public function add(){
        return view('member.add_member');
    }

    public function create(Request $request){
       if(Member::create($request->all())){
           return('done');
       }
       return('something went wrong');
    }

    public function generate(Request $request){

        $members = array();

        if($request->hasFile('membersList')) {

            if ($request->file('membersList')->isValid()) {

                $path = $request->file('membersList')->getRealPath();

                //load excel sheet from path
                $data = Excel::load($path, function ($reader) {
                    $reader->select(array('name','email', 'telephone', 'sex', 'address', 'status','geographicName_id','user_id'))->get();
                });
               foreach ($data->all() as $key) {   
                    $members[] = [
                        'name' => $key->name,
                        'email' => $key->email,
                        'telephone' => $key->telephone,
                        'sex' => $key->sex,
                        'address' => $key->address,
                        'status' => $key->status,
                        'geographicName_id' => $key->geographicName_id,
                        'user_id' => $key->user_id,
                        

                    ];
                
                                       
                }

            }

        }


        return $this->create($members);

    }

}
