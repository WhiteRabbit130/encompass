<?php

namespace App\Http\Controllers;

use App\Models\Instrument;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InstrumentController extends Controller
{
    /* Get all instruments */
    public function getAll(){
        $instruments = Instrument::all();
        return response()->json([
            'message' => 'Great! Records fetched successfully.',
            'data' => $instruments,
        ]);
    }

    /* Create instrument */
    public function store(Request $request){
        $auth = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => "required",
            'hourly_rate' => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status_code' => 400,
                'type' => 'error',
                'message' => $validator->messages()->toArray(),
            ], 400);
        }

        $instrument = Instrument::create([
            'name' => $request->name,
            'hourly_rate' => $request->hourly_rate,
        ]);

        if (!$instrument) {
            return response()->json([
                'status_code' => 501,
                'type' => 'error',
                'message' => "Sorry! Operation couldn't perform, try again!",
            ], 501);
        }

        return response()->json([
            'status_code' => 201,
            'type' => 'success',
            'message' => 'Great! Record added successfully.',
        ], 201);
    }

    /* Update instrument */
    public function update(Request $request){
        $auth = Auth::user();

        $validator = Validator::make($request->all(), [
            'id' =>'required',
            'name' => "required",
            'hourly_rate' => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status_code' => 400,
                'type' => 'error',
                'message' => $validator->messages()->toArray(),
            ], 400);
        }

        $instrument = Instrument::select("*")->where('id', $request->id)->first();

        if(!$instrument){
            return  response()->json([
                'status_code' => 404,
                'type' => 'error',
                'message' => 'Record not found, or maybe deleted!',
            ], 404);
        }

        $instrument->name = $request->name;
        $instrument->hourly_rate = $request->hourly_rate;
        $instrument->save();

        return response()->json([
            'status_code' => 200,
            'type' => 'success',
            'message' => 'Record updated successfully!',
        ], 200);
    }

    /*
     * Delete Instrument
     * */
    public function destroy($id) {
//        $auth = Auth::user();
//
//        if($auth->type!=='admin'){
//            return response()->json([
//                'status_code' => 401,
//                'type' => 'error',
//                'message' => 'You are not authorized to perform this action.',
//            ], 401);
//        }

        $instr = Instrument::find($id);
        if (!$instr) {
            return response()->json([
                'status_code' => 404,
                'type' => 'error',
                'message' => "Sorry! Record not found.",
            ], 404);
        }

        $instr->delete();

        return response()->json([
            'status_code' => 200,
            'type' => 'success',
            'message' => 'Great! Record deleted successfully.',
        ], 200);
    }
}
