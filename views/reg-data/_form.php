<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RegData */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reg-data-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kkt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zn_kkt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zn_fn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rnm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'licens')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proshivka')->textInput() ?>

    <?= $form->field($model, 'vid_raboti')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_reg')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
