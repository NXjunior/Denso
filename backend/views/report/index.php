<?php

/** @var yii\web\View $this */
$this->title = 'Report & Stats';


?>
<div class="row g-4">
  <div class="col-6 col-lg-4 col-xl-3 col-xxl-2">
    <div class="card">
      <div class="card-body">
        <div class="text-body-secondary text-end">
          <i class="me-2 fa-regular fa-calendar-circle-exclamation fa-lg fa-2xl icon icon-xxl mt-3"></i>
        </div>
        <div class="fs-4 fw-semibold"><?php echo $data['employee_not_booked'] ?></div>
        <div class="small text-body-secondary text-uppercase fw-semibold text-truncate">
          <a class="icon-link icon-link-hover link-secondary link-underline-opacity-0 link-underline-opacity-100-hover" href="/report/not-book">Employee<br>Haven't Booking</a>
        </div>
        <div class="progress progress-thin mt-3 mb-0">
          <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.col-->
  <div class="col-6 col-lg-4 col-xl-3 col-xxl-2">
    <div class="card">
      <div class="card-body">
        <div class="text-body-secondary text-end">
          <i class="me-2 fa-regular fa-calendar-lines fa-lg fa-2xl icon icon-xxl mt-3"></i>
        </div>
        <div class="fs-4 fw-semibold"><?php echo $data['booked_all'] ?></div>
        <div class="small text-body-secondary text-uppercase fw-semibold text-truncate">
          <a class="icon-link icon-link-hover link-secondary link-underline-opacity-0 link-underline-opacity-100-hover" href="/report/booking-all">Booked<br>All Location</a>
        </div>
        <div class="progress progress-thin mt-3 mb-0">
          <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.col-->
  <div class="col-6 col-lg-4 col-xl-3 col-xxl-2">
    <div class="card">
      <div class="card-body">
        <div class="text-body-secondary text-end">
          <i class="me-2 fa-regular fa-industry-windows fa-lg fa-2xl icon icon-xxl mt-3"></i>
        </div>
        <div class="fs-4 fw-semibold"><?php echo $data['booked_bpk'] ?></div>
        <div class="small text-body-secondary text-uppercase fw-semibold text-truncate">
          <a class="icon-link icon-link-hover link-secondary link-underline-opacity-0 link-underline-opacity-100-hover" href="/report/booking-bpk">Booked<br>BPK Amata</a>
        </div>
        <div class="progress progress-thin mt-3 mb-0">
          <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.col-->
  <div class="col-6 col-lg-4 col-xl-3 col-xxl-2">
    <div class="card">
      <div class="card-body">
        <div class="text-body-secondary text-end">
          <i class="me-2 fa-regular fa-industry-windows fa-lg fa-2xl icon icon-xxl mt-3"></i>
        </div>
        <div class="fs-4 fw-semibold"><?php echo $data['booked_wgr'] ?></div>
        <div class="small text-body-secondary text-uppercase fw-semibold text-truncate">
          <a class="icon-link icon-link-hover link-secondary link-underline-opacity-0 link-underline-opacity-100-hover" href="/report/booking-wgr">Booked<br>WGR Wellgrow</a>
        </div>
        <div class="progress progress-thin mt-3 mb-0">
          <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.col-->
  <div class="col-6 col-lg-4 col-xl-3 col-xxl-2">
    <div class="card">
      <div class="card-body">
        <div class="text-body-secondary text-end">
          <i class="me-2 fa-regular fa-syringe fa-lg fa-2xl icon icon-xxl mt-3"></i>
        </div>
        <div class="fs-4 fw-semibold"><?php echo $data['vaccinated_bpk'] ?></div>
        <div class="small text-body-secondary text-uppercase fw-semibold text-truncate">
          <a class="icon-link icon-link-hover link-secondary link-underline-opacity-0 link-underline-opacity-100-hover" href="/report/vaccinated-bpk">Vaccinated<br>BPK Amata</a>
        </div>
        <div class="progress progress-thin mt-3 mb-0">
          <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.col-->
  <div class="col-6 col-lg-4 col-xl-3 col-xxl-2">
    <div class="card">
      <div class="card-body">
        <div class="text-body-secondary text-end">
          <i class="me-2 fa-regular fa-syringe fa-lg fa-2xl icon icon-xxl mt-3"></i>
        </div>
        <div class="fs-4 fw-semibold"><?php echo $data['vaccinated_wgr'] ?></div>
        <div class="small text-body-secondary text-uppercase fw-semibold text-truncate">
          <a class="icon-link icon-link-hover link-secondary link-underline-opacity-0 link-underline-opacity-100-hover" href="/report/vaccinated-wgr">Vaccinated<br>WGR Wellgrow</a>
        </div>
        <div class="progress progress-thin mt-3 mb-0">
          <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.col-->
</div>

<div class="row g-4 mt-4">
  <div class="col-6 col-lg-4 col-xl-3 col-xxl-2">
    <div class="card">
      <div class="card-body">
        <div class="text-body-secondary text-end">
          <i class="me-2 fa-regular fa-syringe fa-lg fa-2xl icon icon-xxl mt-3"></i>
        </div>
        <div class="fs-4 fw-semibold"><?php echo $data['vaccinated_all'] ?></div>
        <div class="small text-body-secondary text-uppercase fw-semibold text-truncate">
          <a class="icon-link icon-link-hover link-secondary link-underline-opacity-0 link-underline-opacity-100-hover" href="/report/vaccinated">Vaccinated<br>All</a>
        </div>
        <div class="progress progress-thin mt-3 mb-0">
          <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.col-->
</div>

<!-- <a href="/report/vaccinated">Vaccinated</a> -->