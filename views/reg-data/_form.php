<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\RegData */
/* @var $form yii\widgets\ActiveForm */

include_once "__bd_fn.php";
include_once "__bd_kkt.php";

$content_status = [
    'В работе' => 'В работе',
    'Выполнено' => 'Выполнено'
];
$param_status = ['prompt' => 'Выбрать необходимый'];

$content_vid_raboti = [
    'Первичная регистрация' => 'Первичная регистрация',
    'Перерегистрация' => 'Перерегистрация'
];
$param_vid_raboti = ['prompt' => 'Выбрать необходимый'];
?>

<div class="reg-data-form">
    <?php $form = ActiveForm::begin(); ?>
<div class="col-md-4">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kkt')->widget(Select2::classname(), [
    'data' => $content_kkt,
    'options' => ['placeholder' => 'Выберите ККТ из списка ...'],
    'pluginOptions' => [
        'allowClear' => true
    ]
    ]); ?>

    <?= $form->field($model, 'zn_kkt')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4">

    <?= $form->field($model, 'fn')->widget(Select2::classname(), [
    'data' => $content_fn,
    'options' => ['placeholder' => 'Выберите ФН из списка ...'],
    'pluginOptions' => [
        'allowClear' => true
    ]
    ]); ?>

    <?= $form->field($model, 'zn_fn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rnm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'licens')->textInput(['maxlength' => true]) ?>
 
    <?= $form->field($model, 'proshivka')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Выберите дату'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'
    ]
]); ?>

    </div>
  <div class="col-md-4">
  <?= $form->field($model, 'vid_raboti')->dropDownList($content_vid_raboti, $param_vid_raboti)?>

    <?= $form->field($model, 'date_reg')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Выберите дату'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd',
        'todayHighlight' => true
    ]
]); ?>

    <?= $form->field($model, 'status')->dropDownList($content_status, $param_status)?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>