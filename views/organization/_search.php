<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\OrganizationQuery $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="organization-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'inn') ?>

    <?= $form->field($model, 'adress') ?>

    <?= $form->field($model, 'director') ?>

    <?= $form->field($model, 'mesto_ustanovki') ?>

    <?php // echo $form->field($model, 'adress_ustanovki') ?>

    <?php // echo $form->field($model, 'ofd') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
