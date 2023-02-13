@extends('dashboard.parent')
@section('title','المجموعات ')

@section('left-title','عرض المجموعات ')

@section('active title','عرض المجموعات ')

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
            <h3 class="card-title"> عرض المجموعات </h3>
            <div class="card-tools">
                <form action="" method="get" >
                    <div class="row">
                        <div class="input-icon col-md-2">
                            <input type="text" class="form-control" placeholder="search group name "
                               name='group_name' @if( request()->group_name) value={{request()->group_name}} @endif/>
                              <span>
                                  <i class="flaticon2-search-1 text-muted"></i>
                              </span>
                            </div>

                            <div class="input-icon col-md-2">
                            <input type="text" class="form-control" placeholder="search group number"
                               name='group_number' @if( request()->group_number) value={{request()->group_number}} @endif/>
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

                    <div class="btn">
                          <button class="btn btn-success btn-md" type="submit">فلتر البحث</button>
                          <a href="{{route('groups.index')}}"  class="btn btn-danger">إنهاء البحث</a>
                          @can('Create-Group')   
                          <a href="{{route('groups.create')}}"><button type="button" class="btn  btn-primary">انشاء مجموعة جديدة </button></a>
                          @endcan
                          <a href="{{route('group-exports-excel')}}"><button type="button" class="btn  btn-success">تصدير إكسيل </button></a>

                        </div>



                  </div>
            </form>
                {{-- <a href="{{ route('createGroup' , $id) }}" class="btn btn-success" style="color: white;"> إضافة مجمعة جديدة </a> --}}

              </div>
              <br>
            </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
              <thead>
                <tr class="bg-info">
                  <th> رقم المجموعة </th>
                  <th>  اسم المجموعة </th>
                  <th>  عدد الطلاب </th>
                  {{-- <th>  عدد المدربين </th> --}}
                  <th>  موعد بداية المحاضرة </th>
                  <th>  موعد نهاية المحاضرة </th>
                  <th>  أيام دوام المجموعة </th>

                  <th> الاعدادات </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($groups as $group )
                <tr>
                  <td>{{$group->id}}</td>
                  <td>{{$group->group_name.' '. $group->group_number }}</td>
                  {{-- <td><span class="badge bg-green"> {{$group->students_count}}  طلاب</td> --}}
                    <td><a href="{{route('indexStudents',['id'=>$group->id])}}"
                        class="btn btn-info">({{$group->students_count}})
                       طلاب</a> </td>
                  {{-- <td><a href="{{route('showTrainersGroup',['id'=>$group->id])}}"
                        class="btn btn-info">
                        ({{$group->trainers_count}})
                        المدربين</a> </td> --}}

                  <td>{{$group->room->from}}</td>
                  <td>{{$group->room->to}}</td>
                  <td>{{$group->dayes}}</td>

                  <td>
                    <div class="btn-course">
                      <a href="{{route('groups.edit',$group->id)}}" class="btn btn-info" title="Edit">
                        تعديل
                        </a>

                      <a href="#" onclick="performDestroy({{$group->id}}, this)" class="btn btn-danger" title="Delete">
                        حذف
                      </a>
                      {{-- <a href="{{route('groups.show',$group->id)}}" class="btn btn-success" title="Show">
                        معلومات
                        </a> --}}
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
          <br>
          <br>

          {{  $groups->links() }}

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
    let url = '/cms/admin/groups/'+id;
    confirmDestroy(url, reference);
  }
 </script>
@endsection


