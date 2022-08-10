<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data=employee::orderByDesc('id','desc')->get();
       return view('employee.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data=Department::orderByDesc('id','desc')->get();
      return view('employee.create',['departments'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([

        'full_name'=>'required',
        'photo'=>'required|image|mimes:jpg,png,gif',
        'address'=>'required',
        'mobile'=>'required',
        'status'=>'required',



      ]);
      // to upload the image.
        $photo=$request->file('photo');
        $renamePhoto=time().'.'.$photo->getClientOriginalExtension();
        //define the destination.
        $dest=public_path('/images'); // go to the public folder and create a folder called image.
        $photo->move($dest,$renamePhoto);
      //to collect data from the tabl-employee.
      $data=new employee();
      $data->department_id=$request->depart;
      $data->full_name=$request->full_name;
      $data->photo=$renamePhoto;
      $data->address=$request->address;
      $data->mobile=$request->mobile;
      $data->status=$request->status;


      $data->save();
      return redirect('employee/create')->with('msg','Data has been submitted');
  }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $data=employee::find($id);
       return view('employee.show',['data'=>$data]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $departs=Department::orderByDesc('id','desc')->get();
      $data=Employee::find($id);
      return view('employee.edit',['departs'=>$departs,'data'=>$data]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $request->validate([

        'full_name'=>'required',
        'address'=>'required',
        'mobile'=>'required',
        'status'=>'required',



      ]);

      // To check if the there is image or not.
      if($request->hasFile('photo')){

        // to upload the image.
        $photo=$request->file('photo');
        $renamePhoto=time().'.'.$photo->getClientOriginalExtension();
        //define the destination.
        $dest=public_path('/images'); // go to the public folder and create a folder called image.
        $photo->move($dest,$renamePhoto);

      }else {
        $renamePhoto=$request->prev_photo;
      }

      //to collect data from the tabl-employee.
      $data=employee::find($id);
      $data->department_id=$request->depart;
      $data->full_name=$request->full_name;
      $data->photo=$renamePhoto;
      $data->address=$request->address;
      $data->mobile=$request->mobile;
      $data->status=$request->status;


      $data->save();
      return redirect('employee/'.$id.'/edit')->with('msg','Data has been updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      employee::where('id',$id)->delete();
      return redirect('employee');
    }
}
