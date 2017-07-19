<?php

/**
 * Created by PhpStorm.
 * User: lincoln
 * Date: 19/07/2017
 * Time: 06:28
 */

namespace app\controllers;

use Yii;
use app\models\Bmi;
use yii\web\Controller;

class BmiController extends Controller
{
    public function actionCalculate()
    {
        $model = new Bmi();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

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
                $existed->name = $model->name;
                $existed->sex = $model->sex;
                $existed->age = $model->age;
                $existed->height = $model->height;
                $existed->weight = $model->weight;
                $existed->bmi = $model->bmi;
                $existed->save();
            } else {
                $result = $model->save(false);
                if (!$result) {
                    return "保存失败";
                }
            }
        }

        return $this->render('bmi', [
            'model' => $model
        ]);
    }
}
