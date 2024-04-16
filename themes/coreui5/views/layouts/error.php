<?php

use coreui\assets\AppAsset;
use coreui\assets\CoreUIAsset;
use yii\helpers\Html;

CoreUIAsset::register($this);
AppAsset::register($this);
$dirAsset = Yii::$app->assetManager->getPublishedUrl('@coreui/dist');


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <base href="./">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="description" content="LifeDiag &#8211; ระบบจองเวลาฉีดวัคซีน">
  <meta name="keyword" content="ระบบรับสมัครสอบ,ระบบจองเวลาฉีดวัคซีน,ระบบดูแลช่วยเหลือ">
  <title>ระบบจองเวลาฉีดวัคซีน</title>
  <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $dirAsset . "/assets/favicon/apple-icon-57x57.png" ?>">
  <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $dirAsset . "/assets/favicon/apple-icon-60x60.png" ?>">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $dirAsset . "/assets/favicon/apple-icon-72x72.png" ?>">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $dirAsset . "/assets/favicon/apple-icon-76x76.png" ?>">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $dirAsset . "/assets/favicon/apple-icon-114x114.png" ?>">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $dirAsset . "/assets/favicon/apple-icon-120x120.png" ?>">
  <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $dirAsset . "/assets/favicon/apple-icon-144x144.png" ?>">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $dirAsset . "/assets/favicon/apple-icon-152x152.png" ?>">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $dirAsset . "/assets/favicon/apple-icon-180x180.png" ?>">
  <link rel="icon" type="image/png" sizes="192x192" href="<?php echo $dirAsset . "/assets/favicon/android-icon-192x192.png" ?>">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $dirAsset . "/assets/favicon/favicon-32x32.png" ?>">
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $dirAsset . "/assets/favicon/favicon-96x96.png" ?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $dirAsset . "/assets/favicon/favicon-16x16.png" ?>">
  <link rel="shortcut icon" href="<?php echo $dirAsset . "/assets/favicon/favicon.ico" ?>" type="image/x-icon">
  <link rel="icon" href="<?php echo $dirAsset . "/assets/favicon/favicon.ico" ?>" type="image/x-icon">
  <link rel="manifest" href="<?php echo $dirAsset . "/assets/favicon/manifest.json" ?>">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="<?php echo $dirAsset . "assets/favicon/ms-icon-144x144.png" ?>">
  <meta name="theme-color" content="#ffffff">

  <?php echo Html::csrfMetaTags() ?>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400;500;800&display=swap" rel="stylesheet">


  <?php $this->head() ?>
</head>

<body class="d-flex flex-column vh-100">

  <?php $this->beginBody() ?>

  <div class="bg-light min-vh-100 d-flex flex-row align-items-center dark:bg-transparent">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="clearfix">
            <h1 class="float-start display-3 me-4"><?php echo Yii::$app->errorHandler->exception->statusCode ?></h1>
            <h4 class="pt-3">Oops!.</h4>
            <p class="text-medium-emphasis">The page you are looking for was error.</p>
          </div>
          <?php echo $content ?>
          <a href="/" class="btn btn-primary mt-5">Go Back</a>
        </div>
      </div>
    </div>
  </div>

  <?php $this->endBody() ?>
  <script>
    if (document.body.classList.contains('dark-theme')) {
      var element = document.getElementById('btn-dark-theme');
      if (typeof(element) != 'undefined' && element != null) {
        document.getElementById('btn-dark-theme').checked = true;
      }
    } else {
      var element = document.getElementById('btn-light-theme');
      if (typeof(element) != 'undefined' && element != null) {
        document.getElementById('btn-light-theme').checked = true;
      }
    }

    function handleThemeChange(src) {
      var event = document.createEvent('Event');
      event.initEvent('themeChange', true, true);

      if (src.value === 'light') {
        document.body.classList.remove('dark-theme');
      }
      if (src.value === 'dark') {
        document.body.classList.add('dark-theme');
      }
      document.body.dispatchEvent(event);
    }
  </script>

</body>

</html>
<?php $this->endPage() ?>