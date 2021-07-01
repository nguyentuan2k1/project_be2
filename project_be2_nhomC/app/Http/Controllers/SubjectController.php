<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subject;

class SubjectController extends Controller
{
  public function getall(Request $Request){
   
      $obj = new subject();
      $dolax = $obj->all();
      
      return view('data_subject',['subjects' => $dolax]);
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
    
      return view('auth.login');
 
   
   



  }

  public function add_view()
  {
    return view("auth.add");
  }

  
}
