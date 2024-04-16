<?php
if (extension_loaded('apcu')) {
    $cacheSetting = [
        'class' => 'yii\caching\ApcCache',
        'useApcu' => extension_loaded('apcu') ? true : null,
    ];
    $sessionSetting = [];
} else {
    $cacheSetting = [
        'class' => 'yii\caching\FileCache'
    ];
    $sessionSetting = [];
}

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'timeZone' => 'Asia/Bangkok',
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'formatter' => [
            'defaultTimeZone' => 'Asia/Bangkok',
            'dateFormat' => 'dd MMMM yyyy',
        ],
        'date' => [
            'class' => 'common\components\NgDate',
        ],
        'cache' => $cacheSetting,
    ],
];
