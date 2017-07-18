<?php

// comment out the following two lines when deployed to production

// YII_DEBUG：是否运行在调试模式，默认为 false
defined('YII_DEBUG') or define('YII_DEBUG', true);

// YII_ENV：应用运行的环境， 默认为 'prod'，表示线上产品环境
defined('YII_ENV') or define('YII_ENV', 'dev');

// YII_ENABLE_ERROR_HANDLER：是否启用 Yii 提供的错误处理，默认为 true

// 注册 Composer 自动加载器  
require(__DIR__ . '/../vendor/autoload.php');

// 包含 Yii 类文件
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

// 加载应用配置  
$config = require(__DIR__ . '/../config/web.php');

// 创建、配置、运行一个应用  
(new yii\web\Application($config))->run();
