<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Activity;
use \kartik\form\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Booking $model */

$this->title = 'Booking Search';
$this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => ['index']];

if (isset($model->id))
  $this->params['breadcrumbs'][] = ['label' => 'Booking Search', 'url' => ['/booking/qr']];
else
  $this->params['breadcrumbs'][] = $this->title;


\yii\web\YiiAsset::register($this);

//1641316|1|2|268
?>



<div class="container align-middle mb-5 pb-5">
  <?php $form = ActiveForm::begin([
    'id' => 'booking-search-form',
    'options' => ['class' => 'needs-validation novalidate', 'novalidate' => true],
    'bsVersion' => 5
  ]);
  ?>
  <div class="row">
    <div class="col-12">
      <?php if (Yii::$app->session->hasFlash('qrError')) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Oops!</strong> <span data-coreui-i18n="qrError">Not Found QR Code</span>
          <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <?php if (Yii::$app->session->hasFlash('notFoundBooking')) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Oops!</strong> <span data-coreui-i18n="qrError">Not Found Booking</span>
          <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>



      <div class="input-group input-group-lg mt-4 mb-5">
        <span class="input-group-text"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></span>
        <input type="text" class="form-control" name="qr-data" aria-label="Sizing example input" aria-describedby="qr-data">
      </div>
    </div>
  </div>

  <?php ActiveForm::end(); ?>

  <?php
  if (isset($model->id))
    echo $this->render('view', [
      'model' => $model,
      'partial' => true
    ]);
  ?>
</div>