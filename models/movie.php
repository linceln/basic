<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Movie".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 */
class movie extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Movie';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'title', 'description'], 'required'],
            [['id'], 'integer'],
            [['title'], 'string', 'max' => 20],
            [['description'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
        ];
    }
}
