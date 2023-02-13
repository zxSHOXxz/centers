@extends('dashboard.parent')
@section('title','المشرفين ')

@section('sub-title','عرض المشرفين ')

@section('active title','عرض المشرفين ')

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
            <form action="" method="get" style="margin-bottom:2%;">
                <div class="row">
                    <div class="input-icon col-md-2">
                        <input type="text" class="form-control" placeholder="بحث باستخدام الايميل"
                           name='email' @if( request()->email) value={{request()->email}} @endif/>
                          <span>
                              <i class="flaticon2-search-1 text-muted"></i>
                          </span>
                        </div>

                        {{-- <div class="input-icon col-md-2">
                        <input type="text" class="form-control" placeholder="بحث باستخدام الاسم"
                           name='name' @if( request()->name) value={{request()->name}} @endif/>
                          <span>
                              <i class="flaticon2-search-1 text-muted"></i>
                          </span>
                        </div> --}}

                        {{-- <div class="input-icon col-md-2">
                        <input type="date" class="form-control" placeholder="بحث باستخدام تاريخ الاضافة"
                           name='created_at' @if( request()->created_at) value={{request()->created_at}} @endif/>
                          <span>
                              <i class="flaticon2-search-1 text-muted"></i>
                          </span>
                        </div> --}}

                <div class="col-md-4">
                      {{-- <button class="btn btn-success btn-md" type="submit">فلتر البحث</button>
                      <a href="{{route('admins.index')}}"  class="btn btn-danger">إنهاء البحث</a> --}}
                      @can('Create-Admin')
                      <a href="{{route('admins.create')}}"><button type="button" class="btn btn-md btn-primary">إنشاء أدمن</button></a>
                      @endcan
                      <a href="{{route('indexDelete')}}"><button type="button" class="btn btn-md btn-danger">سلة المحذوفات</button></a>
                </div>



              </div>
        </form>


          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
              <thead>
                <tr class="bg-info">
                  {{-- <th> رقم المشرف </th> --}}
                  <th>  اسم المشرف  </th>
                  {{-- <th>   اسم المشرف الأخير </th> --}}
                  <th>  تاريخ الميلاد </th>
                  <th>  الأيميل </th>
                  <th>   الصورة الشخصية </th>
                  <th>   رقم الجوال </th>

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
                  <td>{{$admin->user ? $admin->user->date_of_birth : "Null"}}</td>
                  <td>{{$admin->email}}</td>
                  <td>  <img class="img-circle img-bordered-sm" src="{{asset('storage/images/admin/'.$admin->image)}}" width="60" height="60" alt="User Image"> </td>
                  <td>{{$admin->user ? $admin->user->mobile : "Null"}}</td>

                  <td>
                    <div class="btn">
                      {{-- <a href="{{route('admins.edit',$admin->id)}}" class="btn btn-info" title="Edit">
                        تعديل
                        </a> --}}
                      @can('Delete-Admin')    
                      <a href="#" onclick="performDestroy({{$admin->id}}, this)" class="btn btn-danger" title="Delete">
                        حذف
                      </a>
                      @endcan
                      @can('Show-Admin')
                       <a href="{{route('admins.show',$admin->id)}}" class="btn btn-success" title="Show">
                        معلومات
                      </a>   
                      @endcan

                      
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="span text-center" style="margin-top: 20px; margin-bottom:10px">

                {{ $admins->links() }}

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
    let url = '/cms/admin/admins/'+id;
    confirmDestroy(url, reference);
  }
 </script>
@endsection


