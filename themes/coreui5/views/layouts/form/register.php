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
<div class="<?php echo "wave-header wave-" . $this->params['waveId'] ?>">
  <header class="header header-sticky mb-4 px-0">

    <span class="header-brand d-none d-lg-block mb-0 h1 ms-4">
      <img src="<?php echo $this->params['logoImage'] ?>" alt="" width="48" height="48" class="d-inline-block align-middle ms-2" alt="School Logo">
      <span data-coreui-i18n="systemName"><?php echo $this->params['siteName'] ?></span>
    </span>

    <span class="header-brand d-lg-none mb-0 h1">
      <img src="<?php echo $this->params['logoImage'] ?>" alt="" width="48" height="48" class="d-inline-block align-middle ms-2" alt="School Logo">
    </span>

    <div class="d-flex ms-3 me-3">
      <h5 class="text-muted mt-0 mb-0 me-3"> <span data-coreui-i18n="location">Location</span> <?php echo $this->params['periodName'] ?></h5>
      <?php echo $this->render('@coreui/views/layouts/_i18next'); ?>
    </div>

    <div class="container-fluid border-top justify-content-end" style="min-height: 3rem;">
      <ul class="nav nav-underline me-2">
        <?php if (user()->changeableBooking()) : ?>
          <li class="nav-item">
            <a class="nav-link" href="/register/change" data-coreui-i18n="changeLocation"><i class="nav-icon fa-regular fa-right-from-bracket"></i> เปลี่ยนสถานที่</a>
          </li>
        <?php endif ?>
        <li class="nav-item">
          <a class="nav-link" href="/site/logout" data-coreui-i18n="signOut"><i class="nav-icon fa-regular fa-right-from-bracket"></i> ออกจากระบบ</a>
        </li>
      </ul>
    </div>
  </header>


  <?php echo $content ?>

  <div class="<?php echo  in_array(Yii::$app->controller->id, ['auth']) || in_array(Yii::$app->controller->action->id, ['index', 'slot', 'qr', 'change']) ? 'fixed-bottom' : '' ?> ">
    <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
      <defs>
        <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
      </defs>
      <g class="parallax">
        <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
        <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
        <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
        <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
      </g>
    </svg>
  </div>
</div>
<?php echo $this->render('@coreui/views/layouts/_footer.php', ['dirAsset' => $dirAsset]) ?>
</div>
<?php $this->endBody() ?>
<?php $this->endContent(); ?>