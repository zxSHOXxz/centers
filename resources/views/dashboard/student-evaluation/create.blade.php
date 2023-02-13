{{-- @extends('dashboard.parent') --}}
@extends('dashboard.parent')

@section('title',' تقيم الطلاب ')

@section('sub-title',' تقييم الطالب  ')

@section('active title','  تقييم الطالب ')
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
                        <h3 class="card-title">عرض تقيم الطلاب </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form">
                        @csrf
                        <div class="card-body">

                            <br>
                            <div class="row">
                                <input type="text" name="student_id" id="student_id" value="{{$id}}"
                                class="form-control form-control-solid" hidden/>

                                {{-- <input type="text" name="trainer_id" id="trainer_id" value="{{$id}}"
                                class="form-control form-control-solid" hidden/> --}}






                                <div class="form-group col-md-3">
                                    <label for="mid_exam"> درجةالامتحان النصفي   </label>
                                    <input type="number" name="mid_exam" class="form-control" id="mid_exam" placeholder="أدخل درجة الامتحان النصفي  ">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="activity">درجة النشاط</label>
                                    <input type="number" name="activity" class="form-control" id="activity" placeholder="ادخل درجة النشاط ">

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="project">درجة المشاريع</label>
                                    <input type="number" name="project" class="form-control" id="project" placeholder=" ادخل درجة المشاريع">

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="fina_exam">درجة الامتحان النهائي</label>
                                    <input type="number" name="fina_exam" class="form-control" id="fina_exam" placeholder=" ادخل درجة الامتحان النهائي">

                                </div>
                                {{-- <div class="form-group col-md-4">
                                    <label for="total">درجة المجموع </label>
                                    <input type="number" name="total" class="form-control" id="total" placeholder=" ادخل درجة  المجموع">

                                </div> --}}



                            </div>

                            <br>

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="button" onclick="performStore()" class="btn btn-lg btn-success">حفظ</button>
                                
                                <a href="{{route('indexStudent' , $id)}}"><button type="button" class="btn btn-lg btn-primary"> قائمة التقيم </button></a>
                                {{-- <a href="{{route('student_evalutions.index')}}"><button type="button" class="btn btn-lg btn-primary"> قائمة التقيمات  </button></a> --}}

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


<!-- /.content -->

@endsection

@section('scripts')


<script>
    function performStore() {

        let formData = new FormData();
        formData.append('mid_exam', document.getElementById('mid_exam').value);
        formData.append('activity', document.getElementById('activity').value);
        formData.append('project', document.getElementById('project').value);
        formData.append('fina_exam', document.getElementById('fina_exam').value);
        // formData.append('total', document.getElementById('total').value);
        formData.append('student_id', document.getElementById('student_id').value);

        store('/cms/admin/student_evalutions', formData);

    }

</script>


@endsection
