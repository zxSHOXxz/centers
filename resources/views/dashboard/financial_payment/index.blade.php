@extends('dashboard.parent')

@section('title','الدفع المالية ')

@section('left-title','عرض الدفع المالية ')

@section('active title','عرض الدفع المالية ')


@section('styles')
  <style>

</style>
@endsection

@section('content')

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"> عرض الدفع المالية </h3>

            <div class="card-tools">
            </div>

            <a href="{{route('financial_payments.create')}}"><button type="button" class="btn  btn-primary">انشاء دفعة جديدة </button></a>
            <br>
        </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
              <thead>
                <tr class="bg-info">
                  <th>  الاسم    </th>
                  <th>  رقم الجوال   </th>
                  <th>  رقم الطلب  </th>
                  <th>  تاريخ التسجيل  </th>
                  <th>  السعر  </th>
                  <th>   الدفعة  </th>
                  <th>   طريقة الدفع  </th>
                  <th>    الدفع  </th>
                  <th>   المتبقية  </th>
                  <th> الاعدادات </th>
                </tr>
              </thead>
              <tbody>
                <?php
                        use App\Models\Payment;
                    ?>
                @foreach ($financials as $financial )
                    <?php
                        $payments=Payment::where('financial_payment_id',$financial->id)->get();

                        ?>
                <tr>
                  <td>{{$financial->name}}</td>
                  <td>{{$financial->mobile1 }}</td>
                  <td>{{$financial->order_number }}</td>
                  <td>{{$financial->date_registration}}</td>
                  <td>{{$financial->price}}</td>
                  <td>{{$financial->pay}}</td>
                  <td>{{$financial->payment_method}}</td>
                  <td><a href="{{route('indexPayment',['id'=>$financial->id])}}"
                    class="btn btn-info">({{$financial->payment_count}})
                    الدفع</a> </td>

                     
                     <td><span class="badge bg-success" >{{$financial->price - $financial->pay }}</span></td>
                     
                     

                  <td>
                    <div class="btn">
                        <button type="button" class="btn btn-primary  dropdown-toggle" data-toggle="dropdown">الإعدادات</button>
                        <div class="dropdown-menu" role="menu">
                          {{-- @can('Edit-Admin') --}}
                          <a class="dropdown-item" href="{{route('financial_payments.edit',$financial->id)}}"><i class="far fa-edit ml-2"></i>تعديل</a>
                          <a class="dropdown-item" href="{{route('financial_payments.show',$financial->id)}}"><i class=" fas fa-info ml-2"></i>تفاصيل الطالب</a>
                          {{-- <a class="dropdown-item" href="{{route('conditions.index',$student->id)}}"><i class="fas fa-eye ml-2"></i>عرض بيان الطالب</a> --}}

                          {{-- @endcan --}}
                          {{-- @can('Delete-Admin') --}}
                          <a class="dropdown-item"  onclick="performDestroy({{ $financial->id }},this)" href="#"><i class="fas fa-trash-alt ml-2"></i>حذف</a>
                          {{-- @endcan --}}
                        </div>
                      </div>

                  </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

            <div class="span text-center" style="margin-top: 20px; margin-bottom:10px">
            </span>
        </div>
        <!-- /.card-body -->

    </div>
    <!-- /.card -->
</div>
{{ $financials->links() }}
</div>
  </div>
</section>

@endsection

@section('scripts')

 <script>
  function performDestroy(id, reference){
    let url = '/cms/admin/financial_payments/'+id;
   confirmDestroy(url, reference);
  }
 </script>
@endsection


