<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RegDataQuery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reg-data-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'company_name') ?>

    <?= $form->field($model, 'inn') ?>

    <?= $form->field($model, 'adress') ?>

    <?= $form->field($model, 'kkt') ?>

    <?php // echo $form->field($model, 'zn_kkt') ?>

    <?php // echo $form->field($model, 'fn') ?>

    <?php // echo $form->field($model, 'zn_fn') ?>

    <?php // echo $form->field($model, 'licens') ?>

    <?php // echo $form->field($model, 'proshivka') ?>

    <?php // echo $form->field($model, 'rnm') ?>

    <?php // echo $form->field($model, 'name_ofd') ?>

    <?php // echo $form->field($model, 'vid_raboti') ?>

    <?php // echo $form->field($model, 'date_reg') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
