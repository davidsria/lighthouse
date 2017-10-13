<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\addFirstTimer;
use App\firstTimers;
use App\User;
use Auth;
use Session;
use Carbon\Carbon;

class FirstTimersController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $date = Carbon::today()->format('d-m-Y');
        $firstTimers = firstTimers::where('user_id', $id)->latest('created_at')->get();
        return view('firstTimers.view',compact('date','firstTimers'));
    }

    public function create(){
        $date = Carbon::today()->format('d-m-Y');
        return view('firstTimers.new',compact('date'));
    }

    public function store(addFirstTimer $request){

        try{
            auth()->user()->submitFirstTimer(
                new firstTimers(request()->all())
            );
            $response = 'Successfully added';
            Session::flash('firsttimerResponse', $response);
            return back();
        }
        catch(Exception $e){
            return $e->getMessage();
        }
        
    }

    public function printer(){

        $id = Auth::user()->id;
        $date = Carbon::today()->format('d-m-Y');
        $firstTimers = firstTimers::where('user_id', $id)->latest('created_at')->get();
        return view('firstTimers.printer',compact('date','firstTimers'));
    }
}
