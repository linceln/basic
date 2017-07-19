<?php

namespace app\controllers;

use Yii;
use yii\rest\Controller;
use yii\filters\auth\CompositeAuth;
use yii\filters\ContentNegotiator;
use yii\filters\RateLimiter;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\filters\auth\QueryParamAuth;
use yii\filters\AccessControl;
use api\filters\TokenAuth;

class ControllerBase extends Controller
{
    public function init()
    {
        parent::init();
    }

    // 默认禁止访问所有方法
    public function rules()
    {
        return [
            [
                'allow' => true,
            ]
        ];
    }

    public function behaviors()
    {
        $behaviors = [
            'contentNegotiator' => [
                'class' => ContentNegotiator::className(),
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
            'verbFilter' => [
                'class' => VerbFilter::className(),
                'actions' => $this->verbs(),
            ],
            'rateLimiter' => [
                'class' => RateLimiter::className(),
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => $this->rules()
            ],
        ];
        return $behaviors;
    }
}
