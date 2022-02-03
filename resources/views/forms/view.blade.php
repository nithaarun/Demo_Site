@extends('layouts.app')

@section('content')
<!-- Select2 -->
<script src="{{asset('lte/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
 <!-- Select2 -->
 <link rel="stylesheet" href="{{asset('lte/bower_components/select2/dist/css/select2.min.css')}}">
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery.js')}}"></script>
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('lte/bower_components/font-awesome/css/font-awesome.min.css')}}">

  

<script type="text/javascript">
  var fields = {};
</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                 <!-- Main content -->
      <section class="content">
         
         <div class="box">
            <div class="box-header">
              <u><small style="float: right;margin-right: 15px; font-size: 14px;">
               <a href="{{route('forms.index')}}"> Back</a></small></u>
            </div>
            <!-- /.box-header -->
           <!-- Main content -->
      <section class="content">
        
         <div class="box">
         <div class="form-group">
            <label for="okm" class="col-md-2 control-label">Form Name<span class="text-danger">*</span></label>
                <b>  {{$form->name}}  </b> 
                
          </div>
         <div class="box-body">
              
          </div>
              <div class="container">
                <table border="1">
              @if($form_fields) 
                @foreach($form_fields as $form_field)
                  <tr>
                  <td width="200px">{{$form_field->label}} : 
                  </td>
                  <td width="300px" align="center">
                    @if($form_field->field_id == 1 || $form_field->field_id == 2)
                    <input type={{$form_field->fieldName->field}} id="" name=""><br><br>
                    @else
                    <?php
                      $values = $form_field->values;
                      $str_arr = preg_split ("/\,/", $values); 

                    ?>
                    <select id="" name="">
                    <option value="">Select</option>
                      @foreach($str_arr as $arr)
                      <option value={{$arr}}>{{$arr}}</option>
                      @endforeach
                  </select><br><br>
                    @endif
                    </td>
                  </tr>
                @endforeach
              @endif
              <tr >
                <td colspan="2" align="center">
                  <button>SUBMIT</button>
                  </td>

                  </tr>
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

<script>
  $(function () {
    //Initialize Select2 Elements
    // $('.select2').select2()

  })
</script>
<script>

$(document).ready(function() {


});
</script>

@endsection
