@extends('dashboard.parent')
@section('title','الدبلومة ')

@section('left-title','عرض الدبلومات ')

@section('active title','عرض الدبلومات ')

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
                    <input type="text" class="form-control" placeholder="ابحث من خلال الاسم"
                       name='name' @if( request()->name) value={{request()->name}} @endif/>
                      <span>
                          <i class="flaticon2-search-1 text-muted"></i>
                      </span>
                    </div>

                    <div class="input-icon col-md-2">
                    <input type="text" class="form-control" placeholder=" ابحث من خلال تاريخ البدء"
                       name='start_date' @if( request()->start_date) value={{request()->start_date}} @endif/>
                      <span>
                          <i class="flaticon2-search-1 text-muted"></i>
                      </span>
                    </div>

                    <div class="input-icon col-md-2">
                    <input type="text" class="form-control" placeholder="ابحث من خلال تاريخ الانشاء "
                       name='created_at' @if( request()->created_at) value={{request()->created_at}} @endif/>
                      <span>
                          <i class="flaticon2-search-1 text-muted"></i>
                      </span>
                    </div>

              <div class="col-md-6">
                  <button class="btn btn-danger btn-md" type="submit">Filter</button>
                  {{-- <a href="{{ route('indexArticle' , $id) }}" class="btn btn-danger btn-md" type="submit">End Filter</a> --}}
                  {{-- <a href="{{ route('categories.index') }}" type="button"  class="btn btn-primary">Category</a> --}}
                  {{-- <a href="{{ route('createArticle' , $id) }}" class="btn btn-success" style="color: white;"> Add new Article </a> --}}
                  <a href="{{route('diplomas.index')}}" type="button" class="btn btn-info">إنهاء البحث </a>
                  @can('Create-Diploma')
                  <a href="{{ route('diplomas.create') }}" type="button"  class="btn btn-info">إنشاء دبلومة</a>
                  @endcan

              </div>



            </div>
              </form>
            {{-- <h3 class="card-title"> عرض الدبلومة </h3>
            <div class="card-tools">
                <a href="{{route('diplomas.create')}}"><button type="button" class="btn btn-lg btn-primary">انشاء دبلومة جديدة </button></a>
              </div>
              <br>
            </div> --}}

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
              <thead>
                <tr class="bg-info">
                  <th> رقم الدبلومة </th>
                  <th>  اسم الدبلومة </th>
                  <th>   الرسوم </th>
                  <th>  حالة الدبلومة </th>
                  <th> عدد المجموعات </th>

                  @can('Index-Course')
                  <th> المساقات </th>
                  @endcan
                  @can('Index-FileDiploma')

                  <th> الملفات </th>
                  @endcan
                  {{-- <th> المدربين </th> --}}
                  <th>  تاريخ البداية </th>
                  <th>  تاريخ النهاية </th>
                  <th> الاعدادات </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($diplomas as $diploma )
                <tr>
                  <td>{{$diploma->id}}</td>

                   <td>{{$diploma->name}}</td>
                  <td>{{$diploma->price}}</td>
                  <td>
                   @if ($diploma->status=='Active')
                        <span class="badge badge-primary">قيد التنفيذ</span>
                        @elseif ($diploma->status=='Ready')
                        <span class="badge badge-success">جاهزة للبدء</span>
                        @elseif ($diploma->status=='Finshed')
                        <span class="badge badge-danger">انتهت</span>
                   @endif
                    </td>

                  {{-- <td>{{$diploma->trannig_type}}</td> --}}
                  <td><span class="badge bg-info"> {{$diploma->groups_count}}</td>

                    @can('Index-Course')
                    <td><a href="{{route('indexCourse',['id'=>$diploma->id])}}"
                      class="btn btn-info">({{$diploma->courses_count}})
                      المساقات</a> </td>
                    @endcan

                    @can('Index-FileDiploma')

                    <td><a href="{{route('indexDFile',['id'=>$diploma->id])}}"
                      class="btn btn-info">({{$diploma->files_count}})
                      الملفات</a> </td>
                      @endcan

                    {{-- <td><a href="{{route('indexTrainer',['id'=>$diploma->id])}}"
                        class="btn btn-info">({{$diploma->traners_count}})
                        المدربين</a> </td> --}}
                  <td>{{$diploma->start_date}}</td>
                  <td>{{$diploma->end_date}}</td>

                  {{-- <td>
                    <div class="btn">
                      <a href="{{route('diplomas.edit',$diploma->id)}}" class="btn btn-info" title="Edit">
                        تعديل
                        </a>

                      <a href="#" onclick="performDestroy({{$diploma->id}}, this)" class="btn btn-danger" title="Delete">
                        حذف
                      </a>

                      <a href="{{route('diplomas.show',$diploma->id)}}" class="btn btn-success" title="Show">
                        معلومات
                      </a>

                      <a href="{{route('showGroup',$diploma->id)}}" class="btn btn-primary" title="Show">
                        المجموعات
                      </a>
                    </div>
                  </td> --}}


                  <td>
                    <div class="btn">
                        <button type="button" class="btn btn-primary  dropdown-toggle" data-toggle="dropdown">الإعدادات</button>
                        <div class="dropdown-menu" role="menu">
                          @can('Edit-Admin')
                          <a class="dropdown-item" href="{{route('diplomas.edit',$diploma->id)}}"><i class="far fa-edit ml-2"></i>تعديل</a>
                          @endcan
                          @can('Show-Diploma')
                          <a class="dropdown-item" href="{{route('diplomas.show',$diploma->id)}}"><i class=" fas fa-info ml-2"></i>تفاصيل الدبلومة</a>
                          @endcan
                          @can('')

                          @endcan
                          <a class="dropdown-item" href="{{route('showGroup',$diploma->id)}}"><i class="fas fa-eye ml-2"></i>عرض المجموعات</a>
                          <a class="dropdown-item" href="{{route('showTrainers',$diploma->id)}}"><i class="fas fa-eye ml-2"></i>عرض المدربين ({{ $diploma->traners_count }}) </a>
                          @can('Delete-Admin')
                          <a class="dropdown-item"  onclick="performDestroy({{ $diploma->id }},this)" href="#"><i class="fas fa-trash-alt ml-2"></i>حذف</a>
                          @endcan
                        </div>
                      </div>
                </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="span text-center" style="margin-top: 20px; margin-bottom:10px">

                {{ $diplomas->links() }}

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
    let url = '/cms/admin/diplomas/'+id;
    confirmDestroy(url, reference);
  }
 </script>
@endsection


