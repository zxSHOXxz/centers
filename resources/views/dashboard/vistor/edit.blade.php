{{-- @extends('dashboard.parent') --}}
@extends('dashboard.parent')

@section('title',' الزائرين ')

@section('sub-title',' تعديل بيانات الزائر  ')

@section('active title',' تعديل بيانات الزائر ')

@section('styles')

@endsection

@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">تعديل بيانات الزائر </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form">
                        @csrf
                        <div class="card-body">

                            <br>
                            <div class="row">


                                <div class="form-group col-md-6">
                                    <label for="vistor_name">الاسم الزائر</label>
                                    <input type="text" name="vistor_name" class="form-control" id="vistor_name"
                                        placeholder="أدخل اسم الزائر" value="{{ $vistors->vistor_name }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="mobile"> رقم الجوال </label>
                                    <input type="text" name="mobile" class="form-control"
                                        id="mobile" placeholder="ادخل رقم الجوال  " value="{{ $vistors->mobile }}">
                                </div>


                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="dateVisit"> تاريخ الزيارة </label>
                                    <input type="date" name="dateVisit" class="form-control"
                                        id="dateVisit" placeholder=" ادخل تاريخ الزيارة" value="{{ $vistors->dateVisit }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="date"> وقت الزيارة </label>
                                    <input type="time" name="date" class="form-control"
                                        id="date" placeholder=" ادخل وقت الزيارة"
                                        value="{{ $vistors->date }}">
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="status">الحالة </label>
                                        <select class="form-control" name="status"
                                            id="status" value="{{ $vistors->status }}">
                                            <option value="inquiry"> استفسار </option>
                                            <option value="registration"> تسجيل </option>
                                            <option value="interview"> مقابلة </option>
                                        </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="date1"> موعد المقابلة </label>
                                    <input type="date" name="date1" class="form-control"
                                        id="date1" placeholder="ادخل موعد المقابلة" value="{{ $vistors->date1 }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="employee_name">الاسم الموظف</label>
                                    <input type="text" name="employee_name" class="form-control" id="employee_name" value=""
                                        placeholder="أدخل اسم الموظف" value="{{ $vistors->employee_name }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="replay"> سبب الزيارة  </label>
                                    <input type="text" name="replay" class="form-control"
                                        id="replay" placeholder=" سبب الزيارة  " value="{{ $vistors->replay }}">
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description"> الوصف</label>
                                        <textarea class="form-control" style="resize: none;" id="description"
                                            name="description" value="{{ $vistors->description }}" rows="4" placeholder="ادخل الوصف" cols="50"></textarea>
                                    </div>
                                </div>


                            </div>

                        </div>

                        <br>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="button" onclick="update({{$vistors->id}})" class="btn btn-lg btn-success">تعديل</button>
                            @can('Index-Vistor')
                            <a href="{{route('vistors.index')}}"><button type="button" class="btn btn-lg btn-primary">
                                    قائمة الزوار  </button></a>
                            @endcan
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

</section>
<!-- /.content -->

@endsection
<script src="{{ asset('cms/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

@section('scripts')


<script>

$('.city_id').select2({
      theme: 'bootstrap4'
    })


    function update(id){

        let formData = new FormData();
        formData.append('vistor_name',document.getElementById('vistor_name').value);
            formData.append('mobile',document.getElementById('mobile').value);
            formData.append('date',document.getElementById('date').value);
            formData.append('status',document.getElementById('status').value);
            formData.append('location',document.getElementById('location').value);
            formData.append('replay',document.getElementById('replay').value);
            formData.append('replay_date',document.getElementById('replay_date').value);
            formData.append('description',document.getElementById('description').value);
            // formData.append('recepion_id',document.getElementById('recepion_id').value);


            storeRoute('/cms/admin/update_vistors/'+id , formData );

    }

</script>


@endsection
