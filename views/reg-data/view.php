<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\RegData $model
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Регистрационные данные', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reg-data-view container">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
    <?php if (Yii::$app->user->can('admin')) { ?> 
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить данную запись?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Добавить запись', ['create'], ['class' => 'btn btn-success']) ?>
                <?php } ?> 
    </p>
    </div>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'name',
            'inn',
            'mesto_ustanovki',
            'adress_ustanovki',
            'kkt',
            'zn_kkt',
            'fn',
            'zn_fn',
            'rnm',
            'licens',
            'proshivka',
            'vid_raboti',
            'date_reg',
            'status',
        ],
    ]) ?>

</div>