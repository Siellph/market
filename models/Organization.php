<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organization".
 *
 * @property string $name Наименование организации
 * @property string $inn ИНН
 * @property string $adress Юридический адрес
 * @property string $director Должность и руководитель
 * @property string $mesto_ustanovki Место установки
 * @property string $adress_ustanovki Адрес установки
 * @property string $ofd ОФД
 *
 * @property RegData[] $regDatas
 */
class Organization extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organization';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'inn', 'adress', 'director', 'ofd'], 'required'],
            [['name', 'ofd'], 'string', 'max' => 256],
            [['inn'], 'string', 'max' => 12],
            [['adress', 'director'], 'string', 'max' => 512],
            [['inn'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Наименование организации',
            'inn' => 'ИНН',
            'adress' => 'Юридический адрес',
            'director' => 'Должность и руководитель',
            'ofd' => 'ОФД',
        ];
    }

    /**
     * Gets query for [[RegDatas]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getRegDatas()
    {
        return $this->hasMany(RegData::className(), ['inn' => 'inn']);
    }
}
