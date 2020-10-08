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
 * @property RegData $inn0
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
            [['name', 'inn', 'adress', 'director', 'mesto_ustanovki', 'adress_ustanovki', 'ofd'], 'required'],
            [['name', 'ofd'], 'string', 'max' => 256],
            [['inn'], 'string', 'max' => 12],
            [['adress', 'director', 'adress_ustanovki'], 'string', 'max' => 512],
            [['mesto_ustanovki'], 'string', 'max' => 64],
            [['inn'], 'unique'],
            [['inn'], 'exist', 'skipOnError' => true, 'targetClass' => RegData::className(), 'targetAttribute' => ['inn' => 'inn']],
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
            'mesto_ustanovki' => 'Место установки',
            'adress_ustanovki' => 'Адрес установки',
            'ofd' => 'ОФД',
        ];
    }

    /**
     * Gets query for [[Inn0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInn0()
    {
        return $this->hasOne(RegData::className(), ['inn' => 'inn']);
    }
}
