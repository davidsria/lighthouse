<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use App\User;
use App\KonnectCenter;
use App\GeographicalName;
use App\KonnectPastor;
use App\KonnectLeader;
use App\Report;
use Excel;
use Session;

class ReportsController extends Controller
{
    public function index(Request $request){
        $report_id = $request['report_date'];
        $user_id = $request['area'];
        if(empty($request->all()) || ($report_id=='all' && $user_id=='all')){
            $attendances = Attendance::all();
        }else{
            if($report_id=='all'){
                $attendances = Attendance::where('user_id', $user_id)->get();      
            }elseif($user_id=='all'){
                $attendances = Attendance::where('report_id', $report_id)->get();       
            }else{
                $attendances = Attendance::where([
                ['report_id', $report_id],
                ['user_id', $user_id],
            ])->get();         
            }           
        }
            foreach($attendances as $attendance){
                $attendance['konnect_center'] = $this->getKonnectCenter($attendance['user_id']);
                $attendance['geographical_name'] = $this->getGeographicalNames($attendance['user_id']);
                $attendance['konnect_pastor'] = $this->getKonnectPastors($attendance['user_id']);
                $attendance['konnect_leader'] = $this->getKonnectLeaders($attendance['user_id']);
                $attendance['user_id'] = $this->getUser($attendance['user_id']);
                $attendance['total'] = $attendance['men'] + $attendance['women'] + $attendance['children'];
            }
            $konnectAreas = User::all();
            $reports = Report::all();
            $months = array('January', 'Febuary', 'March', 'April', 'May', 'June',
                            'July', 'August', 'September', 'October', 'November', 'December');
            return view('report', compact('attendances', 'konnectAreas', 'months', 'reports'));    
    }

    private function getUser($id){
        $result = User::where('id', $id)->first();
        return $result['name'];
    }

    private function getKonnectCenter($id){
        $result = KonnectCenter::where('user_id', $id)->first();
        return $result['name'];
    }


    private function getGeographicalNames($id){
        $names = [];
        $results = GeographicalName::where('user_id', $id)->get();
        foreach($results as $result){
            $names[] = $result['name'];
        }
        return $names;
    }

    private function getKonnectPastors($id){
        $names = [];
        $results = KonnectPastor::where('user_id', $id)->get();
        $names = [];
        foreach($results as $result){
            $names[] = $result['name'];
        }
        return $names;
    }

    private function getKonnectLeaders($id){
        $names = [];
        $results = KonnectLeader::where('user_id', $id)->get();
        $names = [];
        foreach($results as $result){
            $names[] = $result['name'];
        }
        return $names;
    }

   

    public function exportExcel(Request $request){
        $report_id = $request['report_date'];
        $user_id = $request['area'];
        if(empty($request->all()) || ($report_id=='all' && $user_id=='all')){
            $attendances = Attendance::all();
        }else{
            if($report_id=='all'){
                $attendances = Attendance::where('user_id', $user_id)->get();      
            }elseif($user_id=='all'){
                $attendances = Attendance::where('report_id', $report_id)->get();       
            }else{
                $attendances = Attendance::where([
                ['report_id', $report_id],
                ['user_id', $user_id],
            ])->get();         
            }           
        }
        $count = 1;
        foreach($attendances as $attendance){
            $attendance['sn'] = $count;
            $attendance['konnect_leader'] = $this->getKonnectLeaders($attendance['user_id']);
            $attendance['konnect_center'] = $this->getKonnectCenter($attendance['user_id']);
            $attendance['geographical_name'] = $this->getGeographicalNames($attendance['user_id']);
            $attendance['konnect_pastor'] = $this->getKonnectPastors($attendance['user_id']);
            $attendance['end_time'] =date("g:i a", strtotime($attendance['end_time']));
            $attendance['start_time'] = date("g:i a", strtotime($attendance['start_time']));
            $attendance['user_id'] = $this->getUser($attendance['user_id']);
            $attendance['total'] = $attendance['men'] + $attendance['women'] + $attendance['children'];
            /*to implode array with sub array*/
            $attendance['geographical_name'] = implode("; ", $attendance['geographical_name']);
            $attendance['konnect_pastor'] = implode("; ", $attendance['konnect_pastor']);
            $attendance['konnect_leader'] = implode("; ", $attendance['konnect_leader']);
            $count++;
        }
        return $this->export($this->getReport($attendances));
    }

    public function getReport($datas){
        $reports = array();
        foreach($datas as $data){
            $reports[] = [
                'S/N' => $data->sn,
                'Konnect Center' => $data->user_id,
                'Konnect Leader' => $data->konnect_leader,
                'Geographical Name' => $data->geographical_name,
                'Konnect Area' => $data->konnect_center,
                'Konnect Pastor' => $data->konnect_pastor,
                'Location' => $data->location,
                'Did Meeting Hold?' => $data->meeting_hold,
                'Men' => $data->men,
                'Women' => $data->women,
                'Children' => $data->children,
                'Total' => $data->total,
                'Start Time' => $data->start_time,
                'End Time' => $data->end_time,
                'Hightlights' => $data->highlights,
                'No of Guest' => $data->guest,
                'Guest Details' => $data->guest_details
            ];
        }
        return $reports;
    }
        
    
    public function export($data){
        $filename = "report";
        Excel::create($filename, function($excel) use($data, $filename){
            $excel->sheet($filename, function($sheet) use($data){
                $sheet->fromArray($data);
                $sheet->row(1, function($row){
                    $row->setBackground('#A9A9A9');
                    $row->setAlignment('center');
                    $row->setFont(array(
                        'bold' => true,
                        'size' => '13'
                    ));
                });
            });
            $excel->getDefaultStyle()
                ->getAlignment()
                ->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        })->export('xls');
    }

    public function preactivate(Request $request){
        $this->validate($request, [
        'month' => 'required',
        'year' => 'required',
        ]);
        $month = $request['month'];
        $year = $request['year'];
        if(Report::create([
           'month' => $month,
           'year' => $year,
           ])){
            
           $response = $month.', '.$year.' successfully activated';
       }else{
           $response = "Something went wrong";
       }
       return $response;
    }

    public function activate(Request $request)
    {
        //
        $response = $this->preactivate($request);
        Session::flash('monthResponse', $response);
        return redirect('/viewReport');
    }

}
