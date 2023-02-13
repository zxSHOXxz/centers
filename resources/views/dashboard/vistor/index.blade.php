@extends('dashboard.parent')
@section('title','الزائرين  ')

@section('left-title','عرض الزائرين ')

@section('active title','عرض الزائرين ')

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
            <h3 class="card-title"> عرض الزائرين </h3>
            <div class="card-tools">
                <form action="" method="get" >
                    <div class="row">
                        <div class="input-icon col-md-2">
                            <input type="text" class="form-control" placeholder="search Name "
                               name='vistor_name' @if( request()->vistor_name) value={{request()->vistor_name}} @endif/>
                              <span>
                                  <i class="flaticon2-search-1 text-muted"></i>
                              </span>
                            </div>

                            <div class="input-icon col-md-2">
                            <input type="text" class="form-control" placeholder="search mobile"
                               name='mobile' @if( request()->mobile) value={{request()->mobile}} @endif/>
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

                    <div class="col-md-5 col-4">
                          <button class="btn btn-success btn-md" type="submit">فلتر البحث</button>
                          <a href="{{route('vistors.index')}}"  class="btn btn-danger">إنهاء البحث</a>
                          @can('Create-Vistor')

                          <a href="{{route('vistors.create')}}"><button type="button" class="btn  btn-primary">اضافة زائر جديد </button></a>
                          @endcan
                          <a href="{{route('Vistor-exports-excel')}}"><button type="button" class="btn  btn-primary">  تصدير أكسل </button></a>
                        </div>



                  </div>
            </form>
                {{-- <a href="{{route('vistors.create')}}"><button type="button" class="btn btn-lg btn-primary">انشاء زائر جديد </button></a> --}}
              </div>
              <br>
            </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
              <thead>
                <tr class="bg-info">
                  <th> رقم الزائر </th>
                  <th>  اسم الزائر  </th>
                  <th>  الحالة  </th>
                  <th>   رقم الجوال </th>
                  <th>   الزيارات   </th>

                  <th> الاعدادات </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($vistors as $vistor )
                <tr>
                  <td>{{$vistor->id}}</td>
                  <td>{{$vistor->vistor_name }}</td>
                  <td>{{$vistor->status}}</td>
                  <td>{{$vistor->mobile}}</td>
                  <td><a href="{{route('indexTheVisit',['id'=>$vistor->id])}}"
                    class="btn btn-info">({{$vistor->the_visit_count}})
                   الزيارات</a> </td>

                  <td>
                    <div class="btn-group">
                        @can('Edit-Vistor')

                        <a href="{{route('vistors.edit',$vistor->id)}}" class="btn btn-info" title="Edit">
                          تعديل
                          </a>
                        @endcan
                        @can('Delete-Vistor')

                        <a href="#" onclick="performDestroy({{$vistor->id}}, this)" class="btn btn-danger" title="Delete">
                          حذف
                        </a>
                        @endcan
                        @can('Show-Vistor')

                        <a href="{{route('vistors.show',$vistor->id)}}" class="btn btn-success" title="Show">
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
{{ $vistors->links() }}
</div>
  </div>
</section>

@endsection

@section('scripts')

 <script>
  function performDestroy(id, reference){
    let url = '/cms/admin/vistors/'+id;
   confirmDestroy(url, reference);
  }
 </script>
@endsection


