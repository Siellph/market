<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\RegData */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reg-data-form container">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kkt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zn_kkt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zn_fn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'licens')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proshivka')->textInput() ?>

    <?php
    $form->field($model, 'proshivka')->textInput()->widget(
            DatePicker::class,
            [
                'dateFormat' => 'php:Y-m-d',
                'model' => $model,
                'attribute' => 'added',
                'options' => [
                    'autocomplete'=>'off'
                ]
            ]
        ); ?>

    <?= $form->field($model, 'rnm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_ofd')->dropDownList([
        '',
        'Первый ОФД (АО "ЭСК")',
        '	ООО «ПЕТЕР-СЕРВИС Спецтехнологии»'
    ]) ?>

    <?= $form->field($model, 'vid_raboti')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_reg')->textInput() ?>

<?php
$form->field($model, 'date_reg')->textInput()->widget(
        DatePicker::class,
        [
            'dateFormat' => 'php:Y-m-d',
            'model' => $model,
            'attribute' => 'added',
            'options' => [
                'autocomplete'=>'off'
            ]
        ]
    ); ?>

    <?= $form->field($model, 'status')->dropDownList([
        '',
        'В работе',
        'Выполнено'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
