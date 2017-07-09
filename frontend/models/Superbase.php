<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "superbase".
 *
 * @property integer $id
 * @property string $city
 * @property string $area
 * @property string $name
 * @property string $manu
 */
class Superbase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'superbase';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city', 'area', 'name', 'manu'], 'required'],
            [['city'], 'string', 'max' => 10],
            [['area', 'manu'], 'string', 'max' => 20],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city' => 'City',
            'area' => 'Area',
            'name' => 'Name',
            'manu' => 'Manu',
        ];
    }
}
