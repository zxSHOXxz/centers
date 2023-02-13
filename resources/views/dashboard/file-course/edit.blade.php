@extends('dashboard.parent')

@section('title',' الملفات')

@section('sub-title',' تعديل الملف  ')

@section('active title',' تعديل الملفات ')
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
                      <h3 class="card-title">الملفات</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="create_form">
                      @csrf
                      <div class="card-body">

                      <br>
                      <div class="row">
                        {{-- <input type="text" name="course_id" id="course_id" value="{{$id}}"
                        class="form-control form-control-solid" hidden/> --}}

                    <div class="form-group col-md-6">
                        <label for="fileName">اسم الملفات </label>
                        <input type="text" name="fileName" class="form-control" id="fileName"
                          value="{{ $files->fileName }}"  placeholder="اسم الملف  ">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="file">ملفات المساق </label>
                        <input type="file" name="file" class="form-control" id="file"
                            placeholder="ملفات المساق  ">
                    </div>

                        </div>

                          <br>

                      <!-- /.card-body -->
                      <div class="card-footer">
                          <button type="button" onclick="update({{ $files->id }})" class="btn btn-lg btn-success">تعديل</button>
                         <a href="{{route('indexCFile' , $id)}}"><button type="button" class="btn btn-lg btn-primary"> قائمة الملفات </button></a>
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

     function update(id) {

        let formData = new FormData();
        formData.append('fileName',document.getElementById('fileName').value);
            formData.append('file',document.getElementById('file').files[0]);
            // formData.append('diploma_id',document.getElementById('diploma_id').value);
            // formData.append('course_id',document.getElementById('course_id').value);
            storeRoute('/cms/admin/update_files/'+id,formData );
    }

</script>


@endsection


