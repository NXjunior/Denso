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

// $this->params['theme'] = 'dark-theme';

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="NextSchool &#8211; ระบบริหารสถานศึกษาครบวงจร">
    <meta name="author" content="Nextgensoft Co., Ltd.">
    <meta name="keyword" content="ระบบริหารสถานศึกษา,ระบบดูแลช่วยเหลือ,ระบบรับสมัครสอบ">
    <title>ระบบรับสมัคร - <?php echo $this->params['siteName'] ?></title>
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
    <link rel="manifest" href="<?php echo $dirAsset . "/assets/favicon/manifest.json" ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo $dirAsset . "/assets/favicon/ms-icon-144x144.png" ?>">
    <meta name="theme-color" content="#ffffff">

    <?php echo Html::csrfMetaTags() ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400;500;800&display=swap" rel="stylesheet">

    <link href="<?php echo $dirAsset . "/css/examples.css" ?>" rel="stylesheet">
    <script src="<?php echo $dirAsset . "/js/config.js" ?> "></script>
    <?php if (!in_array(Yii::$app->controller->id, ['auth', 'register'])) : ?>
        <script src="<?php echo $dirAsset . "/js/color-modes.js" ?> "></script>
    <?php endif ?>
    <link href="<?php echo $dirAsset . "/vendors/@coreui/chartjs/css/coreui-chartjs.css" ?>" rel="stylesheet">

    <?php $this->head() ?>
</head>

<body class="d-flex flex-column vh-100 <?php echo $theme = '' ?>">


    <?php $this->beginBody() ?>
    <?php echo $content ?>
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

    <?php
    $script = <<< JS
    $(document).ready(function(){
        $("input[name='theme-switch']").change(function() {
            const theme = this.value;
            $.post("/site/change-theme", {"theme": theme});
        });
    });
JS;

    $this->registerJs($script, View::POS_END);
    ?>

    <!-- CoreUI and necessary plugins-->
    <script src="<?php echo $dirAsset . "/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js" ?>"></script>
    <script src="<?php echo $dirAsset . "/vendors/simplebar/js/simplebar.min.js" ?>"></script>
    <!-- <script src="<?php echo $dirAsset . "/vendors/i18next/js/i18next.min.js" ?>"></script>
    <script src="<?php echo $dirAsset . "/vendors/i18next-http-backend/js/i18nextHttpBackend.js" ?>"></script>
    <script src="<?php echo $dirAsset . "/vendors/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.js" ?>"></script>
    <script src="<?php echo $dirAsset . "/js/i18next.js" ?>"></script> -->

    <script>
        const header = document.querySelector('header.header');
        document.addEventListener('scroll', () => {
            if (header) {
                header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
            }
        });
    </script>



</body>

</html>
<?php $this->endPage() ?>