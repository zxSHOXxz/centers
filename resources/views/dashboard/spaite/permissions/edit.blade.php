@extends('dashboard.parent')

@section('title',' الصلاحيات')

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
                        <h3 class="card-title">تعديل بيانات الصلاحيات</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form">
                        @csrf
                        <div class="card-body">

                            <br>
                            <div class="row">


                                <div class="form-group col-md-4">
                                    <label for="guard_name">نوع الوظيفي</label>
                                    <select class="form-control" name="guard_name" style="width: 100%;"
                                        id="guard_name" aria-label=".form-select-sm example">
                                        <option value="trainer" @if($permissions->guard_name == 'trainer') selected @endif>مدرب</option>
                                        <option value="employee" @if($permissions->guard_name == 'employee') selected @endif>موظف</option>
                                        <option value="student" @if($permissions->guard_name == 'student') selected @endif>طالب</option>
                                        <option value="admin" @if($permissions->guard_name == 'admin') selected @endif>الأدمن</option>

                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="name">الصلاحية </label>
                                    <input type="text" name="name" class="form-control" id="name"
                                       value="{{ $permissions->name }}" placeholder="أدخل الصلاحية">
                                </div>


                        </div>

                        <br>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="button" onclick="performUpdate({{ $permissions->id }})" class="btn btn-lg btn-success">تعديل</button>
                            <a href="{{route('permissions.index')}}"><button type="button" class="btn btn-lg btn-primary">
                                     إلغاء </button></a>
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

$('.guard_name').select2({
      theme: 'bootstrap4'
    })


    function performUpdate(id) {
        let formData = new FormData();
        formData.append('name', document.getElementById('name').value);
        formData.append('guard_name', document.getElementById('guard_name').value);

        storeRoute('/cms/admin/update_permissions/'+id, formData);
    }


</script>

@endsection
