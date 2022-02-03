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
               <a href="{{route('forms.index')}}">
               Back</a></small></u>
            </div>
            <!-- /.box-header -->
           <!-- Main content -->
      <section class="content">
         <form action="{{route('form.update')}}" method="post" >
         <input type="hidden" class="form-control" id="" name="form_id" value="{{$form->id}}">

         {{ csrf_field() }}
         <div class="box">
         <div class="form-group">
            <label for="okm" class="col-md-2 control-label">Form Name<span class="text-danger">*</span></label>
              <div class="col-md-4">
                <input type="text" class="form-control" id="" name="form_name" value="{{$form->name}}">
              </div>
          </div>
         <div class="box-body">
              <table id="example1" class="table table-bordered product_table">
                <thead>
                <tr>
                   <th>Sl No.</th>
                  <th>Field</th>
                  <th>Label</th>
                  <th>Values </th>
                </tr>
                </thead>
                <tbody>
                  <?php $c=1; $nos = 0; $prc = 0; ?>
                  @foreach($form_fields as $flds)
                  <tr>
                    <td></td>
                    <td style="width: 27%">
                    <input type="hidden" name="field_ids[]" value="{{$flds->id}}">
                    <select class="form-control select2" name="field[]" style="width:100%;" required="required"><option value="" selected>---- select -----</option>
                    @foreach($fields as $field) 
                    <option value={{$field->id}} @if($flds->field_id == $field->id)selected @endif>{{$field->field}}</option>
                    @endforeach
                  </select>
                </td>
                    <td><input class="form-control" name="label[]" type="text" value="{{$flds->label}}"  required="required" style="margin-bottom: -15px;"></td>
                    <td><input class="form-control" name="values[]" type="text" value="{{$flds->values}}" placeholder="separate with commas" style="margin-bottom: -15px;"></td>
                  </tr>
                  @endforeach
                 
              </tbody>
              </table>
          </div>
              <div class="container">

                <div class="pull-right">
                <button type="button" id="" class="btn btn-success add_field"><i class="fa fa-fw fa-plus"></i>Add Field</button>

                <button type="submit" id="confirm" class="btn btn-success">Confirm</button>
              </div>
            </div>
        </form>
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


    $.get("{{ url('load/fields')}}", 
      function(data) {
        fields = (data);

          var i = 1;
          $('.product_table td:first-child').each(function() {
            $(this).text(i); 
            i++;
          });    
      });

      $(document).on('click','.add_field',function(){

          $(".product_table tr:last").after('<tr><td></td><td style="width: 27%"><select class="product form-control select2" name="new_field[]" style="width:100%;" required="required"><option value="" selected>---- select -----</option>@foreach($fields as $field) <option value={{$field->id}}>{{$field->field}}</option>@endforeach</select></td><td><input class="qty form-control" name="new_label[]" type="text" value=""  required="required" style="margin-bottom: -15px;"></td><td><input class="qty form-control" name="new_values[]" type="text" value="" placeholder="separate with commas" style="margin-bottom: -15px;"></td></tr>');

          var i = 1;
          $('.product_table td:first-child').each(function() {
            $(this).text(i); 
            i++;
          });      

});



$('#field').on('change', function() {
  var text = $("#field option:selected").text();
  alert(text);
  if(text.trim() === 'Select') {
    alert();
    $('#select_values').css('display','block');
  }
});


  });


</script>

<script type="text/javascript">
 ///add button

</script>

@endsection
