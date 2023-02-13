@extends('dashboard.parent')
@section('title',' جدول القاعة ')


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
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"> عرض جدول القاعة  </h3>
            <div class="card-tools">

            </div>
            <br>
            </div><!--class="badge bg-green"-->

         </div>
       </div>
    <br>
    <br>
    @foreach ($times as $time )

        <div class='col-12'>
            <div class="table w-100 bg-light d-flex  align-items-center " style="height: fit-content;">
                <div class="w-25">
                    <span class="text-secondary text-bold"> اليوم  :&nbsp;&nbsp;&nbsp;&nbsp; <span class="badge bg-green text-bold ">{{ $time->days }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span>
                    <br>
                    <span class="text-secondary text-bold ml-2"> الوقت :&nbsp;&nbsp;&nbsp;&nbsp; <span class=" text-green text-bold">{{ $time->time }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span>
                    <br>
                    <span class="text-secondary text-bold"> المدة :&nbsp;&nbsp;&nbsp;&nbsp; <span class="  text-green text-bold ">{{ $time->period }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span>
                    <br>
                    <span class="text-secondary text-bold"> الحالة  :&nbsp;&nbsp;&nbsp;&nbsp; <span class="badge bg-red text-bold ">{{ $time->status }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span>
                    <br>
                </div>

                <div class="w-75 d-flex justify-content-between">
                    {{-- @foreach ($time->groups as $group) --}}
                    <span class=" text-secondary text-bold">اسم المجموعة:&nbsp;&nbsp;&nbsp;&nbsp;<span class=" text-green text-bold">{{ $time->group_name }}</span></span>
                    {{-- @endforeach --}}

                    {{-- @foreach ($time->rooms as $room) --}}
                    <span class=" text-secondary text-bold">  القاعة  :&nbsp;&nbsp;&nbsp;&nbsp;<span class=" text-green text-bold ">{{ $time->room_name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span>
                     {{-- @endforeach --}}

                     <div class="btn">
                        <button type="button" class="btn btn-primary  dropdown-toggle" data-toggle="dropdown"> <i class="fa-solid fa-eye"></i> </button>
                        <div class="dropdown-menu" role="menu">
                          {{-- @can('Edit-Admin') --}}
                          <a class="dropdown-item" href="{{route('timelines.edit',$time->id)}}"><i class="far fa-edit ml-2"></i>تعديل</a>
                          {{-- @endcan --}}
                          {{-- @can('Delete-Admin') --}}
                          <a class="dropdown-item"  onclick="performDestroy({{$time->id}},this)" href="#"><i class="fas fa-trash-alt ml-2"></i>حذف</a>
                          {{-- @endcan --}}
                        </div>
                      </div>

                </div>

            </div>
        </div>
        @endforeach

    </div>

</section>

@endsection

@section('scripts')

<script>
    function performDestroy(id, reference){
      let url = '/cms/admin/timelines/'+id;
     confirmDestroy(url, reference);
    }
   </script>
@endsection


