<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Schedule;
use App\Models\Instrument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use DateTime;

class SchedulerController extends Controller
{
    public function index() {     
        $user = Auth::user();
        $user_type = $user->type;
        $user_id = $user->id;
        $schedules = [];

        if($user_type == "student") {
            $schedules = Schedule::where('student_id', $user_id)->get();
        }else if($user_type == "parent") {
            $schedules = Schedule::where('parent_id', $user_id)->get();
        }if($user_type == "teacher") {
            $schedules = Schedule::where('teacher_id', $user_id)->get();
        }if($user_type == "admin") {
            $schedules = Schedule::get();
        }

        $teachers = User::where('type', 'teacher')->select('id', 'name')->get();
        $students = User::where('type', 'student')->select('id', 'name')->get();
        $parents = User::where('type', 'parent')->select('id', 'name')->get();
        $instruments = Instrument::get();
  
        return view('scheduler.index', [ 'schedules' => $schedules, 'teachers' => $teachers, 'students' => $students, 'parents' => $parents, 'instruments' => $instruments]);
    }

    public function store(Request $request){
        $auth_user = Auth::user();

        $validator = Validator::make($request->all(),[
            "teacher_id" => "required",
            "student_id" => "required",
            "parent_id" => "required",
            "instrument_id" => "required",
            "start_time" => "required",
            "end_time" => "required",
            "start_date" => "required",
            "end_date" => "required",
        ]);

        if($validator->fails()){
            return response()->json([
                "status_code" => 400,
                "type" => "error",
                "message" => $validator->messages()->toArray(),
            ], 400);
        }

        $start_time = new \DateTime($request->start_time);
        $end_time = new \DateTime($request->end_time);
        $duration = $start_time->diff($end_time);
        $hours = $duration->h + $duration->i/60;
        $price = round(Instrument::find($request->instrument_id)->hourly_rate * $hours, 2);
       
        $data = Schedule::create([
            "teacher_id" => $request->teacher_id,
            "student_id" => $request->student_id,
            "parent_id" => $request->parent_id,
            "instrument_id" => $request->instrument_id,
            "start_time" => $start_time,
            "end_time" => $end_time,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "price" => $price,
        ]);

        if($data){
            return response()->json([
                "status_code" => 201,
                "type" => "success",
                "message" => "Schedule created successfully",
                "data" => $data
            ], 201);
        }

        return response()->json([
            "status_code" => 502,
            "type" => "error",
            "message" => "Some internal error",
            "data" => null
        ], 502);
    }
}
