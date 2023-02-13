{{-- @extends('dashboard.parent') --}}
@extends('dashboard.parent')

@section('title',' موظف النظام')

@section('sub-title',' تعديل موظف  ')

@section('active title',' تعديل بيانات الموظف  ')

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
                        <h3 class="card-title">تعديل بيانات الموظف</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form">
                        @csrf
                        <div class="card-body">

                            <br>
                            <div class="row">


                                <div class="form-group col-md-4">
                                    <label for="first_name">الاسم الموظف</label>
                                    <input type="text" name="first_name" class="form-control" id="first_name"
                                    value="{{ $employees->user->first_name }}" placeholder="أدخل اسم الأول">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="last_name">الاسم الموظف</label>
                                    <input type="text" name="last_name" class="form-control" id="last_name"
                                    value="{{ $employees->user->last_name }}"                                    placeholder="أدخل الاسم الأخير">
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="email"> الإيميل</label>
                                    <input type="text" name="email" class="form-control" id="email"
                                    value="{{ $employees->email}}" placeholder="ادخل الايمل   ">
                                </div>

                                <br>
                                {{-- <div class="row"> --}}
                                <div class="form-group col-md-4">
                                    <label for="password"> كلمة المرور</label>
                                    <input type="password" name="password" class="form-control" id="password"
                                        placeholder="ادخل كلمة المرور  ">
                                </div>
                            {{-- </div> --}}


                                <div class="form-group col-md-4">
                                    <label for="mobile"> رقم الجوال</label>
                                    <input type="text" name="mobile" class="form-control"
                                    value="{{ $employees->user->mobile }}" id="mobile" placeholder="ادخل رقم الجوال  ">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="date_of_birth"> تاريخ الميلاد </label>
                                    <input type="date" name="date_of_birth" class="form-control" id="date_of_birth"
                                    value="{{ $employees->user->date_of_birth }}"  placeholder="ادخل تاريخ الميلاد   ">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="speciality"> التخصص </label>
                                    <input type="text" name="speciality" class="form-control"
                                    value="{{ $employees->user->speciality }}" id="speciality" placeholder="ادخل التخصص  ">
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="city_id">اسم المدينة</label>
                                    <select class="form-control form-control-sm" name="city_id" style="width: 100%;"
                                        id="city_id" aria-label=".form-select-sm example">
                                        @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>

                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="job_title"> المسمى الوظيفي</label>
                                    <select class="form-control form-control-sm" name="job_title" style="width: 100%;"
                                        id="job_title" aria-label=".form-select-sm example">
                                        <option selected >{{ $employees->user->job_title }} </option>
                                        <option value="مشرف"> مشرف </option>
                                        <option value="مدرب"> مدرب</option>
                                        <option value="استقبال"> استقبال</option>
                                        <option value="إداري"> إداري</option>

                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="salary_type">نوع الراتب</label>
                                    <select class="form-control form-control-sm" name="salary_type" style="width: 100%;"
                                        id="salary_type" aria-label=".form-select-sm example">
                                        <option selected >{{ $employees->user->salary_type }} </option>
                                        <option value="راتب ثابت">راتب ثابت </option>
                                        <option value="راتب بالساعة">راتب بالساعة</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="certification">المؤهل العلمي</label>
                                    <select class="form-control form-control-sm" name="certification" style="width: 100%;"
                                        id="certification" aria-label=".form-select-sm example">
                                        <option selected >{{ $employees->user->certification }} </option>
                                        <option value="دبلومة">دبلوم </option>
                                        <option value="بكالوريس"> بكالوريس </option>
                                        <option value="ماستر"> ماستر</option>
                                        <option value="بدون"> بدون</option>

                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="salary_value"> قيمة الراتب </label>
                                    <input type="text" name="salary_value" class="form-control"
                                    value="{{ $employees->user->salary_value }}"   id="salary_value" placeholder="ادخل قيمة الراتب  ">
                                </div>

                            </div>
                            <div class="row">


                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="image">تعديل     صورة شخصية</label>
                                      <input type="file" name="image" class="form-control" id="image"
                                        placeholder=" أضف صورة شخصية">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="cv">تعديل السيرة الذاتية</label>
                                      <input type="file" name="cv" class="form-control" id="cv"
                                        placeholder="أرفق السيرة الذاتية">
                                </div>


                            </div>

                        </div>

                        <br>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="button" onclick="update()" class="btn btn-lg btn-success">تعديل</button>
                            @can('Index-Employee')
                                
                            <a href="{{route('employees.index')}}"><button type="button" class="btn btn-lg btn-primary">
                                    قائمة الموظفين </button>
                            </a>
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


    function update(){

        let formData = new FormData();
            formData.append('first_name',document.getElementById('first_name').value);
            formData.append('last_name',document.getElementById('last_name').value);
            formData.append('mobile',document.getElementById('mobile').value);
            formData.append('date_of_birth',document.getElementById('date_of_birth').value);
            formData.append('email',document.getElementById('email').value);
            formData.append('password',document.getElementById('password').value);
            formData.append('salary_type',document.getElementById('salary_type').value);
            formData.append('salary_value',document.getElementById('salary_value').value);
            formData.append('speciality',document.getElementById('speciality').value);
            formData.append('job_title',document.getElementById('job_title').value);
            formData.append('certification',document.getElementById('certification').value);
            formData.append('city_id',document.getElementById('city_id').value);
            formData.append('image',document.getElementById('image').files[0]);
            formData.append('cv',document.getElementById('cv').files[0]);

            storeRoute('/cms/admin/update_employee' , formData );

    }

</script>


@endsection
