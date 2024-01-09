<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class ParentController extends Controller
{
	public function index()
	{
		return view('parent.index');
	}

    // todo - go over this, this can be removed, creating users in UserController.php
	public function create(Request $request)
	{
        $validator = Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_iso2' => 'required',
            'phone_dial_code' => 'required',
            'phone_number' => 'required',
        ]);


        if($validator->fails()){
            return response()->json([
                'status_code' => 400,
                'type' => 'error',
                'message' => $validator->messages()->toArray(),
            ],400);
        }


        $create = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_iso2' => $request->phone_iso2,
            'phone_dial_code' => $request->phone_dial_code,
            'phone_number' => $request->phone_number,
        ]);


        // TODO: Christ Do image part

        if(!$create){
            return response()->json([
                'status_code' => 501,
                'type' => 'error',
                'message' => 'Operation could not perform!',
            ]);
        }

        return response()->json([
            'status_code' => 201,
            'type' => 'success',
            'message' => 'New record created successfully'
        ]);
	}

	public function store(Request $request)
	{
	}

	public function show($id)
	{
	}

	public function edit($id)
	{
	}

	public function update(Request $request, $id)
	{
	}

	public function destroy($id)
	{
	}
}
