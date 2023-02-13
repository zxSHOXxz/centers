{{-- @extends('dashboard.parent') --}}
@extends('dashboard.parent')

@section('title',' الطالب')

@section('sub-title',' معلومات الطالب  ')

@section('active title',' معلومات الطالب ')

@section('styles')
@endsection

@section('content')

<!-- Main content -->
<style>
  .show li>a{
        font-weight:500;
        /* border-radius: 7px;
        padding:0 5px;
        background: rgb(12, 12, 12); */
    }
</style>
<section class="content">
    <div class="container">
        <div class="row show">
            <div class="card card-primary card-outline col-12">
                <div class="card-body box-profile ">


                  <h3 class="profile-username text-center">{{$students->name_ar}}</h3>


                  <p class="text-muted text-center">{{ $students->email}}</p>

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b> اسم الطالب</b> <a class="float-right text-danger">{{$students->name_ar}}</a>
                      </li>
                    <li class="list-group-item">
                      <b> رقم الجوال</b> <a class="float-right text-danger">{{$students->mobile1}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>تاريخ الميلاد </b> <a class="float-right text-danger">{{$students->date_of_birth}}</a>
                    </li>
                    <li class="list-group-item">
                        <b> المؤهل العلمي </b> <a class="float-right text-danger">{{$students->qualification}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>الحالة</b> <a class="float-right text-danger " >{{$students->status}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>الدبلومة</b> <a class="float-right text-danger">{{$students->diploma?$students->diploma->name:'not value'}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>المجموعة </b> <a class="float-right text-danger">{{$students->group->group_name.' '. $students->group->group_number }}</a>
                    </li>

                  </ul>

                  <a href="{{route('students.index')}}" class="btn btn-primary btn-block"><b>قائمة الطلاب</b></a>
                </div>
                <!-- /.card-body -->
              </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

</section>
<!-- /.content -->

@endsection
<script src="{{ asset('cms/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

@section('scripts')


@endsection
