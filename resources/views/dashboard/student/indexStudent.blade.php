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
                <form action="" method="get" >
                    <div class="row">

                            {{-- <div class="input-icon col-md-2">
                                <input type="text" class="form-control" placeholder=" 1-2-3-4 رقم المجموعة"
                                   name='group_id' @if( request()->group_id) value={{request()->group_id}}  @endif/>
                                  <span>
                                      <i class="flaticon2-search-1 text-muted"></i>
                                  </span>
                                </div> --}}


                            {{-- <button class="btn btn-success btn-md" type="submit">فلتر البحث</button> --}}
                          {{-- <a href="{{route('students.index')}}"  class="btn btn-danger">إنهاء البحث</a> --}}

                        </div>
                        {{-- <br>
                        <hr>
                        <br> --}}
                    <div class="col-md-5 col-4">

                          {{-- <a href="{{route('students.create')}}"><button type="button" class="btn  btn-primary">انشاء طالب جديد </button></a> --}}
                          {{-- <a href="{{route('student-exports-excel')}}"><button type="button" class="btn btn-success">تصدير إكسيل </button></a> --}}

                        </div>

            </form>
                {{-- <a href="{{route('students.create')}}"><button type="button" class="btn btn-lg btn-primary">انشاء طالب جديد </button></a> --}}
              </div>
              <br>
            </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
              <thead>
                <tr class="bg-info">
                  <th> رقم الطالب </th>
                  <th>  اسم الطالب  </th>
                  <th>  تاريخ الميلاد </th>
                  <th>  الحالة  </th>
                  <th>  اسم المجموعة  </th>

                  <th>  الأيميل </th>
                  @can('Index-StudentEvaluation')
                  <th>   التقيم </th>
                  @endcan
                  <th>   رقم الجوال </th>
                  @can('Index-Condition')
                  <th>   أحوال الطلاب </th>
                  @endcan

                  <th> الاعدادات </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($students as $student )
                <tr>
                  <td>{{$student->id}}</td>
                 
                  <td>{{$student->name_ar }}</td>
                  <td>{{$student->date_of_birth }}</td>
                  <td><span class="badge bg-green">{{$student->status}}</td>
                  <td><span class="badge bg-yellow"> {{$student->group->group_name}}</td>
                  <td>{{$student->email}}</td>
                  @can('Index-StudentEvaluation')
                      
                  <td>
                    <a href="{{route('indexStudent',['id'=>$student->id])}}"
                        class="btn btn-success">({{ $student->student_evaluations_count }})
                        التقيم</a>
                  </td>
                  @endcan
                  <td>{{$student->mobile1}}</td>
                  @can('Index-Condition')
                      
                  <td><a href="{{route('indexCondition',['id'=>$student->id])}}"
                    class="btn btn-info">({{$student->condition_count}})
                  حالة بيان الطالب</a> </td>
                  @endcan


                  <td>
                    <div class="btn">
                        <button type="button" class="btn btn-primary  dropdown-toggle" data-toggle="dropdown">الإعدادات</button>
                        <div class="dropdown-menu" role="menu">
                          {{-- @can('Edit-Admin') --}}
                          <a class="dropdown-item" href="{{route('students.edit',$student->id)}}"><i class="far fa-edit ml-2"></i>تعديل</a>
                          <a class="dropdown-item" href="{{route('students.show',$student->id)}}"><i class=" fas fa-info ml-2"></i>تفاصيل الطالب</a>
                          {{-- <a class="dropdown-item" href="{{route('conditions.index',$student->id)}}"><i class="fas fa-eye ml-2"></i>عرض بيان الطالب</a> --}}

                          {{-- @endcan --}}
                          {{-- @can('Delete-Admin') --}}
                          <a class="dropdown-item"  onclick="performDestroy({{ $student->id }},this)" href="#"><i class="fas fa-trash-alt ml-2"></i>حذف</a>
                          {{-- @endcan --}}
                        </div>
                      </div>
                    {{-- <div class="btn">
                      <a href="{{route('students.edit',$student->id)}}" class="btn btn-info" title="Edit">
                        تعديل
                        </a>

                      <a href="#" onclick="performDestroy({{$student->id}}, this)" class="btn btn-danger" title="Delete">
                        حذف
                      </a>

                      <a href="{{route('students.show',$student->id)}}" class="btn btn-success" title="Show">
                        معلومات
                      </a>
                    </div> --}}
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
{{-- {{ $students->links() }} --}}
</div>
  </div>
</section>

@endsection

@section('scripts')

 <script>
  function performDestroy(id, reference){
    let url = '/cms/admin/students/'+id;
   confirmDestroy(url, reference);
  }
 </script>
@endsection


