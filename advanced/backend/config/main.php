<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'defaultRoute' => 'index',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

       /* 'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
//                'catchAll' => 'index/add',
                #-----------登录--------------#
                'login'=>'login/login',
                #-----------产品管理--------------#
                'category_type'=>'category/category_type',                      //产品分类展示
                'category_type_add'=>'category/category_type_add',              //产品分类添加
                'category_type_del'=>'category/category_type_del',              //产品分类删除
                'category_list'=>'category/category_list',                      //产品展示
                'category_list_add'=>'category/category_list_add',              //产品添加
                'category_list_del'=>'category/category_list_del',              //产品删除
                #-----------订单管理--------------#

            ],
        ],*/

    ],
    'params' => $params,
];
