<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%vacancies}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $short_description
 * @property string $description
 * @property integer $status
 * @property string $date
 */
class Vacancies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%vacancies}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'short_description', 'description', 'status'], 'required'],
            [['short_description', 'description'], 'string'],
            [['status'], 'integer'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 255],
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
            'short_description' => 'Short Description',
            'description' => 'Description',
            'status' => 'Status',
            'date' => 'Date',
        ];
    }


    public static function getAll()
    {
        $data = self::find()->all();
        return $data;
    }

    public static function getOne($id)
    {
        $data = self::find()
            ->where(['id'=>$id])
            ->one();
        return $data;
    }
}
