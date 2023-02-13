{{-- @extends('dashboard.parent') --}}
@extends('dashboard.parent')

@section('title',' مدير النظام')

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
                        <h3 class="card-title">تعديل بيانات المشرف</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form">
                        @csrf
                        <div class="card-body">

                            <br>
                            <div class="row">


                                <div class="form-group col-md-6">
                                    <label for="current_password">كلمة المرور الحالية</label>
                                    <input type="password" class="form-control" id="current_password"
                                        placeholder="Current Password">
                                </div>
                                <div class="form-group col-md-6">
                                </div>

                                <br>
                                <div class="form-group col-md-6">
                                    <label for="new_password">كلمة المرور الجديدة</label>
                                    <input type="password" class="form-control" id="new_password"
                                    placeholder="أدخل الاسم الأخير">
                                </div>
                                <div class="form-group col-md-6">
                                </div>
                                <br>
                                <div class="form-group col-md-6">
                                    <label for="new_password_confirmation"> تأكيد كلمة المرور</label>
                                    <input type="password"  class="form-control" id="new_password_confirmation"
                               placeholder="ادخل الايمل   ">
                                </div>
                            </div>


                        </div>

                        <br>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="button" onclick="update()" class="btn btn-lg btn-success">تعديل</button>
                            <a href="{{route('admins.index')}}"><button type="button" class="btn btn-lg btn-primary">
                                    قائمة المشرفين </button></a>
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




    function update(){

        let formData = new FormData();
            formData.append('current_password',document.getElementById('current_password').value);
            formData.append('new_password',document.getElementById('new_password').value);
            formData.append('new_password_confirmation',document.getElementById('new_password_confirmation').value);


            storeRoute('/cms/admin/password/update', formData );
            // let redirectUrl = '/cms/admin'

    }

</script>


@endsection
