<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RegData */

$this->title = $model->company_name;
$this->params['breadcrumbs'][] = ['label' => 'Регистрационные данные', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="reg-data-view container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
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
            'id',
            'company_name',
            'inn',
            'adress',
            'kkt',
            'zn_kkt',
            'fn',
            'zn_fn',
            'licens',
            'proshivka',
            'rnm',
            'name_ofd',
            'vid_raboti',
            'date_reg',
            'status',
        ],
    ]) ?>

</div>
