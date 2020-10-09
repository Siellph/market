<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\RegData $model
 */

$this->title = 'Добавить регистрационные данные';
$this->params['breadcrumbs'][] = ['label' => 'Регистрационные данные', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reg-data-create container">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
