<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\subject;

class SubjectController extends Controller
{
    public function index(){
    
        $subject = new subject();
        $data = $subject->all();
        return view('subject',['subject' => $data]);
     }
  
     public function create(){
        return view('subject.create');
     }
  
     public function store(Request $request){
        $data = $request->except('_method','_token','submit');
  
        $validator = Validator::make($request->all(), [
           'subject_name' => 'required|string|min:3',
           'status' => 'required|string|min:3',
        ]);
  
        if ($validator->fails()) {
           return redirect()->Back()->withInput()->withErrors($validator);
        }
  
        if($record = subject::firstOrCreate($data)){
           Session::flash('message', 'Added Successfully!');
           Session::flash('alert-class', 'alert-success');
           return redirect()->route('subject');
        }else{
           Session::flash('message', 'Data not saved!');
           Session::flash('alert-class', 'alert-danger');
        }
  
        return Back();
     }
  
     public function edit($subject_id){
        $subject = subject::find($subject_id);
  
        return view('subject.edit')->with('subject',$subject);
     }
  
     public function update(Request $request,$subject_id){
        $data = $request->except('_method','_token','submit');
  
        $validator = Validator::make($request->all(), [
           'subject_name' => 'required|string|min:3',
           'status' => 'required|string|min:3',
        ]);
  
        if ($validator->fails()) {
           return redirect()->Back()->withInput()->withErrors($validator);
        }
        $subject = subject::find($subject_id);
  
        if($subject->update($data)){
  
           Session::flash('message', 'Update successfully!');
           Session::flash('alert-class', 'alert-success');
           return redirect()->route('subject');
        }else{
           Session::flash('message', 'Data not updated!');
           Session::flash('alert-class', 'alert-danger');
        }
  
        return Back()->withInput();
     }
  
     // Delete
     public function destroy($subject_id){
        subject::where('subject_id',$subject_id)->delete();
  
        Session::flash('message', 'Delete successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('subject');
     }
}
