@extends('dashboard.parent')

@section('title',' الزيارة')

@section('sub-title',' إضافة الزيارة ')

@section('active title',' إضافة الزيارة  ')
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
                      <h3 class="card-title">الزيارة</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="create_form">
                      @csrf
                      <div class="card-body">

                      <br>
                      <div class="row">


                            <div class="form-group col-md-6">
                                <label for="name">رقم الزيارة</label>
                                <input type="number" name="number_visit" class="form-control" id="number_visit"
                                    placeholder="أدخل رقم الزيارة">
                            </div>

                                <div class="form-group col-md-12">
                                    <label for="description"> الوصف</label>
                                    <textarea class="form-control" style="resize: none;" id="description"
                                        name="description" rows="4" placeholder="ادخل الوصف" cols="50"></textarea>
                                </div>
                                <input type="hidden" name="vistor_id" id="vistor_id" value="{{ $id }}">
                        </div>

                          <br>

                      <!-- /.card-body -->
                      <div class="card-footer">
                          <button type="button" onclick="performStore()" class="btn btn-lg btn-success">حفظ</button>
                             
                         <a href="{{route('indexTheVisit',$id)}}"><button type="button" class="btn btn-lg btn-primary"> قائمة الزيارات  </button></a>
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
            formData.append('number_visit',document.getElementById('number_visit').value);
            formData.append('description',document.getElementById('description').value);
            formData.append('vistor_id',document.getElementById('vistor_id').value);
        store('/cms/admin/the_visits',formData);

    }

</script>


@endsection


