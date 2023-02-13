@extends('dashboard.parent')
@section('title','الدفع ')

@section('sub-title','عرض الدفع ')

@section('active title','عرض الدفع ')

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
                  <a href="{{route('createPayment',$id)}}"><button type="button" class="btn btn-lg btn-primary">اضافة دفعة   </button></a>
                  <div class="card-header">
                      <div class="card-tools">
                          <br>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
              <thead>
                <tr class="bg-info">
                  <th> #  </th>
                  <th> رقم الدفعة </th>
                  <th>  الدفعة</th>
                  <th> الاعدادات </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($payments as $payment )
                <tr>
                  <td>{{$payment->id}}</td>
                  
                  <td>{{$payment->pay_nubmer}}</td>
                  <td>{{$payment->pay}}</td>
                  

                  <td>
                    <div class="btn-group">
                      {{-- @can('Edit-City') --}}
                      <a href="{{route('payments.edit',$payment->id)}}" class="btn btn-info" title="Edit">
                        تعديل
                        </a>
                      {{-- @endcan --}}
                      {{-- @can('Delete-City') --}}
                      <a href="#" onclick="performDestroy({{$payment->id}}, this)" class="btn btn-danger" title="Delete">
                        حذف
                      </a>
                      {{-- @endcan --}}

                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="span text-center" style="margin-top: 20px; margin-bottom:10px">

                {{ $payments->links() }}

            </span>

          </div>
          <!-- /.card-body -->

        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>

</section>

@endsection

@section('scripts')

 <script>
  function performDestroy(id, reference){
    let url = '/cms/admin/payments/'+id;
    confirmDestroy(url, reference);
  }
 </script>
@endsection


