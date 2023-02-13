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
                                        placeholder="أدخل اسم بالانجليزي" value="{{ $applies->name_en }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="name_ar">الاسم بالعربي</label>
                                    <input type="text" name="name_ar" class="form-control" id="name_ar" value="{{ $applies->name_ar }}"
                                        placeholder="أدخل الاسم بالعربي">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="spciality">  التخصص  </label>
                                        <select class="form-control" name="spciality"
                                            id="spciality" value="{{ $applies->spciality }}">
                                            <option value="ap">  دبلومة البرمجة  </option>
                                            <option value="af">   دبلومة فلاتر  </option>
                                            <option value="ad">   دبلومة التصميم </option>
                                            <option value="aj">   دبلومة الجوال </option>
                                            <option value="ads">   دبلومة اللابتوب  </option>
                                            <option value="ak">   دبلومة الخلايا  </option>
                                        </select>
                                </div>

                            </div>
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label for="address"> العنوان </label>
                                    <input type="text" name="address" class="form-control" value="{{ $applies->address }}"
                                        id="address" placeholder=" العنوان ">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="mobile1"> رقم الجوال </label>
                                    <input type="text" name="mobile1" class="form-control" value="{{ $applies->mobile1 }}"
                                        id="mobile1" placeholder="ادخل رقم الجوال  ">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="email"> الايميل  </label>
                                    <input type="email" name="email" class="form-control" value="{{ $applies->email }}"
                                        id="email" placeholder="  ادخل الايميل   ">
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="name_topic">  اسم الموضوع </label>
                                        <select class="form-control" name="name_topic"
                                            id="name_topic" >
                                            <option value="suggestion">اقتراح</option>
                                            <option value="complaint">شكوى</option>
                                            <option value="show_case">عرض قضية</option>
                                            <option value="Other">أخرى</option>

                                        </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="status">  الحالة  </label>
                                        <select class="form-control" name="status"
                                            id="status" >
                                            <option value="active">نشيط</option>
                                            <option value="blackList">شكوى</option>
                                            <option value="finished"> غير نشيط</option>

                                        </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="employee_id"> اسم الموظف  </label>
                                    <input type="text" name="employee_id" class="form-control" id="employee_id"
                                        placeholder="أدخل اسم بالانجليزي" value="{{ $employee->id }}">
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="topic"> الموضوع </label>
                                    <textarea  name="topic" class="w-100 form-control" id="topic" rows="4" placeholder="الموضوع ..."> {{ $applies->topic }}</textarea>
                            </div>
                            </div>



                            <br>
                            <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="button" onclick="update({{$applies->id}})" class="btn btn-lg btn-success">تعديل</button>
                            <a href="{{route('applies.index')}}"><button type="button" class="btn btn-lg btn-primary">
                                    قائمة الطلاب  </button></a>
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
            formData.append('spciality',document.getElementById('spciality').value);
            formData.append('address',document.getElementById('address').value);
            formData.append('mobile1',document.getElementById('mobile1').value);
            formData.append('email',document.getElementById('email').value);
            formData.append('name_topic',document.getElementById('name_topic').value);

            formData.append('topic',document.getElementById('topic').value);
            formData.append('status',document.getElementById('status').value);
            formData.append('employee_id',document.getElementById('employee_id').value);


            storeRoute('/cms/admin/update_applies/'+id , formData );

    }

</script>


@endsection
