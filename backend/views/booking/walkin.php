<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Booking $model */

$this->title = 'Walk In Booking (Existing Employee)';
$this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-create">

  <?php if (Yii::$app->session->hasFlash('existingBooking')) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Oops!</strong> Existing Booking <?php echo Html::a('View Booking', ['/booking/view', 'id' => Yii::$app->session->getFlash('existingBookingId')]) ?>
      <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <?= $this->render('_form_walkin', [
    'model' => $model,
  ]) ?>

</div>