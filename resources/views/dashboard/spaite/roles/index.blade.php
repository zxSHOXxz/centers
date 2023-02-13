@extends('dashboard.parent')
@section('title','الأدوار ')


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
            <h3 class="card-title"> عرض الأدوار </h3>
            <div class="card-tools">
                <a href="{{route('roles.create')}}"><button type="button" class="btn btn-lg btn-primary">انشاء دور جديد </button></a>
              </div>
              <br>
            </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
              <thead>
                <tr class="bg-info">
                  <th> رقم الدور </th>
                  <th>  الاسم الوظيفي </th>
                  <th>   الصلاحيات </th>

                  <th>   النوع الوظيفي  </th>

                  <th> الاعدادات </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($roles as $role )
                <tr>
                  <td>{{$role->id}}</td>
                  <td>{{$role->name}}</td>
                  <td>
                    <a href="{{ route('role.permissions.index' , $role->id)}}"
                      class="btn btn-primary"> الصلاحيات ({{ $role->permissions_count }}) 
                    </a>
                  </td>
                  <td><span class="badge bg-primary" >{{$role->guard_name}}</span></td>
                  <td>
                    <div class="btn-group">
                      <a href="{{route('roles.edit',$role->id)}}" class="btn btn-info" title="Edit">
                        تعديل
                        </a>

                      <a href="#" onclick="performDestroy({{$role->id}}, this)" class="btn btn-danger" title="Delete">
                        حذف
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="span text-center" style="margin-top: 20px; margin-bottom:10px">
            {{-- {{ $roles->links() }} --}}
        </span>

          </div>
          <!-- /.card-body -->
          {{ $roles->links() }}
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
    let url = '/cms/admin/roles/'+id;
    confirmDestroy(url, reference);
  }
 </script>
@endsection


