<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RegData */

$this->title = 'Добавление записи';
$this->params['breadcrumbs'][] = ['label' => 'Регистрационные данные', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reg-data-create">

    <h1><?= Html::encode($this->title) ?></h1>
<div class="">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
</div>
