@extends('dashboard.parent')
@section('title','الرئيسة')

@section('styles')
<style>
    a{
        color: black;
        font-weight: bold
    }

    a:hover{
        text-decoration: none;
    }
</style>

@endsection

@section('content')

<div class="container-fluid">
    <div class="row">


        <!-- col -->
        @php
        use App\Models\Admin;
        $count = Admin::count('id');
        @endphp

          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <a href="{{route('admins.index')}}" class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-user-gear ml-2"></i></a>

              <div class="info-box-content">
                <a href="{{route('admins.index')}}" class="info-box-text">عدد المشرفين</a>
                <a href="{{route('admins.index')}}" class="info-box-number">{{$count}}</a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- col -->
          @php
        use App\Models\Employee;
        $count = Employee::count('id');
        @endphp

          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <a href="{{route('employees.index')}}" class="info-box-icon bg-success elevation-1"><i class="fas fa-user ml-2"></i></a>

              <div class="info-box-content">
                <a href="{{route('employees.index')}}" class="info-box-text">عدد الموظفين</a>
                <a href="{{route('employees.index')}}" class="info-box-number">{{$count}}</a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- col -->
          @php
        use App\Models\Trainer;
        $serCount = Trainer::count('id');
        @endphp

          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <a href="{{route('trainers.index')}}" class="info-box-icon bg-warning elevation-1"><i class="fa-solid fa-chalkboard-user ml-2"></i></a>

              <div class="info-box-content">
                <a href="{{route('trainers.index')}}" class="info-box-text">عدد المدربين</a>
                <a href="{{route('trainers.index')}}" class="info-box-number">{{$serCount}}</a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- col -->
          @php
        use App\Models\Student;
        $sparCount = Student::count('id');
        @endphp

          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <a href="{{route('students.index')}}" class="info-box-icon bg-blue elevation-1"><i class="fa-solid fa-user-graduate ml-2"></i></a>

              <div class="info-box-content">
                <a href="{{route('students.index')}}" class="info-box-text">عدد الطلاب</a>
                <a href="{{route('students.index')}}" class="info-box-number">{{$sparCount}}</a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->


          <!-- col -->
          @php
        use App\Models\Diploma;
        $count = Diploma::count('id');
        @endphp

          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <a href="{{route('diplomas.index')}}" class="info-box-icon bg-secondary elevation-1"><i class="fa-solid fa-book-bookmark ml-2"></i></a>

              <div class="info-box-content">
                <a href="{{route('diplomas.index')}}" class="info-box-text">عدد الدبلومات</a>
                <a href="{{route('diplomas.index')}}" class="info-box-number">{{$count}}</a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- col -->
          @php
        use App\Models\Group;
        $count = Group::count('id');
        @endphp

          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <a href="{{route('groups.index')}}" class="info-box-icon bg-cyan elevation-1"><i class="fas fa-users ml-2"></i></a>

              <div class="info-box-content">
                <a href="{{route('groups.index')}}" class="info-box-text">عدد المجموعات</a>
                <a href="{{route('groups.index')}}" class="info-box-number">{{$count}}</a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

    </div>
</div>

@endsection

@section('scripts')

@endsection
