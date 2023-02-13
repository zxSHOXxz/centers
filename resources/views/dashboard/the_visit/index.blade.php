@extends('dashboard.parent')
@section('title','الزيارات  ')

@section('sub-title','عرض الزيارات  ')

@section('active title','عرض الزيارات  ')

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
                      <a href="{{route('createTheVisit',$id)}}"><button type="button" class="btn btn-md btn-primary mb-3">اضافة زيارة  </button></a>

                      
                      <br>
                    <div class="card-tools">
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
              <thead>
                <tr class="bg-info">
                  <th> رقم الزيارة </th>
                  <th> الوصف</th>
                  <th> الاعدادات </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($visites as $visite )
                <tr>
                  <td>{{$visite->number_visit}}</td>
                  <td>{{$visite->description}}</td>

                  <td>
                    <div class="btn-group">
                      <a href="{{route('the_visits.edit',$visite->id)}}" class="btn btn-info" title="Edit">
                        تعديل
                        </a>
                      
                      <a href="#" onclick="performDestroy({{$visite->id}}, this)" class="btn btn-danger" title="Delete">
                        حذف
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
    let url = '/cms/admin/the_visits/'+id;
    confirmDestroy(url, reference);
  }
 </script>
@endsection


