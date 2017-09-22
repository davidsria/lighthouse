<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
=======
use App\Project;
use Session;
use Illuminate\Support\Facades\Auth;
>>>>>>> b65a336fc4e004b145c4075967014a585404c332

class projectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        return view('project.view_project');
=======
         $id = Auth::user()->id;
        $projects = Project::where('user_id', $id)->get();
        return view('project.view_project', compact('projects'));
>>>>>>> b65a336fc4e004b145c4075967014a585404c332
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.new_project');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $response = $this->preStore($request);
        Session::flash('projectResponse', $response);
        return redirect('/addProject');
    }

    public function preStore(Request $request){
        $this->validate($request, [
        'name' => 'required|max:100',
        'description' => 'required',
        'fund' => 'required',
        'execution_date' => 'required',
        ]);

       if(Project::create([
           'name' => $request['name'],
           'description' => $request['description'],
           'fund' => $request['fund'],
           'execution_date' => $request['execution_date'],
           'user_id' => Auth::user()->id,
           ])){
           $response = 'Project successfully added';
       }else{
           $response = "Something went wrong";
       }
       return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
<<<<<<< HEAD
=======
        $project = Project::where('id', $id)->get();
        return $project;
>>>>>>> b65a336fc4e004b145c4075967014a585404c332
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
<<<<<<< HEAD
=======
        $project = Project::find($id);
        $project->update($request->all());
>>>>>>> b65a336fc4e004b145c4075967014a585404c332
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
<<<<<<< HEAD
=======
        $project = Project::find($id);
        $project->delete();
    }


    private function formatDate($date){
        $dateArray = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December',
        ];
        $explodedDate = explode('-', $date);
>>>>>>> b65a336fc4e004b145c4075967014a585404c332
    }
}
