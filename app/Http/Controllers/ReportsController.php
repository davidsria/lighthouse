<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use App\User;
use App\KonnectCenter;
use App\GeographicalName;
use App\KonnectPastor;

class ReportsController extends Controller
{
    public function index(){
        $attendances = Attendance::all();
        foreach($attendances as $attendance){
            $attendance['konnect_center'] = $this->getKonnectCenter($attendance['user_id']);
            $attendance['geographical_name'] = $this->getGeographicalNames($attendance['user_id']);
            $attendance['konnect_pastor'] = $this->getKonnectPastors($attendance['user_id']);
            $attendance['end_time'] =$this->get12HourFormat($this->getEndTime($attendance['start_time'], $attendance['duration']));
            $attendance['start_time'] = $this->get12HourFormat($attendance['start_time']);
            $attendance['user_id'] = $this->getUser($attendance['user_id']);
            $attendance['meeting_hold'] = $this->getMeetingString($attendance['meeting_hold']);
            $attendance['total'] = $attendance['men'] + $attendance['women'] + $attendance['children'];
        }
        return view('report', compact('attendances'));
    }

    private function getUser($id){
        $result = User::where('id', $id)->first();
        return $result['name'];
    }

    private function getKonnectCenter($id){
        $result = KonnectCenter::where('user_id', $id)->first();
        return $result['name'];
    }

    private function getMeetingString($a){
        if($a == 1){
            $result = "Yes";
        }elseif($a == 0){
            $result = "No";
        }else{
            $result = "Invalid";
        }
        return $result;
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
        foreach($results as $result){
            $names[] = $result['name'];
        }
        return $names;
    }

    private function get12HourFormat($start){
        $explodeStart = explode(':', $start);
        $startHour = $explodeStart[0];
        $startMin = $explodeStart[1];
        if($startHour>12){
            $startHour = $startHour - 12;;
            $time =$startHour.':'.$startMin.'PM';
        }else if($startHour == 0){
            $startHour = 12;
            $time = $startHour.':'.$startMin.'AM';
        }else{
            $time = $startHour.':'.$startMin.'AM';
        }
        return $time;
    }

    private function getEndTime($start, $duration){
        $explodeStart = explode(':', $start);
        $explodeDuration = explode(':', $duration);
        $startHour = $explodeStart[0];
        $startMin = $explodeStart[1];
        $durationHour = $explodeDuration[0];
        $durationMin = $explodeDuration[1];
        $endHour = $startHour + $durationHour;
        $endMin = $startMin + $durationMin;
        if($endMin > 59){
            $getHour = 0;
            $endHour += floor($endMin/60);
            $endMin = $endMin%60;
            $time = $endHour.':'.$endMin;
        }else{
            $time = $endHour.':'.$endMin;
        }
        return $time;
    }

}
