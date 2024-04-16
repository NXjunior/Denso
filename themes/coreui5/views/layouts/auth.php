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
$theme = 'light';
$this->params['theme'] = 'light-theme';

?>
<?php $this->beginContent('@coreui/views/layouts/_base.php'); ?>

<?php $this->beginBody() ?>
<div class="wrapper d-flex flex-column min-vh-100">
  <?php echo $content ?>
  <?php echo $this->render('_footer.php', ['dirAsset' => $dirAsset]) ?>
</div>
<?php $this->endBody() ?>
<?php $this->endContent(); ?>