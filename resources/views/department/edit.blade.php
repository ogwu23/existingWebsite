@extends('layout')
@section('title','Update Departments')
@section('content')

                          <div class="card mb-4 mt-4">
                         <div class="card-header">
                             <i class="fas fa-table me-1"></i>
                             Update Departments
                             <a href="{{url('depart/'.$data->id)}}" class="float-end btn btn-sm btn-success">View All</a>
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
                           <form action="{{url('depart/'.$data->id)}}" method="post">
                             @method('put')
                             @csrf
                             <table class="table table-bordered" >
                               <tr>
                                 <th>Title</th>
                                 <td>
                                   <input type="text" value="{{$data->title}}" name="title" class="form-control"/>
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
