{{-- Extends layout --}}

@extends('dashboard.parent')

@section('sub-title',' تعديل البيانات  ')

@section('active title',' تعديل الصفحة الشخصية ')

@section('active title',' سلة المحذوفات  ')
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

                    <div class="card card-custom gutter-b">
                        <!--begin::Body-->
                        <div class="card-body pt-8">
                            <!--begin::Toolbar-->

                            <h4>{{$admins->user->first_name . ' ' . $admins->user->last_name}}</h4>
                            <br>

                            <hr>
                            <br>
                            <div >
                                <div class="symbol-label">
                                     <img class="img-circle align-center background-image img-bordered-sm" src="{{asset('storage/images/admin/'.$admins->image)}}" width="120" height="120" alt="User Image">
                                     </div>

                            </div>
                            <div class="body">


                            </div>
                        </div>
                        <!--end::Body-->
                    </div>

                    <div class="flex-row-fluid ml-lg-12">

                        <!--end::Row-->
                        <!--begin::Advance Table Widget 8-->
                        <div class="card card-custom gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0 py-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">معلومات المشرف</span>

                                </h3>
                                <div class="card-toolbar">

                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-md-4">
                                        <label for="first_name">الاسم المشرف</label>
                                        <input type="text" name="first_name" class="form-control" id="first_name"
                                        value="{{$admins->user->first_name }} "
                                         placeholder="أدخل اسم الأول">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="first_name">الاسم المشرف</label>
                                        <input type="text" name="last_name" class="form-control" id="last_name"
                                         value="{{$admins->user->last_name }} "
                                         placeholder="أدخل اسم الاخير">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="mobile"> رقم الجوال</label>
                                        <input type="text" name="mobile" class="form-control"   id="mobile"
                                             value="{{ $admins->user->mobile }}"
                                            placeholder="ادخل رقم الجوال  ">
                                    </div>
                                </div>
                                <div class="row">

                                    <!--begin::Table-->
                                    <div class="form-group col-md-6">
                                        <label for="email"> الإيميل</label>
                                        <input type="text" name="email" class="form-control" id="email"
                                        value="{{ $admins->email}}"
                                           placeholder="ادخل الايمل   ">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="date_of_birth"> تاريخ الميلاد </label>
                                        <input type="date" name="date_of_birth" class="form-control" id="date_of_birth"
                                        value="{{ $admins->user->date_of_birth }}"
                                         placeholder="ادخل تاريخ الميلاد   ">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="job_title"> المسمى الوظيفي</label>
                                        <select class="form-select form-select-sm" name="job_title" style="width: 100%;"
                                            id="job_title" aria-label=".form-select-sm example">
                                         <option selected >{{ $admins->user->job_title }} </option>
                                         <option value="مشرف"> مشرف </option>
                                         <option value="مدرب"> مدرب</option>
                                         <option value="استقبال"> استقبال</option>
                                         <option value="إداري"> إداري</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="certification">المؤهل العلمي</label>
                                        <select class="form-select form-select-sm" name="certification" style="width: 100%;"
                                            id="certification" aria-label=".form-select-sm example">                                        <label class="form-label">المؤهل العلمي :</label>

                                       <option selected >{{ $admins->user->certification }} </option>
                                         <option value="دبلومة">دبلوم </option>
                                         <option value="بكالوريس"> بكالوريس </option>
                                         <option value="ماستر"> ماستر</option>
                                         <option value="بدون"> بدون</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="salary_type">نوع الراتب</label>
                                        <select class="form-select form-select-sm" name="salary_type" style="width: 100%;"
                                            id="salary_type" aria-label=".form-select-sm example">
                                            <option selected> {{ $admins->user->salary_type }} </option>
                                            <option value="راتب ثابت">راتب ثابت </option>
                                            <option value="راتب بالساعة">راتب بالساعة</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="salary_value"> قيمة الراتب بالدولار للساعة  </label>
                                        <input type="text" name="salary_value" class="form-control"
                                            id="salary_value"
                                            value="{{ $admins->user->salary_value }}"
                                            placeholder="ادخل قيمة الراتب  ">
                                    </div>

                                </div>

                                    <div class="row">

                                        <!--begin::Table-->
                                        <div class="form-group col-md-6">
                                            <label for="speciality"> التخصص </label>
                                            <input type="text" name="speciality" class="form-control"
                                                id="speciality"

                                                value="{{ $admins->user->speciality }}"
                                                 placeholder="ادخل التخصص  ">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="city_id">اسم المدينة</label>
                                            <select class="form-select form-select-sm" name="city_id" style="width: 100%;"
                                                id="city_id" aria-label=".form-select-sm example">
                                                @foreach ($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="image">تعديل صورة شخصية</label>
                                              <input type="file" name="image" class="form-control" id="image"
                                                placeholder=" أضف صورة شخصية">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="cv">تعديل السيرة الذاتية</label>
                                              <input type="file" name="cv" class="form-control" id="cv"
                                                placeholder="أرفق السيرة الذاتية">
                                        </div>


                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" onclick="update()" class="btn btn-lg btn-success">تعديل</button>
                                    <a href="{{route('admins.index')}}"><button type="button" class="btn btn-lg btn-primary">
                                            قائمة المشرفين </button></a>
                                </div>

                </div>
            </div>
            <!--end::Table-->
        </div>
        <!--end::Body-->
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


{{--
@section('scripts')

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDL_Iurzw7shb69C_H4GLxzETOgHWrzHEw"></script>



<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script src="{{asset('crudjs/crud.js')}}"></script>





<script>
    //map

    var map, marker, infoWindow;

    initMap();

    function initMap() {

        map = new google.maps.Map(document.getElementById('mapGoogle'), {

            zoom: 18,

            center: {

                lat: 59.909144,

                lng: 10.7436936

            },

        });



        marker = new google.maps.Marker({

            map: map,

            draggable: true,

            //icon: image,

            animation: google.maps.Animation.DROP,

            position: {

                lat: 59.909144,

                lng: 10.7436936

            }

        });



        marker.addListener('click', toggleBounce);



        //END CUSTOM MARKER ICON

        google.maps.event.addListener(marker, 'dragend', function (evt) {

            $('#latitude').val(evt.latLng.lat());

            $('#longitude').val(evt.latLng.lng());

        });



        // GET POSITION

        infoWindow = new google.maps.InfoWindow;



        // Try HTML5 geolocation.

        if (navigator.geolocation)

        {

            navigator.geolocation.getCurrentPosition(function (position) {

                var pos = {

                    lat: position.coords.latitude,

                    lng: position.coords.longitude

                };



                $('#latitude').val(position.coords.latitude);

                $('#longitude').val(position.coords.longitude);

                marker.setPosition(pos);

                marker.setTitle('Your position is ' + (Math.round(pos.lat * 100) / 100) + ", " + (Math
                    .round(pos.lng * 100) / 100));

                map.setCenter(pos);

            }, function () {

                handleLocationError(true, infoWindow, map.getCenter());

            });

        } else

        {

            // Browser doesn't support Geolocation

            handleLocationError(false, infoWindow, map.getCenter());

        }

        //END GET POSITION

    }



    //BOUNCE WHEN MARKER IS PRESSED

    function toggleBounce() {

        if (marker.getAnimation() !== null)

        {

            marker.setAnimation(null);

        } else {

            marker.setAnimation(google.maps.Animation.BOUNCE);

        }

    }



    //END BOUNCE WHEN MARKER IS PRESSED

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {

        infoWindow.setPosition(pos);

        infoWindow.setContent(browserHasGeolocation ?

            'Error: The Geolocation service failed.' :

            'Error: Your browser doesn\'t support geolocation.');

        infoWindow.open(map);

    }

</script>

@endsection --}}

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script src="{{asset('cms/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('cms/js/crud.js')}}"></script>
<script>

$('.city_id').select2({
      theme: 'bootstrap4'
    })


    function update(){

        let formData = new FormData();
            formData.append('first_name',document.getElementById('first_name').value);
            formData.append('last_name',document.getElementById('last_name').value);
            formData.append('mobile',document.getElementById('mobile').value);
            formData.append('date_of_birth',document.getElementById('date_of_birth').value);
            formData.append('email',document.getElementById('email').value);
            formData.append('salary_type',document.getElementById('salary_type').value);
            formData.append('salary_value',document.getElementById('salary_value').value);
            formData.append('speciality',document.getElementById('speciality').value);
            formData.append('job_title',document.getElementById('job_title').value);
            formData.append('certification',document.getElementById('certification').value);
            formData.append('city_id',document.getElementById('city_id').value);
            formData.append('image',document.getElementById('image').files[0]);
            formData.append('cv',document.getElementById('cv').files[0]);
            storeRoute('/cms/admin/profile/update' , formData );
    }

</script>


@endsection
