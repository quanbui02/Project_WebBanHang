<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Controllers\DB;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();
        return view("student.index",compact('students'));
    }
    public function create(){
        return view("student.create");
    }
    public function add(Request $request){
        $data = $request->all();
        Student::create($data);
        return redirect('/student');
    }
    public function edit($id){
        $student = Student::findOrFail($id);
        return view("student.edit",compact("student"));
    }
    public function update(Request $request,$id){
        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->hometown= $request->hometown;
        $student->phone = $request->phone;
        $student->save();
        return redirect('/student');
    }
    public function delete($id){
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect('/student');
    }
    public function search(Request $request){
        $type = $request->get("search-type");
        $valueInput  = $request->get("search");
        if($type=="Hometown" && strlen($valueInput)>0){
            $students  = Student::where("hometown","like","%".$valueInput."%")->get();
        }else{
            if($type=="Name" && strlen($valueInput)>0){
                $students  = Student::where("name","like","%".$valueInput."%")->get();
            }else{
                $students = Student::all();
            }
        }
        return view("student.index",compact("students","type","valueInput"));
    }
}
