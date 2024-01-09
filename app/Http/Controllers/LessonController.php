<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LessonController extends Controller
{
    public function store(Request $request){
        $auth_user = Auth::user();

        $validator = Validator::make($request->all(),[
            "teacher_id" => "required",
            "student_id" => "required",
            "instrument" => "required",
            "price" => "required",
        ]);

        if($validator->fails()){
            return response()->json([
                "status_code" => 400,
                "type" => "error",
                "message" => $validator->messages()->toArray(),
            ], 400);
        }

        $data = Lesson::create([
            "teacher_id" => $request->teacher_id,
            "student_id" => $request->student_id,
            "instrument" => $request->instrument,
            "price" => $request->price,
        ]);

        if($data){
            return response()->json([
                "status_code" => 201,
                "type" => "success",
                "message" => "Lesson created successfully",
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
