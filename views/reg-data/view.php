<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RegData */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Регистрационные данные', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="col-md-4"></div>
<div class="reg-data-view col-md-4">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить данную запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'inn',
            'adress',
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
