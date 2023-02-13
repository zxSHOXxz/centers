@extends('dashboard.parent')
@section('title','التقيمات  ')
@section('left-title','عرض التقييمات ')

@section('active title','عرض التقييمات ')


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
              <h3 class="card-title"> عرض التقيمات </h3>
              <div class="card-tools">

                <a href="{{route('createStudent',$id)}}"><button type="button" class="btn btn-primary">انشاء تقيم جديد </button></a>
              </div>
              <br>
            </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
              <thead>
                <tr class="bg-info">
                  <th>   اسم الطالب  </th>
                  <th> درجة الامتحان النصفي  </th>
                  <th>  درجة النشاط</th>
                  <th>  درجة المشاريع  </th>
                  <th>  درجة الامتحان النهائي  </th>
                  <th>  درجة المجموع </th>
                  <th>  الاعدادات   </th>

                </tr>
              </thead>
              <tbody>
                @foreach ($evalutions as $evalution )
                <tr>
                    <td>{{$evalution->student->name_ar}}</td>
                  <td>{{$evalution->mid_exam}}</td>
                  <td>{{$evalution->activity}}</td>
                  <td>{{$evalution->project}}</td>
                  <td>{{$evalution->fina_exam}}</td>
                  <td>{{$evalution->mid_exam + $evalution->activity +$evalution->project + $evalution->fina_exam }}</td>

                  <td>
                    <div class="btn-evalution">
                      <a href="{{route('student_evalutions.edit',$evalution->id)}}" class="btn btn-info" title="Edit">
                        تعديل
                        </a>

                      <a href="#" onclick="performDestroy({{$evalution->id}}, this)" class="btn btn-danger" title="Delete">
                        حذف
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="span text-center" style="margin-top: 20px; margin-bottom:10px">

            {{ $evalutions->links() }}

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
    let url = '/cms/admin/trainer_evalutions/'+id;
    confirmDestroy(url, reference);
  }
 </script>
@endsection


