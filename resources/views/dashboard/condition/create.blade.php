@extends('dashboard.parent')

@section('title',' أحوال الطالب')

@section('sub-title',' أحوال الطالب  ')

@section('active title',' إضافة أحوال الطالب ')
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
                      <h3 class="card-title">أحوال الطالب</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="create_form">
                      @csrf
                      <div class="card-body">

                      <br>
                      <div class="row">

                        <input type="text" name="student_id" id="student_id" value="{{$id}}"
                        class="form-control form-control-solid" hidden/>

                            <div class="form-group col-md-12">
                                <label for="date"> التاريخ</label>
                                <input type="date" name="date" class="form-control" id="date"
                                    placeholder="أدخل التاريخ ">
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="statmente"> البيان</label>
                                        <textarea class="form-control  text-left" style="resize: none;"
                                        id="statmente" name="statmente" rows="4"
                                        placeholder="ادخل البيان" cols="50"></textarea>
                                </div>
                            </div>
                        </div>

                          <br>

                      <!-- /.card-body -->
                      <div class="card-footer">
                          <button type="button" onclick="performStore()" class="btn btn-lg btn-success">حفظ</button>
                          @can('Index-Condition')
                          <a href="{{route('indexCondition' , $id)}}"><button type="button" class="btn btn-lg btn-primary"> قائمة المدن </button></a>
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

@section('scripts')


 <script>

     function performStore() {

        let formData = new FormData();
            formData.append('date',document.getElementById('date').value);
            formData.append('statmente',document.getElementById('statmente').value);
            formData.append('student_id',document.getElementById('student_id').value);

            store('/cms/admin/conditions',formData);

    }

</script>


@endsection


