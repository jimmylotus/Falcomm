<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "exceed".
 *
 * @property integer $id
 * @property string $date
 * @property string $city
 * @property string $major
 * @property string $name
 * @property integer $ca_nums
 * @property integer $valid
 */
class Exceed extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'exceed';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'city', 'major', 'name', 'ca_nums'], 'required'],
            [['date'], 'safe'],
            [['ca_nums', 'valid'], 'integer'],
            [['city', 'major'], 'string', 'max' => 16],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => '日期',
            'city' => '地市',
            'major' => '设备类型',
            'name' => '网元名称',
            'ca_nums' => '告警数量',
            'valid' => '是否有效',
        ];
    }
}
