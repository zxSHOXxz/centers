@extends('dashboard.parent')

@section('title','الطلاب ')

@section('left-title','عرض الطلاب ')

@section('active title','عرض الطلاب ')


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
            {{-- <h3 class="card-title"> عرض الطلاب </h3> --}}

            <div class="card-tools">
            </div>
            <form action="" method="get" >
                <div class="row">
                    <div class="input-icon col-md-2">
                        <input type="text" class="form-control" placeholder="بحث باستخدام الاسم"
                           name='name_ar' @if( request()->name_ar) value={{request()->name_ar}} @endif/>
                          <span>
                              <i class="flaticon2-search-1 text-muted"></i>
                          </span>
                        </div>

                        <div class="form-group col-md-2">
                        <input type="text" class="form-control" placeholder="البحث باستخدام الحالة "
                           name='status' @if( request()->status) value={{request()->status}} @endif/>
                           <span>
                              <i class="flaticon2-search-1 text-muted"></i>
                          </span>
                    </div>

                        <button class="btn btn-success btn-md" type="submit">فلتر البحث</button>
                      <a href="{{route('applies.index')}}"  class="btn btn-danger">إنهاء البحث</a>

                    </div>
                    <br>
                    <hr>
                    <br>
                <div class="col-md-5 col-4">
                      <a href="{{route('applies.create')}}"><button type="button" class="btn  btn-primary">انشاء طلب جديد </button></a>

                    </div>

        </form>
            <br>
        </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
              <thead>
                <tr class="bg-info">
                  <th>  اسم المشرف  </th>
                  <th>  اسم الطالب  </th>
                  <th>  التخصص  </th>
                  <th>  العنوان  </th>
                  <th>  رقم الجوال   </th>
                  <th>  اسم الموضوع </th>
                  <th>   الموضوع </th>
                  <th> الاعدادات </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($applies as $apply )
                <tr>
                    <td><span class="badge bg-success" >{{$apply->employee->user->first_name }}</span></td>
                    <td>{{$apply->name_ar }}</td>
                  <td>{{$apply->spciality }}</td>
                  <td>{{$apply->address}}</td>
                  <td>{{$apply->mobile1}}</td>
                  <td>{{$apply->name_topic}}</td>
                  <td>{{$apply->topic}}</td>

                  <td>
                    <div class="btn">
                        <button type="button" class="btn btn-primary  dropdown-toggle" data-toggle="dropdown">الإعدادات</button>
                        <div class="dropdown-menu" role="menu">
                          @can('Edit-Admin')
                          <a class="dropdown-item" href="{{route('applies.edit',$apply->id)}}"><i class="far fa-edit ml-2"></i>تعديل</a>
                          <a class="dropdown-item" href="{{route('applies.show',$apply->id)}}"><i class=" fas fa-info ml-2"></i>تفاصيل الطالب</a>
                          <a class="dropdown-item" href="{{route('conditions.index',$student->id)}}"><i class="fas fa-eye ml-2"></i>عرض بيان الطالب</a>

                          @endcan
                          @can('Delete-Admin')
                          <a class="dropdown-item"  onclick="performDestroy({{ $apply->id }},this)" href="#"><i class="fas fa-trash-alt ml-2"></i>حذف</a>
                          @endcan
                        </div>
                      </div>

                  </td>
                </tr>
                @endforeach
              </tbody
            </div>

            </table>

            <div class="span text-center" style="margin-top: 20px; margin-bottom:10px">
            </span>
        </div>
        <!-- /.card-body -->

    </div>
    <!-- /.card -->
</div>
{{ $applies->links() }}
</div>
  </div>
</section>

@endsection

@section('scripts')

 <script>
  function performDestroy(id, reference){
    let url = '/cms/admin/applies/'+id;
   confirmDestroy(url, reference);
  }
 </script>
@endsection


