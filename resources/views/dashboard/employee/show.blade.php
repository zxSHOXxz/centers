{{-- @extends('dashboard.parent') --}}
@extends('dashboard.parent')

@section('title','  الموظف')

@section('sub-title',' معلومات الموظف  ')

@section('active title',' معلومات الموظف')

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
                  <div class="text-center ">
                    <img class="profile-user-img img-fluid img-circle" src="{{asset('images/employee/'.$employees->image )}}" alt="User profile picture">
                  </div>

                  <h3 class="profile-username text-center">{{ $employees->user ?$employees->user->first_name.' '.$employees->user->last_name: null }}</h3>


                  <p class="text-muted text-center">{{ $employees->email}}</p>

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b> رقم الجوال</b> <a class="float-right text-danger">{{ $employees->user?$employees->user->mobile:'not value' }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>تاريخ الميلاد </b> <a class="float-right text-danger">{{ $employees->user?$employees->user->date_of_birth:'not value' }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>التخصص</b> <a class="float-right text-danger " >{{ $employees->user?$employees->user->speciality:'not value' }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>الراتب</b> <a class="float-right text-danger">{{ $employees->user?$employees->user->salary_value:'not value' }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>المدينة </b> <a class="float-right text-danger">{{ $employees->$cities ? $employees->$cities->name: 'not value' }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>المسمى الوظيفي </b> <a class="float-right text-danger"> {{ $employees->user?$employees->user->job_title:'not value' }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>نوع الراتب </b> <a class="float-right text-danger"> {{ $employees->user?$employees->user->salary_type:'not value' }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>المؤهل العلمي</b> <a class="float-right text-danger"> {{ $employees->user?$employees->user->certification:'not value' }}</a>
                    </li>
                  </ul>

                  @can('Index-Employee')
                      
                  <a href="{{route('employees.index')}}" class="btn btn-primary btn-block"><b>قائمة الموظفين</b></a>
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
