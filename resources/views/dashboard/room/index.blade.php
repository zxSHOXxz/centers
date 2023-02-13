@extends('dashboard.parent')
@section('title','القاعات')


@section('styles')
<style>
    .table{
        border-right: 15px red solid;
        height: 70px;
        border-radius: 5px;
        box-shadow: 0 1px 3px rgb(122, 122, 122);
        /* justify-content: space-between */




    }

</style>
@endsection

@section('content')

<section class="content">
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
                      <a class="dropdown-item" href="{{route('applies.edit',$room->id)}}"><i class="far fa-edit ml-2"></i>تعديل</a>
                      <a class="dropdown-item" href="{{route('applies.show',$room->id)}}"><i class=" fas fa-info ml-2"></i>تفاصيل القاعة</a>
                      {{-- <a class="dropdown-item" href="{{route('conditions.index',$student->id)}}"><i class="fas fa-eye ml-2"></i>عرض بيان الطالب</a> --}}

                      {{-- @endcan --}}
                      {{-- @can('Delete-Admin') --}}
                      <a class="dropdown-item"  onclick="performDestroy({{ $room->id }},this)" href="#"><i class="fas fa-trash-alt ml-2"></i>حذف</a>
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


