<?php

namespace App\Http\Controllers;

use App\Models\Attendace;
use App\Models\Rest;
use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;


use DateTime;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $this->middleware('auth');

        $userData = $request->session()->get('userData');
        $user_id = $userData['id'];
        $user = $userData['user'];
        $date = date('Y/m/d');
        $attendace = Attendace::where('date', $date)->where('user_id', $user_id)->first();
        $rest = Attendace::where('date', $date)->where('user_id', $user_id)->with('Rest')->latest('updated_at')->first();

        return view('index', ['users' => $user, 'attendace' => $attendace, 'rest' => $rest]);
    }

    public function startJob(Request $request)
    {
        $user_id = $request->user_id;
        $job_start_time = date('H:i:s');
        $date = date('Y/m/d');
        Attendace::create([
            'user_id' => $user_id,
            'job_start_time' => $job_start_time,
            'date' => $date]);
        return redirect('/');
    }

    public function endJob(Request $request)
    {
        $user_id = $request->user_id;
        $job_end_time = date('H:i:s');
        $date = date('Y/m/d');
        Attendace::where('user_id', $user_id)->where('date', $date)->update(['job_end_time' => $job_end_time]);

        return redirect('/');
    }

    public function startBreak(Request $request)
    {
        $user_id = $request->user_id;
        $date = date('Y/m/d');
        $rest_start_time = date('H:i:s');

        $result = Attendace::where('date', $date)->where('user_id', $user_id)->first();
        $data = $result['id'];
        $ate = Attendace::find($data);
        $ate->Rest()->where('date', $date)->where('user_id', $user_id)
            ->create(['attendace_id' => $data,
                'break_start_time' => $rest_start_time]);
        return redirect('/');
    }

    public function endBreak(Request $request)
    {
        $user_id = $request->user_id;
        $date = date('Y/m/d');
        $rest_end_time = date('H:i:s');

        $result = Attendace::where('date', $date)->where('user_id', $user_id)->first();
        $data = $result['id'];
        $ate = Attendace::find($data)->Rest()->latest()->first();

        $ate->update([
            'break_end_time' => $rest_end_time]);

        return redirect('/');

    }

    public function getAttendanceList()
    {
            $date = $_GET["date"];
           

            /*$flag = $_GET["flag"];
            if($flag==1){
                $date = $_GET["date"];
                $date = date('Y-m-d',strtotime($date." -1 day"));
            }else if($flag==2){
                $date = $_GET["date"];
                $date = date('Y-m-d', strtotime($date . " +1 day"));

            }else{
                $date = date('Y-m-d');
            }*/
            //$date = date('Y-m-d');
            $results = Attendace::where('date',$date)->paginate(1);
            $job_time = 0;
            $data = [[]]; 
            //$rest_total_data = [];
            $rest_total_data = 0;
            $job_total = 0;
            

            $i = 0;

            foreach($results as $result_rest){                
                $job_start_time = $result_rest->job_start_time;
                $job_end_time = $result_rest->job_end_time;
                $break_total = 0;
                foreach($result_rest->rest  as $data){
                        $job_total = (strtotime($date.$job_end_time) - strtotime($date.$job_start_time));
                        $break_total = $break_total + ((strtotime($date.$data->break_end_time) - strtotime($date.$data->break_start_time)));
                    }    
                $job_time = gmdate('H:i:s',$job_total-$break_total);
                $rest_total_data = gmdate('H:i:s',$break_total); 
                $results[$i]->rest_total_data = $rest_total_data;
                $results[$i]->job_times = $job_time;
                $i++;
            }
            $date = strtr($date,'/','-');

            return view('attendance',['results' => $results,'date'=>$date]);
    }
}
