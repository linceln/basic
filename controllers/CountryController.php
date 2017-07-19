<?php
/**
 * Created by PhpStorm.
<<<<<<< HEAD
 * User: Administrator
 * Date: 2017/7/14
 * Time: 14:01
 */
=======
 * User: lincoln
 * Date: 14/07/2017
 * Time: 06:42
 */

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Country;

class CountryController extends Controller
{
    public function actionIndex()
    {
        $query = Country::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $countries = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'countries' => $countries,
            'pagination' => $pagination,
        ]);
    }
}
>>>>>>> 2a4c595c8e3aa85148e8ac2212e5b7bd62c7c798
