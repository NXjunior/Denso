<?php

use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = Yii::$app->date->date('วันl j F Y', strtotime($model->slot_date));
$this->meta = substr($model->time_start, 0, 5) . ' - ' .  substr($model->time_end, 0, 5);
$this->subTitle = $model->note;

$this->params['breadcrumbs'][] = ['label' => $model->period->company->name, 'url' => ['/denso']];
$this->params['breadcrumbs'][] = ['label' => $model->period->name, 'url' => ['/denso/period/' . $model->period->id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>

<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <div class="card-body p-3">
        <div class="example">
          <nav>
            <div class="nav nav-tabs " id="nav-tab" role="tablist">
              <button class="nav-link active" id="nav-slot-tab" data-coreui-toggle="tab" data-coreui-target="#nav-slot" type="button" role="tab" aria-controls="nav-slot" aria-selected="true">This Slot</button>
              <button class="nav-link" id="nav-date-tab" data-coreui-toggle="tab" data-coreui-target="#nav-date" type="button" role="tab" aria-controls="nav-date" aria-selected="false">This Date</button>
            </div>
          </nav>
          <div class="tab-content rounded-bottom">
            <div class="tab-pane p-3 fade show active" id="nav-slot" role="tabpanel" aria-labelledby="nav-slot-tab" tabindex="0">
              <div class=" row g-4">
                <div class="col-6 col-lg-4 col-xl-3 col-xxl-2">
                  <div class="card">
                    <div class="card-body">
                      <div class="text-body-secondary text-end">
                        <i class="fa-regular fa-users fa-2xl"></i>
                      </div>
                      <div class="fs-4 fw-semibold">87.500</div>
                      <div class="small text-body-secondary text-uppercase fw-semibold text-truncate">Quota</div>
                      <div class="progress progress-thin mt-3 mb-0">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-6 col-lg-4 col-xl-3 col-xxl-2">
                  <div class="card">
                    <div class="card-body">
                      <div class="text-body-secondary text-end">
                        <i class="fa-regular fa-users fa-2xl"></i>
                      </div>
                      <div class="fs-4 fw-semibold">385</div>
                      <div class="small text-body-secondary text-uppercase fw-semibold text-truncate">Booked</div>
                      <div class="progress progress-thin mt-3 mb-0">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-6 col-lg-4 col-xl-3 col-xxl-2">
                  <div class="card">
                    <div class="card-body">
                      <div class="text-body-secondary text-end">
                        <i class="fa-regular fa-users fa-2xl"></i>
                      </div>
                      <div class="fs-4 fw-semibold">1238</div>
                      <div class="small text-body-secondary text-uppercase fw-semibold text-truncate">Visitors</div>
                      <div class="progress progress-thin mt-3 mb-0">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-6 col-lg-4 col-xl-3 col-xxl-2">
                  <div class="card">
                    <div class="card-body">
                      <div class="text-body-secondary text-end">
                        <i class="fa-regular fa-users fa-2xl"></i>
                      </div>
                      <div class="fs-4 fw-semibold">28%</div>
                      <div class="small text-body-secondary text-uppercase fw-semibold text-truncate">Walk-in</div>
                      <div class="progress progress-thin mt-3 mb-0">
                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-6 col-lg-4 col-xl-3 col-xxl-2">
                  <div class="card">
                    <div class="card-body">
                      <div class="text-body-secondary text-end">
                        <i class="fa-regular fa-users fa-2xl"></i>
                      </div>
                      <div class="fs-4 fw-semibold">5:34:11</div>
                      <div class="small text-body-secondary text-uppercase fw-semibold text-truncate">Cancel</div>
                      <div class="progress progress-thin mt-3 mb-0">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-6 col-lg-4 col-xl-3 col-xxl-2">
                  <div class="card">
                    <div class="card-body">
                      <div class="text-body-secondary text-end">
                        <i class="fa-regular fa-users fa-2xl"></i>
                      </div>
                      <div class="fs-4 fw-semibold">972</div>
                      <div class="small text-body-secondary text-uppercase fw-semibold text-truncate">Completed</div>
                      <div class="progress progress-thin mt-3 mb-0">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="tab-pane p-3 fade" id="nav-date" role="tabpanel" aria-labelledby="nav-date-tab" tabindex="0">
              <div class="row g-4">
                <div class="col-6 col-lg-4 col-xl-3 col-xxl-2">
                  <div class="card text-white bg-info">
                    <div class="card-body">
                      <div class="text-white text-opacity-75 text-end">
                        <i class="fa-regular fa-users fa-2xl"></i>
                      </div>
                      <div class="fs-4 fw-semibold">87.500</div>
                      <div class="small text-white text-opacity-75 text-uppercase fw-semibold text-truncate">Visitors</div>
                      <div class="progress progress-white progress-thin mt-3">
                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-6 col-lg-4 col-xl-3 col-xxl-2">
                  <div class="card text-white bg-success">
                    <div class="card-body">
                      <div class="text-white text-opacity-75 text-end">
                        <i class="fa-regular fa-users fa-2xl"></i>
                      </div>
                      <div class="fs-4 fw-semibold">385</div>
                      <div class="small text-white text-opacity-75 text-uppercase fw-semibold text-truncate">New Clients</div>
                      <div class="progress progress-white progress-thin mt-3">
                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-6 col-lg-4 col-xl-3 col-xxl-2">
                  <div class="card text-white bg-warning">
                    <div class="card-body">
                      <div class="text-white text-opacity-75 text-end">
                        <i class="fa-regular fa-users fa-2xl"></i>
                      </div>
                      <div class="fs-4 fw-semibold">1238</div>
                      <div class="small text-white text-opacity-75 text-uppercase fw-semibold text-truncate">Products sold</div>
                      <div class="progress progress-white progress-thin mt-3">
                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-6 col-lg-4 col-xl-3 col-xxl-2">
                  <div class="card text-white bg-primary">
                    <div class="card-body">
                      <div class="text-white text-opacity-75 text-end">
                        <i class="fa-regular fa-users fa-2xl"></i>
                      </div>
                      <div class="fs-4 fw-semibold">28%</div>
                      <div class="small text-white text-opacity-75 text-uppercase fw-semibold text-truncate">Returning Visitors</div>
                      <div class="progress progress-white progress-thin mt-3">
                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-6 col-lg-4 col-xl-3 col-xxl-2">
                  <div class="card text-white bg-danger">
                    <div class="card-body">
                      <div class="text-white text-opacity-75 text-end">
                        <i class="fa-regular fa-users fa-2xl"></i>
                      </div>
                      <div class="fs-4 fw-semibold">5:34:11</div>
                      <div class="small text-white text-opacity-75 text-uppercase fw-semibold text-truncate">Avg. Time</div>
                      <div class="progress progress-white progress-thin mt-3">
                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-6 col-lg-4 col-xl-3 col-xxl-2">
                  <div class="card text-white bg-info">
                    <div class="card-body">
                      <div class="text-white text-opacity-75 text-end">
                        <i class="fa-regular fa-users fa-2xl"></i>
                      </div>
                      <div class="fs-4 fw-semibold">972</div>
                      <div class="small text-white text-opacity-75 text-uppercase fw-semibold text-truncate">Comments</div>
                      <div class="progress progress-white progress-thin mt-3">
                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="card mb-3">
  <div class="card-body">
    <h5 class="card-title">booked list</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Button</a>
  </div>
</div>