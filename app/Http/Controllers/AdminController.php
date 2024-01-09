<?php

namespace App\Http\Controllers;

use App\Models\Instrument;
use App\Models\User;

class AdminController extends Controller
{
    // Admin dashboard
    public function admin()
    {
        // Get all users
        $users = User::all();
        $instruments = Instrument::all();
        return view('admin.index', compact('users', 'instruments'));
    }

    public function dashboard()
    {
        $users = User::all();
        $instruments = Instrument::all();
        return view('admin.dashboard', compact('users', 'instruments'));
    }

    /*
     * Get all users
     * @return \Illuminate\Http\JsonResponse
     * */
    public function allUsers()
    {
        $users = User::all();
        return response()->json($users);
    }

    /*
     * Get all teachers
     * @return \Illuminate\Http\JsonResponse
     * */
    public function allTeachers() {
        $teachers = User::where('type', 'teacher')->get();
        return response()->json($teachers);
    }

    /*
     * Get all parents
     * @return \Illuminate\Http\JsonResponse
     * */
    public function allParents() {
        $parents = User::where('type', 'parent')->get();
        return response()->json($parents);
    }

    /*
     * Get all students
     * @return \Illuminate\Http\JsonResponse
     * */
    public function allStudents() {
        $students = User::where('type', 'student')->get();
        return response()->json($students);
    }


    /*
     * cmac and youcef routes only
     * */
    private function isSuperAdmin()
    {
        // If is user id 1 or 20
        define('SUPER_ADMIN', [1, 20]);
        return in_array(auth()->user()->id, SUPER_ADMIN);
    }


    /*
     * Get all users
     * @return \Illuminate\Http\JsonResponse
     * */
    public function superAdminRoute()
    {
        if ($this->isSuperAdmin()) {
            return response()->json(['message' => 'You are super admin']);
        } else
            return response()->json(['message' => 'You are not super admin']);
    }




    // todo - testing

}
