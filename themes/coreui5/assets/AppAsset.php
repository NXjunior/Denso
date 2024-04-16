<?php

namespace coreui\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';

    public $js = [
        // 'https://www.gstatic.com/firebasejs/4.6.2/firebase-app.js',
        // 'https://www.gstatic.com/firebasejs/4.6.2/firebase-auth.js',
    ];

    public $css = [];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap5\BootstrapAsset',
    ];
}
