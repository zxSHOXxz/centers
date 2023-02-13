{{-- @extends('dashboard.parent') --}}
@extends('dashboard.parent')

@section('title','الزائرين')

@section('sub-title',' إضافة زائر  ')

@section('active title',' إضافة بيانات الزائرين ')

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
                        <h3 class="card-title">  اضافة زائر جديد  </h3>
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
                                        placeholder="أدخل اسم الزائر">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="mobile"> رقم الجوال </label>
                                    <input type="number" name="mobile" class="form-control"
                                        id="mobile" min="10" placeholder="ادخل رقم الجوال ">
                                </div>


                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="dateVisit"> تاريخ الزيارة </label>
                                    <input type="date" name="dateVisit" class="form-control"
                                        id="dateVisit" placeholder=" ادخل تاريخ الزيارة">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="date"> وقت الزيارة </label>
                                    <input type="time" name="date" class="form-control"
                                        id="date" placeholder=" ادخل وقت الزيارة">
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="status">الحالة </label>
                                        <select class="form-control" name="status"
                                            id="status" >
                                            <option value="inquiry"> استفسار </option>
                                            <option value="registration"> تسجيل </option>
                                            <option value="interview"> مقابلة </option>
                                        </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="date1"> موعد المقابلة </label>
                                    <input type="date" name="date1" class="form-control"
                                        id="date1" placeholder="ادخل موعد المقابلة">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="employee_name">الاسم الموظف</label>
                                    <input type="text" name="employee_name" class="form-control" id="employee_name" value=""
                                        placeholder="أدخل اسم الموظف">
                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label for="replay"> سبب الزيارة  </label>
                                    <input type="text" name="replay" class="form-control"
                                        id="replay" placeholder=" سبب الزيارة  ">
                                </div>



                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description"> الوصف</label>
                                        <textarea class="form-control" style="resize: none;" id="description"
                                            name="description" rows="4" placeholder="ادخل الوصف" cols="50"></textarea>
                                    </div>
                                </div>

                            </div>

                        </div>








                        <br>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="button" onclick="performStore()" class="btn btn-lg btn-success">حفظ</button>
                            @can('Index-Vistor')

                            <a href="{{route('vistors.index')}}"><button type="button" class="btn btn-lg btn-primary">
                                    قائمة الزوار </button></a>
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

$('.group_id').select2({
      theme: 'bootstrap4'
    })


    function performStore() {

        let formData = new FormData();
            formData.append('vistor_name',document.getElementById('vistor_name').value);
            formData.append('mobile',document.getElementById('mobile').value);
            formData.append('dateVisit',document.getElementById('dateVisit').value);
            formData.append('date',document.getElementById('date').value);
            formData.append('status',document.getElementById('status').value);
            formData.append('date1',document.getElementById('date1').value);
            formData.append('employee_name',document.getElementById('employee_name').value);
            formData.append('replay',document.getElementById('replay').value);
            formData.append('description',document.getElementById('description').value);

        store('/cms/admin/vistors',formData);

    }

</script>


@endsection
