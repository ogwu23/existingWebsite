<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Employee;
use Carbon\Carbon; // use it whenever you want to work with date and time.

class AdminController extends Controller
{
  //dashboard
   public function index(){

      $data=Employee::select('id','created_at')->get()->groupBy(function($data){
      return Carbon::parse($data->created_at)->format('M');

     });

        $months=[];
        $monthCount=[];
        foreach($data as $month =>$values){
          $months[]=$month;
          $monthCount[]=count($values);
        }
        return view('index',['data'=>$data,'months'=>$months,'monthCount'=>$monthCount]);
   }


    //display login page
   public function login(){
     return view('login');
   }
    //display register page
   public function register(){
     return view('register');
   }

   //submit Login

      public function submit_login(Request $request){
      $request->validate([
       'username'=>'required',
       'password'=>'required',

     ]);
     $checkAdmin=Admin::where(['username'=>$request->username,'password'=>$request->password])->count();

      if($checkAdmin>0){
        //add session to it.
        session(['adminLogin',true]);
        return redirect('home');
      }else{
        return redirect('login')->with('msg', 'Invalid Username/password');
      }


   }

   public function logout(){
      session()->forget('adminLogin');
     return redirect('login');
   }
}
