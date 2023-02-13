@extends('dashboard.parent')

@section('title',' المدينة')

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
                      <h3 class="card-title">المدينة</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="create_form">
                      @csrf
                      <div class="card-body">

                      <br>
                      <div class="row">


                            <div class="form-group col-md-6">
                                <label for="name">الاسم المدينة</label>
                                <input type="text" name="name" class="form-control" id="name"
                                   value="{{ $cities->name }}" placeholder="أدخل الاسم المدينة">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="street"> اسم الشارع</label>
                                <input type="text" name="street" class="form-control" id="street"
                                  value="{{ $cities->street }}"  placeholder="ادخل اسم الشارع">
                            </div>
                        </div>

                          <br>

                      <!-- /.card-body -->
                      <div class="card-footer">
                          <button type="button" onclick="performUpdate({{$cities->id}})" class="btn btn-lg btn-success">حفظ</button>
                         @can('Index-City')
                         <a href="{{route('cities.index')}}"><button type="button" class="btn btn-lg btn-primary"> قائمة المدن </button></a>
                             
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

    function performUpdate(id){
    let formData = new FormData();
    formData.append('name' , document.getElementById('name').value);
    formData.append('street' , document.getElementById('street').value);
    storeRoute('/cms/admin/update_cities/'+id , formData );
    }
    </script>


@endsection


