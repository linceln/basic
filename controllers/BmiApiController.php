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

        $model = new Bmi();
        $model->name = $data['name'];
        $model->sex = $data['sex'];
        $model->age = $data['age'];
        $model->height = $data['height'];
        $model->weight = $data['weight'];

        $cm = $model->height / 100;
        $model->bmi = $model->weight / ($cm * $cm);

        if ($model->validate()) {
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