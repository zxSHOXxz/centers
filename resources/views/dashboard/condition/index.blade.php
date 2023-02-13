@extends('dashboard.parent')
@section('title','أحوال الطلاب ')

@section('left-title',' أحوال الطلاب ')

@section('active title','عرض أحوال الطلاب ')


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
                                     name='street' @if( request()->street) value={{request()->street}} @endif/>
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
                                <a href="{{route('conditions.index')}}"  class="btn btn-danger">إنهاء البحث</a>
                                @can('Create-Condition')

                                <a href="{{route('createCondition' , $id)}}"><button type="button" class="btn btn-md btn-primary">اضافة بيان للطالب </button></a>
                                @endcan
                          </div>

                               </div>
                      </form>
                      <div class="card-tools">
                          {{-- <a href="{{route('conditions.create')}}"><button type="button" class="btn btn-lg btn-primary">انشاء مدينة </button></a> --}}
                          <br>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
              <thead>
                <tr class="bg-info">
                  <th> رقم البيان </th>
                  <th>   اسم الطالب </th>
                  <th>   تاريخ البيان </th>
                  <th>  بيان الطالب </th>
                  <th> الإعدادات </th>
                </tr>
              </thead>
              <tbody>

                @foreach ($conditions as $condition )
                {{-- @foreach ($condition->students as $student ) --}}

                <tr>
                  <td>{{$condition->id}}</td>

                  <td>{{$condition->student->name_ar}}</td>

                  {{-- <td>
                    <img class="img-circle img-bordered-sm" src="{{asset('images/condition_who/'.$condition->image_who)}}" width="60" height="60" alt="User Image">
                  </td> --}}
                  <td>{{$condition->date}}</td>
                  <td>{{$condition->statmente}}</td>

                  <td>
                    <div class="btn">
                      @can('Edit-Condition')
                      <a href="{{route('conditions.edit',$condition->id)}}" class="btn btn-info" title="Edit">
                        تعديل
                        </a>
                      @endcan
                      @can('Delete-Condition')
                      <a href="#" onclick="performDestroy({{$condition->id}}, this)" class="btn btn-danger" title="Delete">
                        حذف
                      </a>
                      @endcan

                    </div>
                  </td>
                </tr>
                @endforeach
                {{-- @endforeach --}}

              </tbody>
            </table>
            <div class="span text-center" style="margin-top: 20px; margin-bottom:10px">

                {{ $conditions->links() }}

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
    let url = '/cms/admin/conditions/'+id;
    confirmDestroy(url, reference);
  }
 </script>
@endsection


