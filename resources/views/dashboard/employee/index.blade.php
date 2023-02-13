@extends('dashboard.parent')
@section('title','الموظفين ')
@section('left-title','عرض الموظفين ')

@section('active title','عرض الموظفين ')

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
              {{-- <h3 class="card-title"> عرض بيانات الموظفين </h3> --}}
              <div class="card-tools">
                <form action="" method="get" >
                    <div class="row">
                        {{-- <div class="input-icon col-md-2">
                            <input type="text" class="form-control" placeholder="بحث باستخدام الإيميل "
                               name='email' @if( request()->email) value={{request()->email}} @endif/>
                              <span>
                                  <i class="flaticon2-search-1 text-muted"></i>
                              </span>
                            </div> --}}

                            {{-- <div class="input-icon col-md-2">
                            <input type="text" class="form-control" placeholder="بحث باستخدام الاسم"
                               name='first_name' @if( request()->first_name) value={{request()->first_name}} @endif/>
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

                    <div >
                          {{-- <button class="btn btn-success btn-md" type="submit">فلتر البحث</button> --}}
                          {{-- <a href="{{route('employees.index')}}"  class="btn btn-danger">إنهاء البحث</a> --}}
                          @can('Create-Employee')
                              
                          <a href="{{route('employees.create')}}"><button type="button" class="btn  btn-primary">انشاء موظف جديدة </button></a>
                          @endcan
                        </div>

                  </div>
            </form>
              </div>
              <br>
            </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
              <thead>
                <tr class="bg-info">
                  <th> رقم الموظف </th>
                  <th>  اسم الموظف  </th>
                  <th>  الأيميل </th>
                  <th>   الصورة الشخصية </th>
                  <th>   رقم الجوال </th>

                  <th> الاعدادات </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($employees as $employee )
                <tr>
                  <td>{{$employee->id}}</td>
                  {{-- <td>{{$employee->who}}</td> --}}
                  {{-- <td>
                    <img class="img-circle img-bordered-sm" src="{{asset('images/employee_who/'.$employee->image_who)}}" width="60" height="60" alt="User Image">
                  </td> --}}
                  <td>{{$employee->user ? $employee->user->first_name .' '.  $employee->user->last_name : "Not Value"}}</td>
                  {{-- <td>{{$employee->user ? $employee->user->last_name : "Not Value"}}</td> --}}
                  <td>{{$employee->email}}</td>
                  {{-- <td>{{$employee->image}}</td> --}}
                  <td>
                    <img class="img-circle img-bordered-sm" src="{{asset('/images/employee/'.$employee->image)}}" width="60" height="60" alt="User Image">
                  </td>
                  <td>{{$employee->user ? $employee->user->mobile : "Not Value"}}</td>
                  {{-- $admin->user ? $admin->user->mobile : 'NULL'  --}}
                  <td>
                    <div class="btn">
                        {{-- @can('Edit-Employee')   
                        <a href="{{route('employees.edit',$employee->id)}}" class="btn btn-info" title="Edit">
                          تعديل
                          </a>
                        @endcan --}}
                        @can('Delete-Employee')
                            
                        <a href="#" onclick="performDestroy({{$employee->id}}, this)" class="btn btn-danger" title="Delete">
                          حذف
                        </a>
                        @endcan
                        @can('Show-Employee')
                        <a href="{{route('employees.show',$employee->id)}}" class="btn btn-success" title="Show">
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

                {{ $employees->links() }}

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
    let url = '/cms/admin/employees/'+id;
    confirmDestroy(url, reference);
  }
 </script>
@endsection


