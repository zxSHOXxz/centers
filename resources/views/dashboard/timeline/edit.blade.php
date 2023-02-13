{{-- @extends('dashboard.parent') --}}
@extends('dashboard.parent')

@section('title',' جدول القاعة')

@section('sub-title',' إنشاء جدول القاعة  ')

@section('active title',' إضافة بيانات جدول القاعة ')
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
                      <h3 class="card-title">القاعة</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="create_form">
                      @csrf
                      <div class="card-body">

                      <br>
                      <div class="row">

                        <div class="form-group col-md-4">
                            <label for="days"> اليوم</label>
                            <select class="form-select form-select-sm" name="days" style="width: 100%;"
                                id="days" aria-label=".form-select-sm example">
                                <option selected>{{ $times->days }}</option>
                                <option value="سبت _ إثنين _ أربعاء">سبت _ إثنين _ أربعاء</option>
                                <option value="أحد _ ثلاثاء _ خميس">أحد _ ثلاثاء _ خميس</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="time">موعد المحاضرة</label>
                            <select class="form-select form-select-sm" name="time" style="width: 100%;"
                                id="time" aria-label=".form-select-sm example">
                                <option selected>{{ $times->time }}</option>
                                <option value="08:00 - 11:00">08:00 - 11:00</option>
                                <option value="08:30 - 11:30">08:30 - 11:30</option>
                                <option value="09:00 - 12:00">09:00 - 12:00</option>
                                <option value="09:30 - 12:30">09:30 - 12:30</option>
                                <option value="10:00 - 01:00">10:00 - 01:00</option>
                                <option value="10:30 - 01:30">10:30 - 01:30</option>
                                <option value="11:00 - 02:00">11:00 - 02:00</option>
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
                            <label for="period"> مدة المحاضرة</label>
                            <select class="form-select form-select-sm" name="period" style="width: 100%;"
                                id="period" aria-label=".form-select-sm example">
                                <option selected>{{ $times->period }}</option>
                                <option value="ساعتين">ساعتين</option>
                                <option value="3 ساعات"> 3 ساعات </option>

                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="group_name">اسم المجموعة</label>
                            <input type="text" name="group_name" class="form-control" id="group_name"
                            value="{{ $times->group_name }}" placeholder="أدخل اسم المجموعة">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="room_name">اسم القاعة </label>
                            <input type="text" name="room_name" class="form-control" id="room_name"
                            value="{{ $times->room_name}}"  placeholder="أدخل اسم القاعة">
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label for="status"> الحالة </label>
                            <select class="form-select form-select-sm" name="status" style="width: 100%;"
                                id="status" aria-label=".form-select-sm example">
                                <option selected>{{ $times->status }}</option>
                                <option value="متاحة">متاحة</option>
                                <option value="محجوزة"> محجوزة </option>

                            </select>
                        </div>
                        </div>

                          <br>

                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="button" onclick="update({{$times->id}})" class="btn btn-lg btn-success">تعديل</button>
                        @can("Index-TimeLine")
                        <a href="{{route('timelines.index')}}"><button type="button" class="btn btn-lg btn-primary">جدول القاعات </button></a>
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

  function update(id){

        let formData = new FormData();
            formData.append('days',document.getElementById('days').value);
            formData.append('time',document.getElementById('time').value);
            formData.append('period',document.getElementById('period').value);
            formData.append('status',document.getElementById('status').value);
            formData.append('group_name',document.getElementById('group_name').value);
            formData.append('room_name',document.getElementById('room_name').value);

        storeRoute('/cms/admin/update_timelines/'+id ,formData );
    }

</script>


@endsection


