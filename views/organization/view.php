<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\Organization $model
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Организации', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-view container">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->inn], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->inn], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить данную запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'inn',
            'adress',
            'director',
            'mesto_ustanovki',
            'adress_ustanovki',
            'ofd',
        ],
    ]) ?>

</div>