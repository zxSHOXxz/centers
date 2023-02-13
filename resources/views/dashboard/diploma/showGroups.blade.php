{{-- Extends layout --}}

@extends('dashboard.parent')

@section('title','عروض المجموعات')

@section('sub-title','بيانات المجموعات ')

@section('active title','بيانات المجموعات ')
{{-- Content --}}
@section('styles')
<style>
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

</style>


@endsection
@section('content')
<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Profile 4-->
                <div class="d-flex flex-row">

                    <div class="flex-row-fluid ml-lg-8">

                        <!--end::Row-->
                        <!--begin::Advance Table Widget 8-->
                        <div class="card card-custom gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0 py-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">معلومات المجموعات الخاصة
                                        بالدبلومة</span>

                                </h3>
                                <div class="card-toolbar">

                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            @foreach ($groups as $group)
                            <div class="card-body pt-0 pb-3">
                                <div class="row clearfix">

                                    <!--begin::Table-->
                                    <div class="form-group col-md-6">
                                        <label>اسم الدبلومة:</label>
                                        <input type="text" value="{{$group->diploma->name}} " class="form-control form-control-solid" disabled />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>رقم المجموعة:</label>
                                        <input type="text" value="{{$group->group_name.' '. $group->group_number }}" class="form-control form-control-solid" disabled />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>عدد طلاب المجموعة:</label>
                                        <input type="text" value="{{$group->students_count}} " class="form-control form-control-solid" disabled />
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>ايام دوام المجموعة:</label>
                                        <input type="text" value="{{$group->dayes}} " class="form-control form-control-solid" disabled />
                                    </div>
                                    </div>

                            <div class="row">

                        </div>

                        <!--end::Table-->
                    </div>
                    <!--end::Body-->
                    <br>
                    <hr style="background-color: black;">
                    <br>

                    @endforeach
                    <a href="{{route('groups.index')}}"> <button type="button" class="btn btn-primary mr-6" > العودة للمجموعات</button></a>

                </div>
                <!--end::Advance Table Widget 8-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Profile 4-->
    </div>
    <!--end::Container-->
</div>
</div>
</div>

@endsection


@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script src="{{asset('crudjs/crud.js')}}"></script>



@endsection
