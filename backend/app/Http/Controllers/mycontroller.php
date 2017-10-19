<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\student;
use App\course;
use App\assignment;
use App\report;

class mycontroller extends Controller
{
    function AddStudent(Request $req){
        DB::beginTransaction();
        try{
            $this->validate($req, [
                'name' => 'required'
            ]);
            $student = new student;
            $student->name = $req->input('name');
            $student->save();
            DB::commit();
            return response()->json($student, 201);
        }
        catch(\Exception $e){
            DB::rollback();
            return response()->json(['message' => 'Failed to add new student, exception:' + $e], 500);
        }
    }
    function UpdateStudent(Request $req){
        DB::beginTransaction();
        try{
            $this->validate($req, [
                'id' => 'required',
                'name' => 'required'
            ]);
            $id = $req->input('id');
            $name = $req->input('name');
            $updateStudent = DB::table('students')
            ->where('id', $id)
            ->update(['name' => $name]);
            DB::commit();
            return response()->json(['message' => 'Successfully updated student data'], 201);
        }
        catch(\Exception $e){
            DB::rollback();
            return response()->json(['message' => 'Failed to add new student, exception:' + $e], 500);
        }
    }
}