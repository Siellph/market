<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organization".
 *
 * @property int $id
 * @property string $name Наименование организации
 * @property string $inn ИНН
 * @property string $adress Юридический адрес
 * @property string $director Должность и руководитель
 * @property string $mesto_ustanovki Место установки
 * @property string $adress_ustanovki Адрес установки
 * @property string $ofd ОФД
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
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование организации',
            'inn' => 'ИНН',
            'adress' => 'Юридический адрес',
            'director' => 'Должность и руководитель',
            'mesto_ustanovki' => 'Место установки',
            'adress_ustanovki' => 'Адрес установки',
            'ofd' => 'ОФД',
        ];
    }

    public function getInn0()
    {
        return $this->hasOne(RegData::className(), ['inn' => 'inn']);
    }
}
