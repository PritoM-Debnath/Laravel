<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Student;

class HomeController extends Controller
{
    public function index(){
        
        return view('home');
    }

    public function upload(Request $request){
        
        $student = new student;

        $student->name = $request->name;
        $student->email = $request->email;
        $image = $request->file;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->file->move('student',$imagename);
            $student->image = $imagename;
        }
        $student->save();
        return redirect()->back();
    }
    public function show(){
        
        $data = student::all();
        return view('show',compact('data'));
    }
    public function remove($id){
        
        $data =student::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function search(Request $request){
        
        $search = $request->search;
        $data= student::where('name','Like','%'.$search.'%')->orWhere('email','Like','%'.$search.'%')->get();
        return view('show',compact('data'));
    }
    public function edit($id){
        
        $data =student::find($id);
        return view('edit',compact('data'));
    }
    public function update(Request $request,$id){
        
        $student =student::find($id);
        $student->name=$request->name;
        $student->email=$request->email;
        $image = $request->file;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->file->move('student',$imagename);
            $student->image = $imagename;
        }
        $student->save();
        return redirect()->back();
    }
}
