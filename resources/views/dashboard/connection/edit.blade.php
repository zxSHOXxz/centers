{{-- @extends('dashboard.parent') --}}
@extends('dashboard.parent')

@section('title',' الاتصالات ')

@section('sub-title','  الاتصالات  ')

@section('active title',' تعديل بيانات الاتصال ')
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
                        <h3 class="card-title">تعديل بيانات الاتصالات </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form">
                        @csrf
                        <div class="card-body">

                            <br>
                            <div class="row">


                                <div class="form-group col-md-6">
                                    <label for="name">الاسم </label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="أدخل اسم " value="{{ $connections->name }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="mobile">  الجوال </label>
                                    <input type="number" name="mobile" class="form-control"
                                        id="mobile" placeholder="ادخل رقم   " value="{{ $connections->mobile }}">
                                </div>


                            </div>
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label for="date"> الوقت </label>
                                    <input type="time" name="date" class="form-control"
                                        id="date" placeholder="ادخل الوقت" value="{{ $connections->date }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="status">الحالة </label>
                                        <select class="form-control" name="status"
                                            id="status" >
                                            <option value="import">وارد </option>
                                            <option value="export"> صادر </option>
                                        </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="connection_type">نوع الاتصال   </label>
                                        <select class="form-control" name="connection_type"
                                            id="connection_type" >
                                            <option value="FB">فيسبوك  </option>
                                            <option value="Mobile"> جوال  </option>
                                            <option value="Center"> المركز </option>
                                        </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="employee">  اسم الموظف   </label>
                                    <input type="text" name="employee" class="form-control"
                                        id="employee" placeholder=" الموظف  " value="{{ $connections->employee }}">
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="replay_date"> تاريخ الاتصال  </label>
                                    <input type="date" name="replay_date" class="form-control"
                                        id="replay_date" placeholder=" تاريخ الاتصال    " value="{{ $connections->replay_date }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="replay">سبب الاتصال    </label>
                                        <select class="form-control" name="replay"
                                            id="replay" >
                                            <option value="ap">استفسار عن دبلومة البرمجة  </option>
                                            <option value="af"> استفسار عن دبلومة فلاتر  </option>
                                            <option value="ad"> استفسار عن دبلومة التصميم </option>
                                            <option value="aj"> استفسار عن دبلومة الجوال </option>
                                            <option value="ads"> استفسار عن دبلومة اللابتوب  </option>
                                            <option value="ak"> استفسار عن دبلومة الخلايا  </option>
                                            <option value="hs">  حجز موعد للتسجيل   </option>
                                            <option value="hm">  حجز موعد للمقابلة   </option>
                                        </select>
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
                            <button type="button" onclick="update({{$connections->id}})" class="btn btn-lg btn-success">تعديل</button>
                            @can('Index-Connection')

                            <a href="{{route('connections.index')}}"><button type="button" class="btn btn-lg btn-primary">
                                    قائمة الاتصالات  </button></a>
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
        formData.append('name',document.getElementById('name').value);
            formData.append('mobile',document.getElementById('mobile').value);
            formData.append('date',document.getElementById('date').value);
            formData.append('status',document.getElementById('status').value);
            formData.append('replay',document.getElementById('replay').value);
            formData.append('replay_date',document.getElementById('replay_date').value);
            formData.append('description',document.getElementById('description').value);
            formData.append('employee',document.getElementById('employee').value);
            formData.append('connection_type',document.getElementById('connection_type').value);


            storeRoute('/cms/admin/update_connections/'+id , formData );

    }

</script>


@endsection
