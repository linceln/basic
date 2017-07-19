<?php
/**
 * Created by PhpStorm.
 * User: lincoln
 * Date: 13/07/2017
 * Time: 06:56
 */

namespace app\models;

use yii\base\Model;

class EntryForm extends Model
{

    public $name;
    public $email;

    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            ['email', 'email'],
        ];
    }
}