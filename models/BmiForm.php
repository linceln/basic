<?php
/**
 * Created by PhpStorm.
 * User: lincoln
 * Date: 19/07/2017
 * Time: 06:38
 */

namespace app\models;

use yii\db\ActiveRecord;

class BmiForm extends ActiveRecord
{
    public $name;
    public $sex;
    public $age;
    public $height;
    public $weight;
    public $bmi;

    public function rules()
    {
        return [
            [['name', 'sex', 'age', 'height', 'weight'], 'trim'],
            ['name', 'required', 'message' => '请输入姓名'],
            ['sex', 'required', 'message' => '请输入性别'],
            ['age', 'required', 'message' => '请输入年龄'],
            ['height', 'required', 'message' => '请输入身高'],
            ['weight', 'required', 'message' => '请输入体重']
        ];
    }
}