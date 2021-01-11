<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\RegDataQuery $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="reg-data-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'inn') ?>

    <?= $form->field($model, 'mesto_ustanovki') ?>

    <?= $form->field($model, 'adress_ustanovki') ?>

    <?= $form->field($model, 'kkt') ?>

    <?php // echo $form->field($model, 'zn_kkt') ?>

    <?php // echo $form->field($model, 'fn') ?>

    <?php // echo $form->field($model, 'zn_fn') ?>

    <?php // echo $form->field($model, 'rnm') ?>

    <?php // echo $form->field($model, 'licens') ?>

    <?php // echo $form->field($model, 'proshivka') ?>

    <?php // echo $form->field($model, 'vid_raboti') ?>

    <?php // echo $form->field($model, 'date_reg') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
