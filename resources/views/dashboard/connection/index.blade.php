@extends('dashboard.parent')
@section('title','الاتصالات   ')

@section('left-title','عرض الاتصالات ')

@section('active title','عرض الاتصالات ')

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
                          <input type="text" class="form-control" placeholder="Search By Title"
                             name='name' @if( request()->name) value={{request()->name}} @endif/>
                            <span>
                                <i class="flaticon2-search-1 text-muted"></i>
                            </span>
                          </div>

                          <div class="input-icon col-md-2">
                          <input type="text" class="form-control" placeholder=" Street Search"
                             name='mobile' @if( request()->status) value={{request()->status}} @endif/>
                            <span>
                                <i class="flaticon2-search-1 text-muted"></i>
                            </span>
                          </div>

                          <div class="input-icon col-md-2">
                          <input type="date" class="form-control" placeholder="Search By Date"
                             name='created_at' @if( request()->created_at) value={{request()->created_at}} @endif/>
                            <span>
                                <i class="flaticon2-search-1 text-muted"></i>
                            </span>
                          </div>

                  <div class="col-md-4">
                        <button class="btn btn-success btn-md" type="submit">فلتر البحث</button>
                        <a href="{{route('cities.index')}}"  class="btn btn-danger">إنهاء البحث</a>
                        <a href="{{route('cities.create')}}"><button type="button" class="btn btn-md btn-primary">اضافة اتصال </button></a>
                    </div>
                    <a href="{{route('connection-exports-excel')}}"><button type="button" class="btn btn-md btn-primary"> تصدير اكسل </button></a>

                       </div>
              </form>
              <div class="card-tools">
                  {{-- <a href="{{route('connections.create')}}"><button type="button" class="btn btn-lg btn-primary">انشاء اتصال جديد </button></a> --}}
                </div>
              <br>
            </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
              <thead>
                <tr class="bg-info">
                  <th> رقم الاتصال  </th>
                  <th>  الاسم</th>
                  <th>  الحالة  </th>
                  <th>  الجوال </th>

                  <th> الاعدادات </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($connections as $connection )
                <tr>
                  <td>{{$connection->id}}</td>
                  <td>{{$connection->name }}</td>
                  <td>{{$connection->status}}</td>
                  <td>{{$connection->mobile}}</td>

                  <td>
                    <div class="btn-group">
                        @can('Edit-Connection')
                            
                        <a href="{{route('connections.edit',$connection->id)}}" class="btn btn-info" title="Edit">
                          تعديل
                          </a>
                        @endcan
                        @can('Delete-Connection')
                        <a href="#" onclick="performDestroy({{$connection->id}}, this)" class="btn btn-danger" title="Delete">
                          حذف
                        </a>
                        @endcan
                      @can('Show-Connection')
                      <a href="{{route('connections.show',$connection->id)}}" class="btn btn-success" title="Show">
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
            </span>

        </div>
        <!-- /.card-body -->

    </div>
    <!-- /.card -->
</div>
{{ $connections->links() }}
</div>
  </div>
</section>

@endsection

@section('scripts')

 <script>
  function performDestroy(id, reference){
    let url = '/cms/admin/connections/'+id;
   confirmDestroy(url, reference);
  }
 </script>
@endsection


