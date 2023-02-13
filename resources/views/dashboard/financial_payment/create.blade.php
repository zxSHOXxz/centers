{{-- @extends('dashboard.parent') --}}
@extends('dashboard.parent')

@section('title',' الدفع المالية ')

@section('sub-title',' إضافة الدفع المالية  ')

@section('active title',' إضافة الدفع المالية   ')
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
                      <h3 class="card-title">الدفع المالية </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="create_form">
                      @csrf
                      <div class="card-body">

                      <br>
                      <div class="row">


                                <div class="form-group col-md-4">
                                    <label for="name">الاسم </label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="أدخل اسم ">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="mobile1"> رقم الجوال الاول</label>
                                    <input type="text" name="mobile1" class="form-control" id="mobile1"
                                    placeholder="ادخل رقم الجوال الاول" >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="mobile2"> رقم الجوال الثاني </label>
                                    <input type="text" name="mobile2" class="form-control" id="mobile2"
                                    placeholder="ادخل رقم الجوال الثاني  " >
                                </div>
                            </div>

                             <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="order_number">رقم الطلب  </label>
                                    <input type="text" name="order_number" class="form-control" id="order_number"
                                        placeholder="أدخل رقم الطلب   ">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="date_registration"> تاريخ التسجيل  </label>
                                    <input type="date" name="date_registration" class="form-control"
                                        id="date_registration" placeholder=" ادخل تاريخ التسجيل ">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="price"> السعر  </label>
                                    <input type="text" name="price" class="form-control"
                                        id="price" placeholder="ادخل السعر    ">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="pay"> الدفعة  </label>
                                    <input type="text" name="pay" class="form-control"
                                        id="pay" placeholder="  ادخل الدفعة    ">
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="payment_method"> طريقة الدفع او السداد   </label>
                                    <select class="form-control" name="payment_method"
                                    id="payment_method" >
                                    <option value="كاش">كاش</option>
                                    <option value="دفع">دفع  </option>
                                </select>
                            </div>
                            
                            <div class="form-group col-md-4">
                                <label for="date_week"> تاريخ الاسبوع   </label>
                                <input type="week" name="date_week" class="form-control"
                                    id="date_week" placeholder="  ادخل تاريخ الاسبوع     ">
                            </div>


                                <div class="form-group col-md-4">
                                    <label for="group_id">  المجموعات  </label>
                                        <select class="form-control" name="group_id"
                                            id="group_id" >
                                            @foreach ($groups as $group )

                                            <option value="{{ $group->id }}">{{ $group->group_name}}</option>
                                            @endforeach


                                        </select>
                                </div>
                            </div> 


                                <div class="form-group col-md-12">
                                    <label for="notes"> الموضوع </label>
                                    <textarea  name="notes" class="w-100 form-control" id="notes" rows="4" placeholder="الموضوع ..."></textarea>
                                </div>
                            </div>



                            <br>
                            <!-- /.card-body -->


                        <div class="card-footer">
                            <button type="button" onclick="performStore()" class="btn btn-lg btn-success">حفظ</button>
                            <a href="{{route('financial_payments.index')}}"><button type="button" class="btn btn-lg btn-primary">قائمة الدفع المالية </button></a>
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

 


    function performStore() {
        let formData = new FormData();
            formData.append('name',document.getElementById('name').value);
            formData.append('mobile2',document.getElementById('mobile2').value);
            formData.append('mobile1',document.getElementById('mobile1').value);
            formData.append('order_number',document.getElementById('order_number').value);
            formData.append('date_registration',document.getElementById('date_registration').value);
            formData.append('price',document.getElementById('price').value);
            formData.append('pay',document.getElementById('pay').value);
            formData.append('payment_method',document.getElementById('payment_method').value);
            formData.append('date_week',document.getElementById('date_week').value);
            formData.append('group_id',document.getElementById('group_id').value);
            formData.append('notes',document.getElementById('notes').value);
        store('/cms/admin/financial_payments',formData);
    }

</script>





@endsection
