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

// $this->params['theme'] = 'light-theme';

?>
<?php $this->beginContent('@coreui/views/layouts/admission/_base.php'); ?>

<?php echo $this->render('_sidebar.php', [
  'dirAsset' => $dirAsset,
  'logoImage' => $this->params['logoImage'],
  // 'menuItems' => require ('_menu.php'),
]);
?>

<?php $this->beginBody() ?>
<div class="wrapper d-flex flex-column min-vh-100">
  <?php echo $this->render('_header.php', [
    'dirAsset' => $dirAsset,
    // 'schoolModel' => $schoolModel,
    'logoImage' => $this->params['logoImage']
  ]) ?>
  <div class="body flex-grow-1">
    <div class="container-lg px-4">

      <?php if (!$this->disableTitleDisplay) : ?>
        <h2 class="fs-2 mt-1 mb-4"><?= Html::encode($this->title) ?></h2>
      <?php endif ?>

      <?php echo $content ?>

    </div>
  </div>
  <?php echo $this->render('_footer.php', ['dirAsset' => $dirAsset]) ?>

</div>
<?php $this->endBody() ?>
<?php $this->endContent(); ?>