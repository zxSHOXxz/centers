@extends('dashboard.parent')

@section('title',' دفعة')

@section('sub-title',' إضافة دفعة ')

@section('active title',' إضافة دفعة  ')
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
                      <h3 class="card-title">دفعة</h3>
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
                                    <option value="الدفعة الاولي"> الدفعة الاولي</option>
                                    <option value="الدفعة الثانية"> الدفعة الثانية </option>
                                    <option value="الدفعة الثالثة"> الدفعة الثالثة</option>
                                    <option value="الدفعة الرابعة">الدفعة الرابعة</option>
                                    <option value="الدفعة الخامسة"> الدفعة الخامسة</option>
                                    <option value="الدفعة السادسة">الدفعة السادسة</option>
                                </select>

                            </div>

                            <div class="form-group col-md-6">
                                <label for="pay"> دفعة * </label>
                                <input type="text" name="pay" class="form-control" id="pay"
                                placeholder="ادخل  الدفعة">
                            </div>
                            <input type="hidden" name="financial_payment_id" class="form-control" id="financial_payment_id" value="{{ $id }}">

                        </div>

                          <br>

                      <!-- /.card-body -->
                      <div class="card-footer">
                          <button type="button" onclick="performStore()" class="btn btn-lg btn-success">حفظ</button>
                         {{-- @can('Index-City') --}}

                         <a href="{{route('payments.index')}}"><button type="button" class="btn btn-lg btn-primary"> قائمة الدفع </button></a>
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

     function performStore() {

        let formData = new FormData();
            formData.append('pay_nubmer',document.getElementById('pay_nubmer').value);
            formData.append('pay',document.getElementById('pay').value);
            formData.append('financial_payment_id',document.getElementById('financial_payment_id').value);
        store('/cms/admin/payments',formData);

    }

</script>


@endsection


