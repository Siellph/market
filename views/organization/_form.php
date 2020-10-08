<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\Organization $model
 * @var yii\widgets\ActiveForm $form
 */
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

            'mesto_ustanovki' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Место установки...', 'maxlength' => 64]],

            'adress_ustanovki' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Адрес установки...', 'maxlength' => 512]],

            'ofd' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter ОФД...', 'maxlength' => 256]],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
