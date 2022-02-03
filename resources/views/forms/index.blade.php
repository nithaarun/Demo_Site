@extends('layouts.app')

@section('content')
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('lte/bower_components/font-awesome/css/font-awesome.min.css')}}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

    @if(Session::has('update'))
        <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Updated Successfully
        </div>
    @endif

    @if(Session::has('save'))
        <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Added Successfully
        </div>
    @endif

    @if(Session::has('delete'))
        <div class="alert alert-info alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Deleted Successfully
        </div>
    @endif
                 <!-- Main content -->
      <section class="content">
         
         <div class="box">
            <div class="box-header">
            @if(Auth::user()->role == 1) 
              <u><small style="float: right;margin-right: 15px; font-size: 14px;">
               <a href="{{route('forms.create')}}">
               <i class="fa fa-fw fa-plus"> </i>Create New Form</a></small></u>
            @endif
            </div>
            <!-- /.box-header -->
           <!-- Main content -->
      <section class="content">
         
         <div class="box">
         
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead >
                  <tr>
                    <th>Sl No.</th>
                    <th>Form Name</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                 </tr>
                </thead>
                <tbody>
                <?php $c = 1; ?>
                  @if($forms != NULL)
                  @foreach($forms as $form)
                     <tr>
                         <td>{{$c++}}</td>
                         <td>{{$form->name}}</td>
                         <td><a href="{{route('form.view',$form->id)}}"><i class="fa fa-wpforms"></i></a></td>                  
                         <td>
                        @if(Auth::user()->role == 1) 
                         <a href="{{route('form.edit',$form->id)}}"><i class="fa fa-pencil"></i></a>
                        @endif
                        </td>                  
                         <td>
                        @if(Auth::user()->role == 1) 
                           <a href="{{route('form.delete',$form->id)}}"><i class="fa fa-trash"></i></a>
                        @endif
                          </td>                  
                     </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
           
          </section>
          <!-- /.Left col -->
          </section>
          <!-- /.Left col -->
            </div>
        </div>
    </div>
</div>
@endsection
