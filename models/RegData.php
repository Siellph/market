<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reg_data".
 *
 * @property int $id
 * @property string $name Наименование компании
 * @property string|null $inn ИНН
 * @property string $adress Юридический адрес
 * @property string $kkt Марка/модель ККТ
 * @property string $zn_kkt Заводской номер ККТ
 * @property string $fn Наименование ФН
 * @property string $zn_fn Заводской номер ФН
 * @property string|null $rnm Регистрационный номер машины
 * @property string $licens Лицензия
 * @property string|null $proshivka Прошивка
 * @property string $vid_raboti Вид работы
 * @property string $date_reg Дата регистрации
 * @property string $status Статус
 *
 * @property Organization[] $organizations
 */
class RegData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reg_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'adress', 'kkt', 'zn_kkt', 'fn', 'zn_fn', 'licens', 'vid_raboti', 'date_reg'], 'required'],
            [['proshivka', 'date_reg'], 'safe'],
            [['name', 'kkt'], 'string', 'max' => 256],
            [['inn'], 'string', 'max' => 12],
            [['adress', 'fn'], 'string', 'max' => 512],
            [['zn_kkt', 'zn_fn', 'status'], 'string', 'max' => 32],
            [['rnm'], 'string', 'max' => 16],
            [['licens'], 'string', 'max' => 64],
            [['vid_raboti'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование компании',
            'inn' => 'ИНН',
            'adress' => 'Юридический адрес',
            'kkt' => 'Марка/модель ККТ',
            'zn_kkt' => 'Заводской номер ККТ',
            'fn' => 'Наименование ФН',
            'zn_fn' => 'Заводской номер ФН',
            'rnm' => 'Регистрационный номер машины',
            'licens' => 'Лицензия',
            'proshivka' => 'Прошивка',
            'vid_raboti' => 'Вид работы',
            'date_reg' => 'Дата регистрации',
            'status' => 'Статус',
        ];
    }

    /**
     * Gets query for [[Organizations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizations()
    {
        return $this->hasMany(Organization::className(), ['inn' => 'inn']);
    }
}
