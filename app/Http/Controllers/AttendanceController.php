<?php

namespace App\Http\Controllers;

use App\Models\Attendace;
use App\Models\Rest;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->session()->get('txt');
        $user_id = $data['id'];
        $user = $data['user'];
        $date = date('Y/m/d');
        $result = Attendace::where('date', $date)->where('user_id', $user_id)->first();
        $result2 = Attendace::where('date', $date)->where('user_id', $user_id)->with('Rest')->latest('updated_at')->first();

        return view('index', ['users' => $user, 'result' => $result, 'result2' => $result2]);
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
}
