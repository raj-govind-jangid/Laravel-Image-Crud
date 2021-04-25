<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use File;

class StudentController extends Controller
{
    public function home(){
        $student = Student::all();
        return view('home',['student'=>$student]);
    }

    public function addstudent(){
        return view('addstudent');
    }

    public function storestudent(Request $request){
        $name = $request->name;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
        $student = new Student;
        $student->name = $name;
        $student->profileimage = $imageName;
        $student->save();
        return redirect('/');
    }

    public function editstudent($id){
        $student = Student::find($id);
        return view('editstudent',['student'=>$student]);
    }

    public function updatestudent(Request $request){
        $student = Student::find($request->id);
        $name = $request->name;
        if($request->file('file') == null)
        {
            $student->update([
            $student->name = $name,
            ]);
        }
        else{
            $imagepath = public_path("\images\\").$student['profileimage'];
            File::delete($imagepath);
            $image = $request->file('file');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'),$imageName);
            $student->update([
                $student->name = $name,
                $student->profileimage = $imageName
            ]);
        }
        return redirect('/');
    }

    public function deletestudent($id){
        $student = Student::find($id);
        $imagepath = public_path("\images\\").$student['profileimage'];
        File::delete($imagepath);
        $student->delete();
        return redirect('/');
    }
}
