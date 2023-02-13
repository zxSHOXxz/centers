@extends('dashboard.parent')
@section('title','سلة المحذوفات  ')


@section('sub-title','سلة المحذوفات')

@section('active title',' سلة المحذوفات')

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



          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
              <thead>
                <tr class="bg-info">
                  {{-- <th> رقم المشرف </th> --}}
                  <th>  اسم المشرف  </th>
                  {{-- <th>   اسم المشرف الأخير </th> --}}

                  <th>  الأيميل </th>
                  <th>   الصورة الشخصية </th>

                  <th> الاعدادات </th>
                    {{-- <td>
                  <td>{{$admin->user ? $admin->user->first_name . ' '.  $admin->user->last_name : "Null"}}</td>
                  </td> --}}
                </tr>
              </thead>
              <tbody>
                @foreach ($admins as $admin )
                <tr>
                  {{-- <td>{{$admin->id}}</td> --}}

                  <td>{{$admin->user ? $admin->user->first_name . ' ' . $admin->user->last_name : "Null"}}</td>
                  {{-- <td>{{$admin->user ? $admin->user->last_name : "Null"}}</td> --}}
                  <td>{{$admin->email}}</td>
                  <td>  <img class="img-circle img-bordered-sm" src="{{asset('storage/images/admin/'.$admin->image)}}" width="60" height="60" alt="User Image"> </td>

                  <td>
                    <div class="btn">
                      {{-- <a href="{{route('admins.edit',$admin->id)}}" class="btn btn-info" title="Edit">
                        تعديل
                        </a> --}}

                      <a href="#" onclick="performDestroy({{$admin->id}}, this)" class="btn btn-danger" title="Delete">
                        حذف
                      </a>

                      {{-- <a href="{{route('forceDelete',$admin->id)}}" class="btn btn-danger" title="Show">
                        حذف
                      </a> --}}
                      <a href="{{route('restore',$admin->id)}}" class="btn btn-success" title="Show">
                        استرداد
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="span text-center" style="margin-top: 20px; margin-bottom:10px">



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
    let url = '/cms/admin/forceDelete/'+id;
    confirmDestroy(url, reference);
  }
 </script>
@endsection


