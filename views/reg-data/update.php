<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RegData */

$this->title = 'Изменить запись: ' . $model->company_name;
$this->params['breadcrumbs'][] = ['label' => 'Регистрационные данные', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->company_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="reg-data-update container">

    <h1><?= Html::encode($this->title) . ' ' . $model->rnm ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
