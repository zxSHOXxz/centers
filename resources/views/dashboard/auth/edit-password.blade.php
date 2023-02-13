@extends('dashboard.parent')

@section('title',' تغيير كلمة المرور')

@section('sub-title','  كلمة المرور  ')

@section('active title',' تغيير كلمة المرور  ')
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
                      <h3 class="card-title">تغيير كلمة المرور</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="create_form">
                      @csrf
                      <div class="card-body">

                      <br>
                      <div class="row">


                            <div class="form-group col-md-6">
                                <label for="current_password"> أدخل كلمة المرور الحالية</label>
                                <input type="password"  class="form-control" id="current_password"
                                    placeholder="أدخل كلمة المرور الحالية ">
                            </div>

                           <div class="form-group col-md-6">
                        </div>

                            <div class="form-group col-md-6">
                                <label for="new_password"> أدخل كلمة المرور الجديدة</label>
                                <input type="password"  class="form-control" id="new_password"
                                    placeholder="أدخل كلمة المرور الجديدة">
                            </div>
                            <div class="form-group col-md-6">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="new_password_confirmation"> تأكيد كلمة المرور</label>
                                <input type="password" class="form-control" id="new_password_confirmation"
                                    placeholder="تأكيد كلمة المرور الجديدة  ">
                            </div>
                            <div class="form-group col-md-6">
                            </div>
                        </div>

                          <br>

                      <!-- /.card-body -->
                      <div class="card-footer">
                          <button type="button" onclick="performStore()" class="btn btn-lg btn-success">تغيير كلمة المرور</button>
                         {{-- <a href="{{route('cities.index')}}"><button type="button" class="btn btn-lg btn-primary"> قائمة المدن </button></a> --}}
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

     function performStore() {

        let formData = new FormData();
            formData.append('current_password',document.getElementById('current_password').value);
            formData.append('new_password',document.getElementById('new_password').value);
            formData.append('new_password_confirmation',document.getElementById('new_password_confirmation').value);

            store('/cms/admin/update/password',formData);
    }

</script>

@endsection


