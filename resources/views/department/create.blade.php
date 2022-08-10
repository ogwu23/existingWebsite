@extends('layout')
@section('title','Add Departments')
@section('content')

                          <div class="card mb-4 mt-4">
                         <div class="card-header">
                             <i class="fas fa-table me-1"></i>
                             Create Departments
                             <a href="{{url('depart')}}" class="float-end btn btn-sm btn-success">View All</a>
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
                           <form action="{{url('depart')}}" method="post">
                             @csrf
                             <table id="datatablesSimple"  class="table table-bordered" >
                               <tr>
                                 <th>Title</th>
                                 <td>
                                   <input type="text" name="title" class="form-control"/>
                                 </td>
                               </tr>
                                  <tr>
                                    <td colspan="2">
                                      <input type="submit" name="" value="submit" class="btn btn-primary">

                                    </td>
                                  </tr>

                             </table>
                           </form>

                         </div>
                     </div>




@endsection
