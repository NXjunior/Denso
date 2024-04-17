<?php

use yii\helpers\Html;
use common\models\Slot;


/** @var yii\web\View $this */
//https://www.bootdey.com/snippets/tagged/schedule
$this->title = $model->company->name . ' : ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => $model->company->name, 'url' => ['/denso']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$rows = '';
foreach ($slots as $slot) {

  $rowInfo = '';
  $sumQuota = $sumBooked = $sumVisited = $sumAvailable = 0;
  foreach ($slot['slots'] as $slotInfoKey => $slotInfoValue) {
    $sumQuota += $slotInfoValue['quota'];
    $sumBooked += $slotInfoValue['booked'];
    $sumVisited += $slotInfoValue['visited'];
    $slotAvailable = $slotInfoValue['quota'] - $slotInfoValue['booked'];
    $sumAvailable += $slotAvailable;

    if ($slotInfoKey === Slot::BREAK_TIME_START) {
      $rowInfo .= '<td class="px-0 align-middle bg-body-tertiary">
                <span class="badge text-bg-light fs-6 fw-normal px-2">Break</span>
              </td>';
    } else {
      $infoButton =  Html::a('ข้อมูล', ['/denso/slot/' . $slotInfoValue['id']], ['class' => 'btn btn-light']);
      $infoButton = '';

      $slotAvailableStyle = '';
      if ($slotAvailable == 0) {
        $slotAvailableStyle = 'btn-outline-secondary';
      } else if ($slotAvailable != $slotInfoValue['quota']) {
        $slotAvailableStyle = 'bg-sky text-white';
      } else {
        $slotAvailableStyle = 'btn-outline-primary';
      }

      $rowInfo .= '<td class="active">
                  <h4><span class="badge bg-primary text-white fw-normal fs-5 px-3">' . $slotInfoValue['quota'] . '</span></h4>

                  <h4><span class="btn fs-5 ' . $slotAvailableStyle . ' fw-normal px-3 py-0">' . $slotAvailable . '</span></h4>

                  <div class="btn ' . ($slotInfoValue['booked'] > 0 ? 'btn-info text-white' : 'btn-outline-info') . '  py-0 fs-5">' . $slotInfoValue['booked'] . '</div>
                  <div class="btn ' . ($slotInfoValue['visited'] > 0 ? 'btn-warning text-white' : 'btn-outline-warning') . ' py-0 fs-5">' . $slotInfoValue['visited'] . '</div>

                  <div class="hover border border-white border-4 shadow rounded-3 bg-sky py-2 px-2">
                    <span class="badge bg-transparent text-white fs-5 fw-normal px-3 py-1">' . Yii::$app->date->date('l j F', strtotime($slot['date'])) . '</span>
                    <span class="badge bg-transparent text-white fs-5 fw-normal px-3 py-1">' . $slotInfoValue['time_start'] . ' - ' . $slotInfoValue['time_end'] . '</span>
                    <span class="badge bg-transparent text-white fs-4 fw-normal px-3 py-1">โควต้า ' . $slotInfoValue['quota'] . ' คิว</span>
                    <div class="fs-4">จอง ' . $slotInfoValue['booked'] . ' คิว</div>
                    <div class="fs-4 text-white">มาแล้ว ' . $slotInfoValue['visited'] . ' คน</div>
                    <div class="d-grid gap-2 col-6 mx-auto">' . $infoButton . '</div>

                  </div>
                </td>';
    }
  }

  $rowDate = '<td>
                <h4><span class="badge text-bg-primary text-white fw-normal fs-5 px-3">' . $sumQuota . '</span></h4>
                <div class="fs-5">' . Yii::$app->date->date('วันl', strtotime($slot['date'])) . '</div>
                <div class="fs-5">' . Yii::$app->date->date('j F', strtotime($slot['date'])) . '</div>
                <small class="text-muted">' . $slot['note'] ?? '' . '</small>
              </td>';

  $rowSummary = '<td class="bg-body-secondary">
                  <h4><span class="badge bg-primary text-white fw-normal fs-5 px-3">' . $sumQuota . '</span></h4>
                  <h4><span class="btn fs-5 ' . ($sumAvailable != $sumQuota ? 'bg-sky text-white' : 'btn-outline-primary') . ' fw-normal px-3 py-0">' . $sumAvailable . '</span></h4>
                  <div class="btn ' . ($sumBooked > 0 ? 'btn-info text-white' : 'btn-outline-info') . '  py-0 fs-5">' . $sumBooked . '</div>
                  <div class="btn ' . ($sumVisited > 0 ? 'btn-warning text-white' : 'btn-outline-warning') . ' py-0 fs-5">' . $sumVisited . '</div>
                </td>';

  $rows .= '<tr>' . $rowDate . $rowInfo . $rowSummary . '</tr>';
}

