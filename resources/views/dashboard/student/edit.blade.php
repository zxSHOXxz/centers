{{-- @extends('dashboard.parent') --}}
@extends('dashboard.parent')

@section('title',' الطلاب ')

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
                        <h3 class="card-title">تعديل بيانات الطلاب </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form">
                        @csrf
                        <div class="card-body">

                            <br>
                            <div class="row">


                                <div class="form-group col-md-4">
                                    <label for="name_en">الاسم بالانجليزي</label>
                                    <input type="text" name="name_en" class="form-control" id="name_en"
                                        placeholder="أدخل اسم بالانجليزي" value="{{ $students->name_en }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="name_ar">الاسم بالعربي</label>
                                    <input type="text" name="name_ar" class="form-control" id="name_ar"
                                        placeholder="أدخل الاسم بالعربي" value="{{ $students->name_ar }}">
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="email"> الإيميل</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="ادخل الايمل  " value="{{ $students->email }}">
                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label for="mobile1"> رقم الجوال الاول</label>
                                    <input type="text" name="mobile1" class="form-control"
                                        id="mobile1" placeholder="ادخل رقم الجوال  " value="{{ $students->mobile1 }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="mobile2"> رقم الجوال الثاني</label>
                                    <input type="text" name="mobile2" class="form-control"
                                        id="mobile2" placeholder="ادخل رقم الجوال  " value="{{ $students->mobile2 }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="another_mobile"> رقم الجوال اخر </label>
                                    <input type="text" name="another_mobile" class="form-control" id="another_mobile"
                                        placeholder="ادخل رقم الجوال اخر   " value="{{ $students->another_mobile }}">
                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label for="another_name"> اسم اخر  </label>
                                    <input type="text" name="another_name" class="form-control"
                                        id="another_name" placeholder=" اسم اخر   " value="{{ $students->another_name }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="spciality"> اسم التخصص  </label>
                                    <input type="text" name="spciality" class="form-control"
                                        id="spciality" placeholder=" اسم التخصص   " value="{{ $students->spciality }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="employee"> موظف </label>
                                    <select class="form-control" name="employee"
                                    id="employee" >
                                    <option selected>{{ $students->employee }}</option>
                                    <option value="yes"> نعم  </option>
                                    <option value="no"> لا </option>
                                </select>
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-md-4">
                                <label for="date_of_birth">تاريخ الولادة  </label>
                                <input type="date" name="date_of_birth" class="form-control"
                                    id="date_of_birth" placeholder=" تاريخ الولادة  " value="{{ $students->date_of_birth }}">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="qualification">المؤهل </label>
                                    <select class="form-control" name="qualification"
                                        id="qualification" >
                                        <option selected>{{ $students->qualification }}</option>
                                        <option value="a">a </option>
                                        <option value="b"> b </option>
                                        <option value="c"> c</option>
                                        <option value="d"> d</option>

                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="work_place"> مكان العمل </label>
                                    <input type="text" name="work_place" class="form-control"
                                        id="work_place" placeholder="ادخل  مكان العمل  " value="{{ $students->work_place }}">
                                </div>
                            </div>
                                <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="access_method">  طريقة الوصول </label>
                                    <input type="text" name="access_method" class="form-control"
                                    id="access_method" placeholder="ادخل   طريقة الوصول   " value="{{ $students->access_method }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="status">الحالة</label>
                                    <select class="form-control" name="status"
                                    id="status" >
                                    <option selected>{{ $students->status }}</option>
                                    <option value="active"> نشيط</option>
                                    <option value="blackList">القائمة السوداء</option>
                                    <option value="finished">تم الانتهاء </option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="specialities_id"> التخصصات </label>
                                <input type="text" name="specialities_id" class="form-control"
                                id="specialities_id" placeholder="ادخل  التخصصات  " value="{{ $students->specialities_id }}">
                            </div>
                            </div>
                                <div class="row">
                            <div class="form-group col-md-4">
                                <label for="city_id">اسم المدينة</label>
                                <select class="form-control" name="city_id"
                                    id="city_id">
                                    @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>

                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="group_id">اسم المجموعة</label>
                                <select class="form-control" name="group_id"
                                    id="group_id">
                                    @foreach ($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->group_name }}</option>

                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="finance_id">المالية</label>
                                <select class="form-control" name="finance_id"
                                    id="finance_id">
                                    @foreach ($finances as $finance)
                                    <option value="{{ $finance->id }}">{{ $finance->payment_method }}</option>

                                    @endforeach
                                </select>
                            </div>
                            </div>
                        </div>

                        <br>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="button" onclick="update({{$students->id}})" class="btn btn-lg btn-success">تعديل</button>
                            @can('Index-Student')
                                
                            <a href="{{route('students.index')}}"><button type="button" class="btn btn-lg btn-primary">
                                    قائمة الطلاب  </button>
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


    function update(id){

        let formData = new FormData();
        formData.append('name_en',document.getElementById('name_en').value);
            formData.append('name_ar',document.getElementById('name_ar').value);
            formData.append('email',document.getElementById('email').value);
            formData.append('mobile1',document.getElementById('mobile1').value);
            formData.append('mobile2',document.getElementById('mobile2').value);
            formData.append('date_of_birth',document.getElementById('date_of_birth').value);
            formData.append('another_mobile',document.getElementById('another_mobile').value);
            formData.append('another_name',document.getElementById('another_name').value);
            formData.append('spciality',document.getElementById('spciality').value);
            formData.append('employee',document.getElementById('employee').value);
            formData.append('qualification',document.getElementById('qualification').value);
            formData.append('work_place',document.getElementById('work_place').value);
            formData.append('access_method',document.getElementById('access_method').value);
            formData.append('status',document.getElementById('status').value);
            formData.append('specialities_id',document.getElementById('specialities_id').value);
            formData.append('group_id',document.getElementById('group_id').value);
            formData.append('city_id',document.getElementById('city_id').value);
            // formData.append('finance_id',document.getElementById('finance_id').value);


            storeRoute('/cms/admin/update_students/'+id , formData );

    }

</script>


@endsection
