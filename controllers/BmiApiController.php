<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/19
 * Time: 16:03
 */

namespace app\controllers;

use Yii;
use app\models\Bmi;

class BmiApiController extends ControllerBase
{
    public function actionCalculate()
    {
        $data = Yii::$app->request->post();
        $name = Yii::$app->request->post('name');
        $sex = Yii::$app->request->post('sex');
        $age = Yii::$app->request->post('age');
        $height = Yii::$app->request->post('height');
        $weight = Yii::$app->request->post('weight');

        $model = new Bmi();
        $model->name = $name;
        $model->sex = $sex;
        $model->age = $age;
        $model->height = $height;
        $model->weight = $weight;

        if ($model->validate()) {

            $cm = $model->height / 100;
            $model->bmi = $model->weight / ($cm * $cm);

            $existed = Bmi::find()
                ->where([
                    'name' => $model->name,
                    'sex' => $model->sex,
                    'age' => $model->age,
                ])
                ->one();

            if ($existed) {
                // update
                $existed->name = $model->name;
                $existed->sex = $model->sex;
                $existed->age = $model->age;
                $existed->height = $model->height;
                $existed->weight = $model->weight;
                $existed->bmi = $model->bmi;
                $existed->save();
            } else {
                // insert
                $result = $model->save(false);
                if (!$result) {
                    return [
                        'code' => 0,
                        'message' => '提交失败'
                    ];
                }
            }

            return [
                'code' => 1,
                'message' => "提交成功",
                'name' => $model->name,
                'sex' => $model->sex,
                'age' => $model->age,
                'height' => $model->height,
                'weight' => $model->weight,
                'bmi' => $model->bmi
            ];
        } else {
            return [
                'code' => 0,
                'message' => current($model->getFirstErrors())
            ];
        }
    }
}