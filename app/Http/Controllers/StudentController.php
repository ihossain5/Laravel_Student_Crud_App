<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class StudentController extends Controller
{
    public function index(){
        $students = Student::latest()->paginate(5);
        $trashData = Student::onlyTrashed()->paginate(3);
        return view('index', compact('students','trashData'));
    }

    public function Add(){
        return view('add');
    }

    //Add New Student
    public function Store(Request $request){
      Student::insert([
          'name'=>$request->name,
          'email'=>$request->email,
          'phone_number'=>$request->number,
          'created_at'=>Carbon::now()
      ]); 
      return redirect()->route('all.student')->with('success','Data added successfully');
    }

    //Edit Student Data
    public function Edit($id){
        $students= Student::find($id);
         return view('edit', compact('students'));
     }

     //Update Student Data
     public function Update(Request $request,$id){
         $update = Student::find($id)->update([
             'name'=>$request->name,
             'email'=>$request->email,
             'phone_number'=>$request->number
         ]);
         return redirect()->route('all.student')->with('success','Data updated successfully');
     }

     //Soft Delete 
     public function SoftDelete($id){
        $delete = Student::find($id)->delete();
        return redirect()->route('all.student')->with('success','Data moved to trash');

     }

     //Data delete Permanently
     public function PermanentDelete($id){
        $permanentDelete = Student::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('success','Data permanently deleted');
     }

     //Restore Data
     public function Restore($id){
         $restore = Student::withTrashed()->find($id)->restore();
         return redirect()->back()->with('success','Data has been restored');
     }

}
