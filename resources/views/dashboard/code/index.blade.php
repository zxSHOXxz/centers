@extends('dashboard.parent')
@section('title','المجموعات ')


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
            <h3 class="card-title"> عرض المجموعات </h3>
            <div class="card-tools">
               
            </div>
            <br>
            </div><!--class="badge bg-green"-->
        
         </div>
       </div>
    <br>
    <br>
        <div class='col-12'>
            <div class="table w-100 bg-light d-flex  align-items-center ">
                <div class="w-50">
                    <span class="ml-2 text-success">  اليوم :<span class="text-bold text-secondary">السبت - 2022-6-20</span></span>
                    <span class="text-success"> الوقت : <span class="badge bg-red text-bold">8:30-10:30 </span></span>
                    <span class="text-success ml-1"> المدة : <span class=" text-bold text-secondary">2 س</span></span>
                    <span class="text-success ml-1"> الحالة  : <span class=" text-bold text-secondary">حضر </span></span>
                </div>
                <div class="w-50 d-flex justify-content-between">
                    <span class="ml-2 text-secondary text-bold">VCEL 1306-<span class="text-primary">أنظمة حقن محركات بنزين </span></span>
                    <span class="ml-2 text-success">  القاعة  :<span class="text-bold text-secondary">M103</span></span>

                </div>
                
            </div>
        </div>
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


