@extends('dashboard.parent')

@section('title',' القاعة')

@section('sub-title',' تعديل القاعة  ')

@section('active title',' تعديل بيانات القاعة  ')
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
                      <h3 class="card-title">تعديل القاعة</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="create_form">
                      @csrf
                      <div class="card-body">

                      <br>
                      <div class="row">
                            <div class="form-group col-md-4">
                                <label for="room_number">الاسم القاعة</label>
                                <input type="text" name="room_number" class="form-control" id="room_number"
                                   value="{{ $rooms->room_number }}" placeholder="أدخل رقم واسم القاعة">
                            </div>

                            {{-- <div class="form-group col-md-4">
                                <label for="from"> من</label>
                                <input type="text" name="from" class="form-control" id="from"
                                    placeholder="ادخل بداية الموعد  ">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="to"> إلى </label>
                                <input type="text" name="to" class="form-control" id="to"
                                    placeholder="ادخل نهاية الموعد  ">
                            </div> --}}


                        <div class="form-group col-md-4">
                            <label for="from">Time of Works</label>
                            <select class="form-select form-select-sm" name="from" style="width: 100%;"
                                id="from" aria-label=".form-select-sm example">
                                <option selected>{{ $rooms->from }}</option>
                                <option value="08:00">08:00</option>
                                <option value="08:30">08:30</option>
                                <option value="09:00">09:00</option>
                                <option value="09:30">09:30</option>
                                <option value="10:00">10:00</option>
                                <option value="10:30">10:30</option>
                                <option value="11:00">11:00</option>
                                <option value="11:30">11:30</option>
                                <option value="12:00">12:00</option>
                                <option value="12:30">12:30</option>
                                <option value="01:00">01:00</option>
                                <option value="01:30">01:30</option>
                                <option value="02:00">02:00</option>
                                <option value="02:30">02:30</option>
                                <option value="03:00">03:00</option>
                                <option value="03:30">03:30</option>
                                <option value="04:00">04:00</option>
                                <option value="04:30">04:30</option>
                                <option value="05:00">05:00</option>
                                <option value="04:30">05:30</option>

                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="to">Time of Works</label>
                            <select class="form-select form-select-sm" name="to" style="width: 100%;"
                                id="to" aria-label=".form-select-sm example">
                                <option selected>{{ $rooms->to }}</option>

                                <option value="10:00">10:00</option>
                                <option value="10:30">10:30</option>
                                <option value="11:00">11:00</option>
                                <option value="11:30">11:30</option>
                                <option value="12:00">12:00</option>
                                <option value="12:30">12:30</option>
                                <option value="01:00">01:00</option>
                                <option value="01:30">01:30</option>
                                <option value="02:00">02:00</option>
                                <option value="02:30">02:30</option>
                                <option value="03:00">03:00</option>
                                <option value="03:30">03:30</option>
                                <option value="04:00">04:00</option>
                                <option value="04:30">04:30</option>
                                <option value="05:00">05:00</option>
                                <option value="05:30">05:30</option>
                                <option value="06:00">06:00</option>
                                <option value="06:30">06:30</option>
                                <option value="07:00">07:00</option>
                                <option value="07:30">07:30</option>
                                <option value="08:00">08:00</option>
                                <option value="08:30">08:30</option>
                            </select>
                        </div>
                        </div>

                          <br>

                      <!-- /.card-body -->
                      <div class="card-footer">
                          <button type="button" onclick="performUpdate({{ $rooms->id }})" class="btn btn-lg btn-success">حفظ</button>
                         @can('Index-Room')
                         <a href="{{route('rooms.index')}}"><button type="button" class="btn btn-lg btn-primary"> قائمة القاعات </button></a>
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
    formData.append('room_number' , document.getElementById('room_number').value);
    formData.append('from' , document.getElementById('from').value);
    formData.append('to' , document.getElementById('to').value);

    storeRoute('/cms/admin/update_rooms/'+id , formData );
    }
    </script>


@endsection


