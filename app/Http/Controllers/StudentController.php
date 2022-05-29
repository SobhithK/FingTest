<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\student;
use App\Models\teacher;
use App\Models\mark;

class StudentController extends Controller
{
    public function createStudent()
    {
        $teachers = teacher::get();
        return view('create',compact('teachers'));
    }
    public function storeStudent(Request $request)
    {
     
        $validator = Validator::make($request->all(), [
            'txtName' => 'required|string|max:50',
            'txtAge' => 'required|integer|gt:0|lt:50',
            'selGender' => 'required|in:M,F',
            'selRepteacher' => 'required|notin:0'
        ]);
 
        if ($validator->fails()) {
            return redirect('/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $std = new student();
        $std->name = $request->txtName;
        $std->age = $request->txtAge;
        $std->gender = $request->get('selGender');
        $std->rep_teacher = $request->get('selRepteacher');
        $std->save();

        return view('home');
    }

    public function getStudents()
    {
        $students = student::with('teacher')->get();
   
        return view('studentlist',compact('students'));
    }

    public function editStudent($id)
    {
        $students = student::where('id',$id)->with('teacher')->first();
        $teachers = teacher::get();
        return view('edit',compact('students','teachers'));
   
    }

    public function updateStudent(Request $request)
    {
 
        $validator = Validator::make($request->all(), [
            'txtName' => 'required|string|max:50',
            'txtAge' => 'required|integer|gt:0|lt:50',
            'selGender' => 'required|in:M,F',
            'selRepteacher' => 'required|notin:0'
        ]);

        if ($validator->fails()) {
            return redirect('/student/edit/'.$request->txtid)
                        ->withErrors($validator)
                        ->withInput();
        }

        $stud = student::find($request->txtid);
 
        $stud->name = $request->txtName;
        $stud->age = $request->txtAge;
        $stud->gender = $request->get('selGender');
        $stud->rep_teacher = $request->get('selRepteacher');
        
        $stud->save();
        return view('home');
    }

    public function deleteStudent($id)
    {
        $stdel = student::where('id',$id)->delete();

        $students = student::with('teacher')->get();
   
        return view('studentlist',compact('students'))->with('success', 'Student Details Deleted Successfully');
    }

    public function getMarks()
    {
        $students = student::get();

        return view('addMarks',compact('students'));
    }

    public function storeMarks(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'selName' => 'required|notin:0',
            'txtMaths' => 'required|integer|lt:101',
            'txtScience' => 'required|integer|lt:101',
            'txtHistory' => 'required|integer|lt:101',
            'selTerm' => 'required|notin:0'
           
        ]);

        if ($validator->fails()) {
            return redirect('/addMarks'.$request->txtid)
                        ->withErrors($validator)
                        ->withInput();
        }

        $mark = new mark();
        $mark->sid = $request->selName;
        $mark->term = $request->selTerm;
        $mark->maths = $request->txtMaths;
        $mark->science = $request->txtScience;
        $mark->history = $request->txtHistory;
        $mark->save();

        return view('home');
    }

    public function getMarkList()
    {
        $marks = mark::with('student')->get();
   
        return view('studentMarks',compact('marks'));
    
    }

    public function editStudentMarks($id)
    {
        $marks = mark::where('id',$id)->with('student')->first();
    
        return view('editMarks',compact('marks'));
   
    }

    public function updateStudentMark(Request $request)
    {
        $validator = Validator::make($request->all(), [
            
            'txtMaths' => 'required|integer|lt:101',
            'txtScience' => 'required|integer|lt:101',
            'txtHistory' => 'required|integer|lt:101',
            'selTerm' => 'required|notin:0'
           
        ]);

        if ($validator->fails()) {
            return redirect('/studentmarks/edit/'.$request->txtid)
                        ->withErrors($validator)
                        ->withInput();
        }

        $mark = mark::find($request->txtid);
 
        $mark->term = $request->selTerm;
        $mark->maths = $request->txtMaths;
        $mark->science = $request->txtScience;
        $mark->history = $request->txtHistory;
        $mark->save();
  
        return view('home');
    }

    public function deleteStudentMArks($id)
    {
        $stdel = mark::where('id',$id)->delete();

        $marks = mark::with('student')->get();
   
        return view('studentMarks',compact('marks'))->with('success', 'Student Details Deleted Successfully');
       
    }
}
