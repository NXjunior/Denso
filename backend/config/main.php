<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'name' => 'Booking Backend',
    'language' => 'th-TH',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
            // enter optional module parameters below - only if you need to
            // use your own export download action or custom translation
            // message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ]
    ],
    'components' => [
        'assetManager' => [
            'bundles' => [
                'kartik\form\ActiveFormAsset' => [
                    'bsDependencyEnabled' => false // do not load bootstrap assets for a specific asset bundle
                ],
                'kartik\file\FileInputAsset' => [
                    'bsDependencyEnabled' => false
                ],
                'kartik\icons\FontAwesomeAsset' => [
                    'sourcePath' => '@vendor/fortawesome/font-awesome',
                ],
                'yii\web\JqueryAsset' => [
                    'js' => [
                        YII_ENV_DEV ? 'jquery.js' : 'jquery.min.js',
                    ],
                ],
            ],
        ],
        'view' => [
            'class' => 'common\components\NgView',
            'theme' => [
                'basePath' => '@coreui/dist',
                'baseUrl' => '@coreui/dist',
                'pathMap' => [
                    '@app/views' => '@coreui/views',
                ],
            ],
        ],
        'formatter' => [
            'class' => 'common\components\NgFormatter',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'showScriptName' => false,
            'enablePrettyUrl' => true,
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<id:\d+>' => '<module>/<controller>/view',
                '<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<module>/<action>',
                '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
            ),
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
            'class' => 'yii\web\CacheSession',
            'cookieParams' => ['lifetime' => 30 * 24 * 60 * 60],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'i18n' => array(
            'translations' => array(
                'kvdrp' => array(
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => "@common/messages",
                    'sourceLanguage' => 'en_US',
                    'fileMap' => array(
                        'kvdrp' => 'kvdrp.php',
                    ),
                ),
                'kvexport' => array(
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => "@common/messages",
                    'sourceLanguage' => 'en_US',
                    'fileMap' => array(
                        'kvexport' => 'kvexport.php',
                    ),
                ),
                'kvgrid' => array(
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => "@common/messages",
                    'sourceLanguage' => 'en_US',
                    'fileMap' => array(
                        'kvgrid' => 'kvgrid.php',
                    ),
                ),
                'kvdatetime' => array(
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => "@common/messages",
                    'sourceLanguage' => 'en_US',
                    'fileMap' => array(
                        'kvgrid' => 'kvdatetime.php',
                    ),
                ),
                'kvdate' => array(
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => "@common/messages",
                    'sourceLanguage' => 'en_US',
                    'fileMap' => array(
                        'kvgrid' => 'kvdate.php',
                    ),
                ),
                'yii' => array(
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => "@common/messages",
                    'sourceLanguage' => 'en_US',
                    'fileMap' => array(
                        'yii' => 'yii.php',
                    ),
                ),
                'app' => array(
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => "@common/messages",
                    'sourceLanguage' => 'en_US',
                    'fileMap' => array(
                        'app' => 'app.php',
                    ),
                ),
            ),
        ),
    ],
    'params' => $params,
];
