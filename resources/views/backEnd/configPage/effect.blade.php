@extends('layouts.backEnd.layoutBackEnd')
@section('title_page','Config Admin')
@section('title_form','Config')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Config</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{route('configPage.effectPost')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        @error('name')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @else
                            <label for="">Name</label>
                        @enderror
                        <input type="text" class="form-control" placeholder="Enter address" name="name" value="">
                    </div>
              
                    <div class="form-group">
                        @error('content')
                            <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>{{$message}}</label>
                        @else
                            <label for="">Script</label>
                        @enderror
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="content"></textarea>
                    </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@if (Session::has('success'))
    @section('alert')
        <script>
          Command: toastr["success"]("{{Session::get('success')}}")
        </script>
    @endsection
@endif
@if (Session::has('error'))
    @section('alert')
        <script>
          Command: toastr["error"]("{{Session::get('error')}}")
        </script>
    @endsection
@endif
{{-- ????? quy  --}}
<?php   
function showCategories($categories, $parent_id = null, $char = '')
{
    foreach ($categories as $key => $item)
    {
        // N???u l?? chuy??n m???c con th?? hi???n th???
        if ($item->parent == $parent_id)
        {
            echo '<option value=" '.$item->id.'">'.'&ensp;'.$char.$item->name.'</option>';
            // X??a chuy??n m???c ???? l???p
            unset($categories[$key]);
             
            // Ti???p t???c ????? quy ????? t??m chuy??n m???c con c???a chuy??n m???c ??ang l???p
            showCategories($categories, $item->id, '&ensp;'.$char.'|--');
        }
    }
}

?>