@extends("dashboard.parent")
@section("title","لوحة التحكم")
@section("styles")

@endsection

@section('page title', 'لوحة التحكم')
@section('active title', 'لوحة التحكم ')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>0</h3>
              <p> مستخدمي اللوحة</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>            </div>
            <a href="#" class="small-box-footer">المزيد  <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
         <!-- ./col -->
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>0</h3>

                <p>فنيين الصيانة </p>
              </div>
              <div class="icon">
                  <i class="fas fa-user-friends"></i>
              </div>
              <a href="#" class="small-box-footer">المزيد  <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>0</h3>
              <p> مستخدمي الموقع</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>            </div>
            <a href="#" class="small-box-footer">المزيد  <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>0</h3>

              <p>الخدمات </p>
            </div>
            <div class="icon">
                <i class="fas fa-user-cog"></i>            </div>
            <a href="#" class="small-box-footer">المزيد  <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>0</h3>
                <p>  خطط الإشتراك</p>
              </div>
              <div class="icon">
                <i class="fas fa-tags"></i>           </div>
              <a href="#" class="small-box-footer">المزيد  <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
           <!-- ./col -->
           <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>0</h3>

                  <p> الرسائل </p>
                </div>
                <div class="icon">
                    <i class="fas fa-envelope"></i>                </div>
                <a href="#" class="small-box-footer">المزيد  <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>0</h3>
                <p>  الطلبات</p>
              </div>
              <div class="icon">
                <i class="far fa-bookmark"></i>            </div>
              <a href="#" class="small-box-footer">المزيد  <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>0</h3>

                <p>المميزات </p>
              </div>
              <div class="icon">
                <i class="fas fa-star"></i>           </div>
              <a href="#" class="small-box-footer">المزيد  <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
      </div>
</div>
@endsection

@section('scripts')

@endsection