$p = $_GET['p'] ?? null;
switch ($p) {
  case 'today':
    $partition = 'today';
    break;
  case '5day':
    $partition = '5day';
    break;
  case 'latest':
    $partition = 'latest';
    break;
  default:
    $partition = 'all';
    break;
}

?>
<div class="btn-group mb-4" role="group" aria-label="Default button group">
  <a type="button" class="btn btn-outline-primary active">All</a>
  <a type="button" class="btn btn-outline-primary disabled">Latest</a>
  <a type="button" class="btn btn-outline-primary disabled">To Day</a>
  <a type="button" class="btn btn-outline-primary disabled">5 Days</a>
</div>

<div class="row g-4">
  <!-- <div class="col-12 col-sm-6 col-xl-3 col-xxl-3 mb-4">
    <div class="list-group">
      <?php foreach ($allSlotDate as $slotDate) : ?>
        <a href="#" class="list-group-item list-group-item-action" aria-current="true">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1"><?php echo Yii::$app->date->date('j F Y', strtotime($slotDate['slot_date'])) ?></h5>
            <span class="badge text-bg-primary text-white rounded-pill fs-6 fw-normal"><?php echo $slotDate['booked'] ?>/<?php echo $slotDate['quota'] ?></span>
          </div>
          <p class="mb-1"><?php echo Yii::$app->date->date('วันl', strtotime($slotDate['slot_date'])) ?></p>
          <small class="text-white badge text-bg-secondary"><?php echo $slotDate['note'] ?></small>
        </a>
      <?php endforeach ?>
    </div>
  </div> -->
  <div class="col-12 col-sm-12 col-xl-12 col-xxl-12 mb-4">
    <div class="table-responsive slot-table">
      <table class="table table-bordered text-center mb-5">
        <thead>
          <tr class="bg-light-gray">
            <th class="align-middle text-uppercase">Date/Slot</th>
            <th class="text-uppercase">1<br /><small class="fw-normal">08-09 น.</small></th>
            <th class="text-uppercase">2<br /><small class="fw-normal">09-10 น.</small></th>
            <th class="text-uppercase">3<br /><small class="fw-normal">10-11 น.</small></th>
            <th class="text-uppercase">4<br /><small class="fw-normal">11-12 น.</small></th>
            <th class="text-uppercase">5<br /><small class="fw-normal">12-13 น.</small></th>
            <th class="text-uppercase px-0">6<br /><small class="fw-normal">13-14 น.</small></th>
            <th class="text-uppercase">7<br /><small class="fw-normal">14-15 น.</small></th>
            <th class="text-uppercase">8<br /><small class="fw-normal">15-16 น.</small></th>
            <th class="text-uppercase">9<br /><small class="fw-normal">16-17 น.</small></th>
            <th class="text-uppercase align-middle">Total</th>
          </tr>
        </thead>
        <tbody>
          <?php echo $rows ?>
        </tbody>
      </table>
    </div>
  </div>
</div>