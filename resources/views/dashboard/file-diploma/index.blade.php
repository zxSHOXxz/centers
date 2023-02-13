@extends('dashboard.parent')
@section('title','الملفات  ')

@section('left-title','عرض ملفات الدبلومة ')

@section('active title','عرض ملفت الدبلومة ')


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
            <h3 class="card-title">الملفات</h3>
            <div class="card-tools">
                {{-- <a href="{{route('files.create')}}"><button type="button" class="btn btn-lg btn-primary">اضافة ملفات </button></a> --}}
                <form action="" method="get" >
                    <div class="row">


                            <div class="input-icon col-md-2">
                            <input type="text" class="form-control" placeholder="search fileName"
                               name='fileName' @if( request()->fileName) value={{request()->fileName}} @endif/>
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

                    <div>
                          <button class="btn btn-success btn-md" type="submit">فلتر البحث</button>
                          <a href="{{route('diplomas.index')}}"  class="btn btn-danger">قائمة الدبلومات</a>
                          <a href="{{ route('createDFile', $id) }}" class="btn btn-primary" style="color: white;"> إضافة ملف جديد </a>

                        </div>



                  </div>
            </form>

            </div>
              <br>
            </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
              <thead>
                <tr class="bg-info">
                  <th> رقم الملف </th>
                  <th>  اسم المف </th>
                  <th> مرفقات الملفات </th>
                  {{-- <th> الدبلومة </th>
                  <th> الدورة </th> --}}
                  <th> الاعدادات </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($files as $file )
                <tr>
                  <td>{{$file->id}}</td>
                  {{-- <td>{{$file->who}}</td> --}}
                  {{-- <td>
                    <img class="img-circle img-bordered-sm" src="{{asset('images/city_who/'.$file->image_who)}}" width="60" height="60" alt="User Image">
                  </td> --}}
                  <td>{{$file->fileName}}</td>
                  <td>{{$file->file}}</td>
                  <td>
                    <div class="btn">
                      {{-- @can('Edit-City') --}}
                      <a href="{{route('fileDiplomas.edit', $file->id)}}" class="btn btn-info" title="Edit">
                        تعديل
                        </a>
                      {{-- @endcan --}}
                      {{-- @can('Delete-City') --}}
                      <a href="#" onclick="performDestroy({{$file->id}}, this)" class="btn btn-danger" title="Delete">
                        حذف
                      </a>
                      {{-- @endcan --}}
                      {{-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
                        <i class="fas fa-book-open"></i>
                      </button> --}}
                    <a href="{{ asset('storage/files/diploma/'. $file->file) }}"
                         download="{{ $file->file }}" type="button"  class="btn btn-success"><i class="fas fa-download"></i></i></a>
                  
                              {{-- <a href="{{asset('storage/files/diploma/'.$file->file)}}">
                                <i class="fas fa-download" style="font-size: 25px; color:green;"></i>
                            </a> --}}
                        </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="span text-center" style="margin-top: 20px; margin-bottom:10px">

                {{ $files->links()}}

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
    let url = '/cms/admin/fileDiplomas/'+id;
    confirmDestroy(url, reference);
  }
 </script>
@endsection


