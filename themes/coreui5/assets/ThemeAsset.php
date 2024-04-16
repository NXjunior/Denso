<?php

namespace coreui\assets;

use yii\web\AssetBundle;
use yii\web\View;

class ThemeAsset extends AssetBundle
{
    public $sourcePath = '@coreui/dist';
    public $css = [
        'vendors/simplebar/css/simplebar.css',
        // 'vendors/vendors/simplebar.css',
        'css/font-awesome-6/css/fontawesome.min.css',
        'css/font-awesome-6/css/all.min.css',
        // 'css/style-light.css',
        'css/style-modern.css',
        // 'css/examples.css',
        'css/addon.css',
        'css/custom.css',
        'css/bs-stepper.css',

    ];
    public $js = [
        // 'vendors/@coreui/coreui-pro/js/coreui.bundle.min.js',
        // 'vendors/simplebar/js/simplebar.min.js',
        // 'vendors/i18next/js/i18next.min.js',
        // 'vendors/i18next-http-backend/js/i18nextHttpBackend.js',
        // 'vendors/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.js',
        // 'js/i18next.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapPluginAsset',
        // 'rmrevin\yii\fontawesome\AssetBundle',
    ];

    // public function init()
    // {
    //     $this->jsOptions['position'] = View::POS_BEGIN;
    //     parent::init();
    // }
}
