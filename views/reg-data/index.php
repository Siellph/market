<?php

use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Регистрационные данные';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reg-data-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?> 

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
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
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

<?php Pjax::end(); ?> 

</div>


