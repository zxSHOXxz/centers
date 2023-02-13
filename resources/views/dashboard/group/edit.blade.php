{{-- @extends('dashboard.parent') --}}
@extends('dashboard.parent')

@section('title',' المجموعة')

@section('sub-title',' تعديل المجموعة  ')

@section('active title',' تعديل المجموعة ')

@section('styles')

@endsection

@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">عرض بيانات المجموعة</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form">
                        @csrf
                        <div class="card-body">

                            <br>
                            <div class="row">

                                {{-- <div class="form-group col-md-4">
                                    <label for="diploma_id"> اسم الدبلومة</label>
                                    <select class="form-select form-select-sm" name="diploma_id" style="width: 100%;" id="diploma_id" aria-label=".form-select-sm example">
                                        @foreach ($diplomas as $diploma)
                                        <option value="{{ $diploma->id }}">{{ $diploma->name }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}

                                <div class="form-group col-md-4">
                                    <label for="group_number">رقم المجموعة</label>
                                    <input type="text" name="group_number" class="form-control" id="group_number"
                                    value="{{ $groups->group_number }}" placeholder="أدخل رقم المجموعة">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="group_name">اسم المجموعة</label>
                                    <input type="text" name="group_name" class="form-control" id="group_name"
                                    value="{{ $groups->group_name }}" placeholder="أدخل اسم المجموعة">
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="room_id"> موعد بداية المحاضرة</label>
                                    <select class="form-select form-select-sm" name="room_id" style="width: 100%;" id="room_id" aria-label=".form-select-sm example">
                                        @foreach ($rooms as $room)
                                        <option value="{{ $room->id }}">{{ $room->from }}</option>

                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="room_id">موعد نهاية المحاضرة</label>
                                    <select class="form-select form-select-sm" name="room_id" style="width: 100%;" id="room_id" aria-label=".form-select-sm example">
                                        @foreach ($rooms as $room)
                                        <option value="{{ $room->id }}">{{ $room->to }}</option>

                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="dayes">أيام دوام المجموعة</label>
                                    <select class="form-select form-select-sm" name="dayes" style="width: 100%;" id="dayes" aria-label=".form-select-sm example">
                                        <option selected>{{ $groups->dayes }}</option>
                                        <option value="سبت - اثنين - أربعاء">سبت - إثنين - أربعاء</option>
                                        <option value="أحد - ثلاثاء - خميس">أحد - ثلاثاء - خميس</option>
                                    </select>
                                </div>

                            </div>

                            <br>

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="button" onclick="performUpdate({{ $groups->id }})" class="btn btn-lg btn-success">تعديل</button>
                                @can('Index-Group')
                                    
                                <a href="{{route('indexGroup' , $groups->id)}}"><button type="button" class="btn btn-lg btn-primary"> قائمة المجموعات </button></a>
                                @endcan
                            </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

</section>
<!-- /.content -->

@endsection

@section('scripts')


<script>
    function performUpdate(id) {

        let formData = new FormData();
        formData.append('group_number', document.getElementById('group_number').value);
        formData.append('group_name', document.getElementById('group_name').value);
        formData.append('dayes', document.getElementById('dayes').value);
        // formData.append('diploma_id', document.getElementById('diploma_id').value);
        formData.append('room_id', document.getElementById('room_id').value);

        storeRoute('/cms/admin/update_groups/'+id , formData );

    }

</script>


@endsection
