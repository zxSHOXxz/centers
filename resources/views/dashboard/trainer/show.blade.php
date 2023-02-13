{{-- @extends('dashboard.parent') --}}
@extends('dashboard.parent')

@section('title',' المدرب ')

@section('sub-title',' معلومات المدرب  ')

@section('active title',' معلومات المدرب ')

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


                  <h3 class="profile-username text-center">{{ $trainers->user->first_name.' '.$trainers->user->last_name }}</h3>


                  <p class="text-muted text-center">{{ $trainers->email}}</p>

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b> رقم الجوال</b> <a class="float-right text-danger">{{  $trainers->user->mobile  }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>تاريخ الميلاد </b> <a class="float-right text-danger">{{ $trainers->user->date_of_birth  }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>التخصص</b> <a class="float-right text-danger " >{{ $trainers->user->speciality }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>الراتب</b> <a class="float-right text-danger">{{ $trainers->user->salary_value }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>المدينة </b> <a class="float-right text-danger">{{ $trainers->$cities ? $trainers->$cities->name: 'not value' }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>المسمى الوظيفي </b> <a class="float-right text-danger"> {{ $trainers->user->job_title }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>نوع الراتب </b> <a class="float-right text-danger"> {{ $trainers->user->salary_type }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>المؤهل العلمي</b> <a class="float-right text-danger"> {{ $trainers->user->certification }}</a>
                    </li>
                  </ul>
                  @can('Index-Trainer')
                      
                  <a href="{{route('trainers.index')}}" class="btn btn-primary btn-block"><b>قائمة المشرفين</b></a>
                  @endcan

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
