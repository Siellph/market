<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Organization $model
 */

$this->title = 'Обновление ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Организации', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->inn]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="organization-update container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
