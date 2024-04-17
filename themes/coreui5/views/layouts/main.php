<?php

use coreui\assets\AppAsset;
use coreui\assets\CoreUIAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\web\View;

CoreUIAsset::register($this);
AppAsset::register($this);
$dirAsset = Yii::$app->assetManager->getPublishedUrl('@coreui/dist');

$session = Yii::$app->session;
$theme = $session->get('THEME');


?>
<?php $this->beginContent('@coreui/views/layouts/_base.php'); ?>

<?php echo $this->render('_sidebar.php', [
  'dirAsset' => $dirAsset,
  'logoImage' => Yii::$app->params['logoImage'],
  // 'menuItems' => require ('_menu.php'),
]);
?>

<?php $this->beginBody() ?>
<div class="wrapper d-flex flex-column min-vh-100">
  <?php echo $this->render('_header.php', [
    'dirAsset' => $dirAsset,
    'logoImage' => Yii::$app->params['logoImage']
  ]) ?>
  <div class="body flex-grow-1">
    <div class="container-lg px-4">

      <?php if (!$this->disableTitleDisplay) : ?>
        <h2 class="fs-2 mb-2 me-2"><?= Html::encode($this->title) ?> <small class="text-body-secondary"><?= Html::encode($this->meta) ?></small></h2>
        <h3 class="fs-3 mb-4 text-body-secondary"><?= Html::encode($this->subTitle) ?></h3>

      <?php endif ?>

      <?php echo $content ?>
    </div>
  </div>
  <?php echo $this->render('_footer.php', ['dirAsset' => $dirAsset]) ?>
</div>
<?php
#$this->endBody()
?>
<?php $this->endContent(); ?>