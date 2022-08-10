@extends('layout')
@section('title','View Employees')
@section('content')

                          <div class="card mb-4 mt-4">
                         <div class="card-header">
                             <i class="fas fa-table me-1"></i>
                             View Employees
                             <a href="{{url('employee/'.$data->id)}}" class="float-end btn btn-sm btn-success">View All</a>
                         </div>
                         <div class="card-body">
                           @if($errors->any())

                           @foreach($errors->all() as $error)
                           <p class="text-danger">{{$error}}</p>
                           @endforeach

                           @endif

                           @if(Session::has('msg'))
                           <p class="text-success">{{session('msg')}}</p>
                           @endif
                           <form action="{{url('employee/'.$data->id)}}" method="post" enctype="multipart/form-data">
                             @method('put')
                             @csrf
                             <table id="datatablesSimple"   class="table table-bordered" >

                               <tr>
                                 <th>Department</th>
                                 <td>
                                   {{$data->department->title}}
                                 </td>
                               </tr>



                               <tr>
                                 <th>Full Name</th>
                                 <td>
                                  {{$data->full_name}}
                                 </td>
                               </tr>

                               <tr>
                                 <th>photo</th>
                                 <td>

                                    <p>
                                     <img src="/images/{{$data->photo}}" alt="photo" width="200">
                                   </p>



                                 </td>
                               </tr>


                               <tr>
                                 <th>Address</th>
                                 <td>
                                   {{$data->address}}
                                 </td>
                               </tr>

                               <tr>
                                 <th>Mobile</th>
                                 <td>
                                   {{$data->mobile}}
                                 </td>
                               </tr>

                               <tr>
                                 <th>Status</th>
                                 <td>
                                         @if($data->status==1) Activated @else Deactivated @endif
                                        <br/>

                                 </td>
                               </tr>

                             </table>
                           </form>

                         </div>
                     </div>




@endsection
