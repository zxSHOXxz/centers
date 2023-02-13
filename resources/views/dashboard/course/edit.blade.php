{{-- @extends('dashboard.parent') --}}
@extends('dashboard.parent')

@section('title',' المساق')

@section('sub-title',' تعديل المساقات  ')

@section('active title',' تعديل المساقات ')
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
                        <h3 class="card-title">تعديل بيانات المساق</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form">
                        @csrf
                        <div class="card-body">

                            <br>
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label for="course_name">اسم المساق </label>
                                    <input type="text" name="course_name" class="form-control" id="course_name"
                                     placeholder="أدخل اسم المساق" value="{{ $courses->course_name }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="course_code">رمز المساق </label>
                                    <input type="text" name="course_code" class="form-control" id="course_code"
                                     placeholder="أدخل رمز المساق " value="{{ $courses->course_code }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="houres">ساعات المساق </label>
                                    <input type="number" name="houres" class="form-control" id="houres"
                                     placeholder="أدخل ساعات المساق " value="{{ $courses->houres }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="start_date"> موعد بداية المساق</label>
                                    <input type="date" name="start_date" class="form-control" id="start_date" placeholder=" أدخل موعد بداية المساق" value="{{ $courses->end_date }}">

                                </div>
                                <div class="form-group col-md-4">
                                    <label for="end_date"> موعد نهاية المساق</label>
                                    <input type="date" name="end_date" class="form-control" id="end_date" placeholder=" أدخل موعد نهاية المساق" value="{{ $courses->end_date }}">

                                </div>

                                <div class="form-group col-md-4">
                                    <label for="diploma_id"> اسم الدبلومة</label>
                                    <select class="form-select form-select-sm" name="diploma_id" style="width: 100%;" id="diploma_id" aria-label=".form-select-sm example">
                                        @foreach ($diplomas as $diploma)

                                        <option value="{{ $diploma->id }}">{{ $diploma->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <br>

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="button" onclick="performUpdate({{ $courses->id }})" class="btn btn-lg btn-success">تعديل</button>
                                @can('Index-Course')
                                    
                                <a href="{{route('courses.index')}}"><button type="button" class="btn btn-lg btn-primary"> قائمة المساقات </button></a>
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

@section('scripts')


<script>
    function performUpdate(id) {

        let formData = new FormData();
        formData.append('course_name', document.getElementById('course_name').value);
        formData.append('course_code', document.getElementById('course_code').value);
        formData.append('houres', document.getElementById('houres').value);
        formData.append('start_date', document.getElementById('start_date').value);
        formData.append('end_date', document.getElementById('end_date').value);
        formData.append('diploma_id', document.getElementById('diploma_id').value);

        storeRoute('/cms/admin/update_courses/'+id, formData);

        // storeRoute('/cms/admin/update_employees/'+id, formData);

    }

</script>


@endsection
