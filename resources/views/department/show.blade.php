@extends('layout')
@section('title','View Departments')
@section('content')

                          <div class="card mb-4 mt-4">
                         <div class="card-header">
                             <i class="fas fa-table me-1"></i>
                             View Departments
                             <a href="{{url('depart/'.$data->id)}}" class="float-end btn btn-sm btn-success">View All</a>
                         </div>
                         <div class="card-body">
                             <table class="table table-bordered" >
                               <tr>
                                 <th>Title</th>
                                 <td>
                                   {{$data->title}}
                                 </td>
                               </tr>
                             </table>
                         </div>
                     </div>




@endsection
