<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\widgets\Select2;
use kartik\date\DatePicker;

/**
 * @var yii\web\View $this
 * @var app\models\RegData $model
 * @var yii\widgets\ActiveForm $form
 */

include_once "__bd_fn.php";
include_once "__bd_kkt.php";

$content_status = [
    'В работе' => 'В работе',
    'Выполнено' => 'Выполнено'
];

$content_vid_raboti = [
    'Первичная регистрация' => 'Первичная регистрация',
    'Перерегистрация' => 'Перерегистрация'
];

?>

<div class="reg-data-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'name' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Наименование компании...', 'maxlength' => 256]],

            'inn' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'ИНН...', 'maxlength' => 12]],

            'adress' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Юридический адрес...', 'maxlength' => 512]],

            'kkt' => ['type' => Form::INPUT_WIDGET, 'widgetClass' => Select2::className(), 'options' => [
                'data' => $content_kkt,
                'options' => ['placeholder' => 'Выберите ККТ из списка ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ]]], 
                // 'options' => ['placeholder' => 'Марка/модель ККТ...', 'maxlength' => 256]],

            'zn_kkt' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Заводской номер ККТ...', 'maxlength' => 32]],

            'fn' => ['type' => Form::INPUT_WIDGET, 'widgetClass' => Select2::className(), 'options' => [
                'data' => $content_fn,
                'options' => ['placeholder' => 'Выберите ФН из списка ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ]]],

            'zn_fn' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Заводской номер ФН...', 'maxlength' => 32]],

            'rnm' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'РНМ...', 'maxlength' => 16]],

            'licens' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Лицензия...', 'maxlength' => 64]],

            'proshivka' => ['type' => Form::INPUT_WIDGET, 'widgetClass' => DatePicker::classname(),'options' => [
                'options' => ['placeholder' => 'Выберите дату'],
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-m-dd'
                ]
            ]],

            'vid_raboti' => ['type' => Form::INPUT_DROPDOWN_LIST, 'items' => $content_vid_raboti],

            'date_reg' => ['type' => Form::INPUT_WIDGET, 'widgetClass' => DatePicker::classname(),'options' => [
                'options' => ['placeholder' => 'Выберите дату'],
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-m-dd',
                    'todayHighlight' => true
                ]
            ]],

            'status' => ['type' => Form::INPUT_DROPDOWN_LIST, 'items' => $content_status],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Сохранить') : Yii::t('app', 'Обновить'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
