<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "bmi".
 *
 * @property integer $id
 * @property string $name
 * @property string $sex
 * @property integer $age
 * @property double $height
 * @property double $weight
 * @property double $bmi
 */
class Bmi extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bmi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'age'], 'integer'],
            [['height', 'weight'], 'number'],
            [['name'], 'string', 'max' => 16],
            [['sex'], 'string', 'max' => 8],
            [['name', 'sex', 'age', 'height', 'weight'], 'trim'],
            ['name', 'required', 'message' => '请输入姓名'],
            ['sex', 'required', 'message' => '请输入性别'],
            ['age', 'required', 'message' => '请输入年龄'],
            ['height', 'required', 'message' => '请输入身高'],
            ['weight', 'required', 'message' => '请输入体重']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'sex' => 'Sex',
            'age' => 'Age',
            'height' => 'Height',
            'weight' => 'Weight',
            'bmi' => 'BMI'
        ];
    }
}
