@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>

                 <!-- Main content -->
      <section class="content">
         
         <div class="box">
            <div class="box-header">
              <u><small style="float: right;margin-right: 15px; font-size: 14px;">
               <a href="{{route('forms.index')}}">
               <i class="fa fa-fw fa-plus"> </i>Manage Forms</a></small></u>
            </div>
            <!-- /.box-header -->
           
          </section>
          <!-- /.Left col -->
            </div>
        </div>
    </div>
</div>
@endsection
