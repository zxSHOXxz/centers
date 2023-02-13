@extends('dashboard.parent')

@section('title',' الدفع')

@section('sub-title',' تعديل الدفع  ')

@section('active title',' تعديل الدفع ')
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
                      <h3 class="card-title">الدفع</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="create_form">
                      @csrf
                      <div class="card-body">

                      <br>
                      <div class="row">


                        <div class="form-group col-md-6">
                            <label for="pay_nubmer"> رقم الدفعة </label>
                            <select class="form-control" id="pay_nubmer" name="pay_nubmer">
                                <option value="الدفعة الاولي" @if($payments->pay_nubmer == 'الدفعة الاولي') selected @endif> الدفعة الاولي</option>
                                <option value="الدفعة الثانية"@if($payments->pay_nubmer == 'الدفعة الثانية') selected @endif> الدفعة الثانية </option>
                                <option value="الدفعة الثالثة"@if($payments->pay_nubmer == 'الدفعة الثالثة') selected @endif> الدفعة الثالثة</option>
                                <option value="الدفعة الرابعة"@if($payments->pay_nubmer == 'الدفعة الرابعة') selected @endif>الدفعة الرابعة</option>
                                <option value="الدفعة الخامسة"@if($payments->pay_nubmer == 'الدفعة الخامسة') selected @endif> الدفعة الخامسة</option>
                                <option value="الدفعة السادسة"@if($payments->pay_nubmer == 'الدفعة السادسة') selected @endif>الدفعة السادسة</option>
                            </select>
                            
                        </div>

                        <div class="form-group col-md-6">
                            <label for="pay"> دفعة * </label>
                            <input type="text" name="pay" class="form-control" id="pay" value="{{ $payments->pay }}"
                            placeholder="ادخل  الدفعة">
                        </div>

                    </div>

                          <br>

                      <!-- /.card-body -->
                      <div class="card-footer">
                          <button type="button" onclick="performUpdate({{$payments->id}})" class="btn btn-lg btn-success">حفظ</button>
                         {{-- @can('Index-City') --}}
                             
                         <a href="{{route('payments.index')}}"><button type="button" class="btn btn-lg btn-primary"> قائمة الدفع  </button></a>
                         {{-- @endcan --}}
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
    formData.append('pay_nubmer' , document.getElementById('pay_nubmer').value);
    formData.append('pay' , document.getElementById('pay').value);
    storeRoute('/cms/admin/update_payments/'+id , formData );
    }
    </script>


@endsection


