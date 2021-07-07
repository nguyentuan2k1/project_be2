<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subject;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
  public function index(){
    
    $subject = new subject();
    $data = $subject->paginate(15);
    return view('subject',['subject' => $data]);
 }

  public function add(Request $request)
  {

   // method @guest của trang dashboard là khách -> chưa xác thực á 
   // nếu là  @auth của trang dashboard thì là đã xác thực 
  
    
   $request->validate([
          'name' => 'required',
          
      ]);

      $credentials = $request->only('name');
     
      subject::create([
      'subject_name' => $credentials['name'],
      'status' => 1,
      ]);
    
      return redirect()->route('subject');
 
   
   



  }

  public function add_view()
  {
    return view("auth.add");
  }

  public function destroy($subject_id){
    subject::where('subject_id',$subject_id)->delete();

    Session::flash('message', 'Delete successfully!');
    Session::flash('alert-class', 'alert-success');
    return redirect()->route('subject');
 }

 public function search(Request $request){
  $subject = subject::where('subject_name','like','%'.$request->key.'%')
                      ->orwhere('status',$request->key)
                      ->get();
                      return view('search', compact('subject'));
 }

 public function edit_view(Request $request){
  
  $result['info']=DB::table('subject')->where ('subject_id',$request->subject_id)->get()->toArray();
  //echo '<pre>';
  //print_r($result);
  return view("auth.edit",$result);
 }
 public function update(Request $request){
  DB::table('subject')->where ('subject_id',$request->subject_id)->update(['subject_name'=>$request->subject_name]);
  DB::table('subject')->where ('subject_id',$request->subject_id)->update(['status'=>$request->status]);
  return redirect()->route('subject');
 }
}
