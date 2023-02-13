@extends('dashboard.parent')
@section('title','المدربين ')

@section('left-title','عرض المدربين ')

@section('active title','عرض المدربين ')

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
            {{-- <h3 class="card-title"> عرض المدربين </h3> --}}
            <div class="card-tools">
                <form action="" method="get" >
                    <div class="row">
                        <div class="input-icon col-md-3">
                            <input type="text" class="form-control" placeholder="بحث باستخدام الايميل "
                               name='email' @if( request()->email) value={{request()->email}} @endif/>
                              <span>
                                  <i class="flaticon2-search-1 text-muted"></i>
                              </span>
                            </div>

                            <div class="input-icon col-md-3">
                            <input type="text" class="form-control" placeholder="بحث باستخدم الاسم"
                               name='first_name' @if( request()->first_name) value={{request()->first_name}} @endif/>
                              <span>
                                  <i class="flaticon2-search-1 text-muted"></i>
                              </span>
                            </div>

                            <div class="input-icon col-md-3">
                            <input type="date" class="form-control" placeholder="بحث باستخدام تاريخ الاضافة"
                               name='created_at' @if( request()->created_at) value={{request()->created_at}} @endif/>
                              <span>
                                  <i class="flaticon2-search-1 text-muted"></i>
                              </span>
                            </div>
                            <div class="btn-ungroup">

                            <button class="btn btn-success btn-md" type="submit">فلتر البحث</button>

                            @can('Index-Trainer')
                                
                            <a href="{{route('trainers.index')}}"  class="btn btn-danger">إنهاء البحث</a>
                            @endcan
                            </div>
                          </div>
                          {{-- <br> --}}
                          <hr>
                          {{-- <br> --}}

                    <div class="btn">
                          <a href="{{route('trainer-exports-excel')}}"><button type="button" class="btn  btn-success">تصدير إكسيل </button></a>
                        @can('Create-Trainer')
                            
                        <a href="{{route('trainers.create')}}"><button type="button" class="btn  btn-primary">انشاء مدرب جديدة </button></a>
                        @endcan

                        </div>



                  </div>
            </form>
                {{-- <a href="{{route('trainers.create')}}"><button type="button" class="btn btn-lg btn-primary">انشاء مدرب جديد </button></a> --}}
              </div>
              <br>
            </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
              <thead>
                <tr class="bg-info">
                  <th> رقم المشرف </th>
                  <th>  اسم المشرف الأول </th>
                  <th>  تاريخ الميلاد </th>
                  <th>  المدينة  </th>
                  <th>  الأيميل </th>
                  <th>   التقيمات</th>
                  <th>   رقم الجوال </th>

                  <th> الاعدادات </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($trainers as $trainer )
                <tr>
                  <td>{{$trainer->id}}</td>
                  {{-- <td>{{$trainer->who}}</td> --}}
                  {{-- <td>
                    <img class="img-circle img-bordered-sm" src="{{asset('images/admin_who/'.$trainer->image_who)}}" width="60" height="60" alt="User Image">
                  </td> --}}
                  <td>{{$trainer->user ? $trainer->user->first_name:'not value'}}</td>
                  <td>{{$trainer->user ? $trainer->user->date_of_birth:'not value'}}</td>
                  <td>{{$trainer->user ? $trainer->user->city_id:'not value'}}</td>
                  <td>{{$trainer->email}}</td>
                  <td>
                    
                    {{-- <a href="{{route('indexTrainer',['id'=>$trainer->id])}}"
                        class="btn btn-success">({{ $trainer->trainer_evaluations_count }})
                        التقيم</a>
                  </td> --}}
                  <td>{{$trainer->user ? $trainer->user->mobile:'not value'}}</td>

                  <td>
                    <div class="btn">
                        @can('Edit-Trainer')
                            
                        {{-- <a href="{{route('trainers.edit',$trainer->id)}}" class="btn btn-info" title="Edit">
                          تعديل
                          </a> --}}
                        @endcan
                        @can("Delete-Trainer")
                        <a href="#" onclick="performDestroy({{$trainer->id}}, this)" class="btn btn-danger" title="Delete">
                          حذف
                        </a>
                        @endcan
                        @can('Show-Trainer')
                            
                        <a href="{{route('trainers.show',$trainer->id)}}" class="btn btn-success" title="Show">
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
            {{ $trainers->links() }}
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
    let url = '/cms/admin/trainers/'+id;
   confirmDestroy(url, reference);
  }
 </script>
@endsection


