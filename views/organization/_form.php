<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\widgets\Select2;

/**
 * @var yii\web\View $this
 * @var app\models\Organization $model
 * @var yii\widgets\ActiveForm $form
 */
include_once "__bd_ofd.php"
?>

<div class="organization-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'name' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Наименование организации...', 'maxlength' => 256]],

            'inn' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter ИНН...', 'maxlength' => 12]],

            'adress' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Юридический адрес...', 'maxlength' => 512]],

            'director' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Должность и руководитель...', 'maxlength' => 512]],

            'ofd' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter ОФД...', 'maxlength' => 256]],

            'ofd' => ['type' => Form::INPUT_WIDGET, 'widgetClass' => Select2::className(), 'options' => [
                'data' => $content_ofd,
                'options' => ['placeholder' => 'Выберите ОФД из списка ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ]]], 

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Сохранить') : Yii::t('app', 'Обновить'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
