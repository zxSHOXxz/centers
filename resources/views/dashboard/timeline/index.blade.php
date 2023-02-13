@extends('dashboard.parent')
@section('title','القاعة ')
@section('left-title','عرض بيانات القاعة ')

@section('active title','عرض بيانات القاعة ')

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
            <h3 class="card-title"> عرض القاعات </h3>
            <div class="card-tools">
                <form action="" method="get" >
                    <div class="row">
                        <div class="input-icon col-md-2">
                            <input type="text" class="form-control" placeholder="search Room Number "
                               name='room_number' @if( request()->room_number) value={{request()->room_number}} @endif/>
                              <span>
                                  <i class="flaticon2-search-1 text-muted"></i>
                              </span>
                            </div>

                            <div class="input-icon col-md-2">
                            <input type="text" class="form-control" placeholder="search start room"
                               name='from' @if( request()->from) value={{request()->from}} @endif/>
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
                          <a href="{{route('rooms.index')}}"  class="btn btn-danger">إنهاء البحث</a>
                          @can('Create-TimeLine')

                          <a href="{{route('rooms.create')}}"><button type="button" class="btn  btn-primary">انشاء قاعة جديدة </button></a>
                          @endcan
                        </div>



                  </div>
            </form>
                {{-- <a href="{{route('rooms.create')}}"><button type="button" class="btn btn-lg btn-primary">انشاء قاعة جديدة </button></a> --}}
              </div>
              <br>
            </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
              <thead>
                <tr class="bg-info">
                  <th> رقم القاعة </th>
                  <th>  اسم القاعة </th>
                  <th>  بداية الموعد </th>
                  <th>  نهاية الموعد </th>

                  <th> الاعدادات </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($rooms as $room )
                <tr>
                  <td>{{$room->id}}</td>
                  <td>{{$room->room_number}}</td>
                  <td>{{$room->from}}</td>
                  <td>{{$room->to}}</td>

                  <td>
                    <div class="btn">
                        <button type="button" class="btn btn-primary  dropdown-toggle" data-toggle="dropdown">الإعدادات</button>
                        <div class="dropdown-menu" role="menu">
                          {{-- @can('Edit-Admin') --}}
                          <a class="dropdown-item" href="{{route('applies.edit',$apply->id)}}"><i class="far fa-edit ml-2"></i>تعديل</a>
                          <a class="dropdown-item" href="{{route('applies.show',$apply->id)}}"><i class=" fas fa-info ml-2"></i>تفاصيل الطالب</a>
                          {{-- <a class="dropdown-item" href="{{route('conditions.index',$student->id)}}"><i class="fas fa-eye ml-2"></i>عرض بيان الطالب</a> --}}

                          {{-- @endcan --}}
                          {{-- @can('Delete-Admin') --}}
                          <a class="dropdown-item"  onclick="performDestroy({{ $apply->id }},this)" href="#"><i class="fas fa-trash-alt ml-2"></i>حذف</a>
                          {{-- @endcan --}}
                        </div>
                      </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="span text-center" style="margin-top: 20px; margin-bottom:10px">

                {{ $rooms->links() }}

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
    let url = '/cms/admin/rooms/'+id;
    confirmDestroy(url, reference);
  }
 </script>
@endsection


