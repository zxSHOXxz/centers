{{-- @extends('dashboard.parent') --}}
@extends('dashboard.parent')

@section('title',' الدبلومة')

@section('sub-title',' تعديل الدبلومة  ')

@section('active title',' تعديل الدبلومة ')
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
                        <h3 class="card-title">تعديل بيانات الدبلومة</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form">
                        @csrf
                        <div class="card-body">

                            <br>
                            <div class="row">


                                <div class="form-group col-md-4">
                                    <label for="name">الاسم الدبلومة</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{ $diplomas->name }}" placeholder="أدخل اسم الدبلومة">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="trannig_type">نوع الدبلومة</label>
                                    <select class="form-select form-select-sm" name="trannig_type" style="width: 100%;" id="trannig_type" aria-label=".form-select-sm example">
                                        <option selected>{{$diplomas->trannig_type}}</option>
                                        <option value="diploma">دبلومة</option>
                                        <option value="course">دورة</option>

                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="number_of_hours"> عدد الساعات</label>
                                    <input type="text" name="number_of_hours" class="form-control" id="number_of_hours" value="{{$diplomas->number_of_hours}}" placeholder="ادخل عدد الساعات  ">
                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label for="number_of_student"> عدد الطلاب</label>
                                    <input type="text" name="number_of_student" class="form-control" id="number_of_student" value="{{ $diplomas->number_of_student }}" placeholder="ادخل عدد الطلاب  ">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="speciality"> التخصص</label>
                                    <input type="text" name="speciality" class="form-control" id="speciality" value="{{$diplomas->speciality}}" placeholder="ادخل التخصص   ">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="degree"> الدرجة</label>
                                    <input type="text" name="degree" class="form-control" id="degree" value="{{$diplomas->degree}}" placeholder="ادخل الدرجة   ">
                                </div>

                            </div>
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label for="start_date"> تاريخ البداية </label>
                                    <input type="date" name="start_date" class="form-control" id="start_date" value="{{$diplomas->start_date}}" placeholder="ادخل تاريخ بداية   ">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="end_date"> تاريخ النهاية </label>
                                    <input type="date" name="end_date" class="form-control" id="end_date" value="{{$diplomas->end_date}}" placeholder="ادخل تاريخ النهاية   ">
                                </div>



                                <div class="form-group col-md-4">
                                    <label for="price"> الرسوم</label>
                                    <input type="text" name="price" class="form-control" id="price" value="{{$diplomas->price}}" placeholder="ادخل رسوم الدبلومة  ">
                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label for="currency">نوع العملة</label>
                                    <select class="form-select form-select-sm" name="currency" style="width: 100%;" id="currency" aria-label=".form-select-sm example">
                                        <option selected>{{ $diplomas->currency}}</option>
                                        <option value="DOLLAR">دولار</option>
                                        <option value="NIS">شيكل</option>
                                        <option value="JOD">دينار</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="status">حالة الدبلومة</label>
                                    <select class="form-select form-select-sm" name="status" style="width: 100%;" id="status" aria-label=".form-select-sm example">
                                        <option selected>{{ $diplomas->status}}</option>
                                        <option value="Active">قيد البدء</option>
                                        <option value="Ready">جاهزة للبدء</option>
                                        <option value="Finshed">منتهية</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="room_id">رقم القاعة</label>
                                    <select class="form-select form-select-sm" name="room_id" style="width: 100%;" id="room_id" aria-label=".form-select-sm example">
                                        @foreach ($rooms as $room)
                                        <option value="{{ $room->id }}">{{ $room->room_number }}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">وصف الخدمة عربي</label>
                                        <textarea class="form-control" style="resize: none;" id="description" name="description" rows="4"
                                         placeholder="ادخل الوصف" cols="50">{{ $diplomas->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="button" onclick="performUpdate({{ $diplomas->id }})" class="btn btn-lg btn-success">تعديل</button>
                            @can('Index-Diploma')
                            <a href="{{route('diplomas.index')}}"><button type="button" class="btn btn-lg btn-primary">
                                    قائمة الدبلومة </button>
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
    $('.room_id').select2({
        theme: 'bootstrap4'
    })


    function performUpdate(id) {
        let formData = new FormData();
        formData.append('name', document.getElementById('name').value);
        formData.append('trannig_type', document.getElementById('trannig_type').value);
        formData.append('number_of_hours', document.getElementById('number_of_hours').value);
        formData.append('start_date', document.getElementById('start_date').value);
        formData.append('end_date', document.getElementById('end_date').value);
        formData.append('degree', document.getElementById('degree').value);
        formData.append('price', document.getElementById('price').value);
        formData.append('currency', document.getElementById('currency').value);
        formData.append('number_of_student', document.getElementById('number_of_student').value);
        formData.append('description', document.getElementById('description').value);
        formData.append('status', document.getElementById('status').value);
        formData.append('speciality', document.getElementById('speciality').value);
        formData.append('room_id', document.getElementById('room_id').value);

        storeRoute('/cms/admin/update_employees/'+id, formData);
    }

</script>


@endsection
