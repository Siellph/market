<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\RegData $model
 */

$this->title = 'Обновить регистрационные данные: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Регистрационные данные', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление';
?>
<div class="reg-data-update container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
