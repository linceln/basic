<?php

/**
 * Created by PhpStorm.
 * User: lincoln
 * Date: 19/07/2017
 * Time: 06:28
 */

namespace app\controllers;

use app\models\BmiForm;
use yii\web\Controller;

class BmiController extends Controller
{
    public function actionCalculate()
    {
        $model = new BmiForm();

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {

            $cm = $model->height / 100;
            $model->bmi = $model->weight / ($cm * $cm);

            \Yii::$app->db->createCommand()->insert('bmi', [
                'name' => $model->name,
                'sex' => $model->sex,
                'age' => $model->age,
                'height' => $model->height,
                'weight' => $model->weight,
                'bmi' => $model->bmi
            ]);
        }

        return $this->render('bmi', [
            'model' => $model
        ]);
    }

}
