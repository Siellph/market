<?php

use app\models\RegDataQuery;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\OrganizationQuery $searchModel
 */

$this->title = 'Организации';
$this->params['breadcrumbs'][] = $this->title;

$gridColumns = [
    [
        'class'=>'kartik\grid\SerialColumn',
        'contentOptions'=>['class'=>'kartik-sheet-style'],
        'pageSummary'=>'Total',
        'pageSummaryOptions' => ['colspan' => 6],
        'header'=>'#',
        'headerOptions'=>['class'=>'kartik-sheet-style']
    ],
    [
        'class' => 'kartik\grid\ExpandRowColumn',
        'width' => '50px',
        'value' => function ($model, $key, $index, $column) {
            return GridView::ROW_COLLAPSED;
        },

     'detail' => function ($model, $key, $index, $column) {
        $searchModel = new RegDataQuery();
        $searchModel -> inn = $model -> inn;
        $dataProvider = $searchModel->searchExp(Yii::$app->request->getQueryParams());
        return Yii::$app->controller->renderPartial('expandview', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    },
        'headerOptions' => ['class' => 'kartik-sheet-style'],
        'expandOneOnly' => true
    ],
    [
        'attribute' => 'name',
        'vAlign'=>'middle',
        'headerOptions'=>['class'=>'kv-sticky-column'],
        'contentOptions'=>['class'=>'kv-sticky-column'],
    ],
    [
        'attribute' => 'inn',
        'vAlign'=>'middle',
        'headerOptions'=>['class'=>'kv-sticky-column'],
        'contentOptions'=>['class'=>'kv-sticky-column'],
    ],
    [
        'attribute' => 'adress',
        'vAlign'=>'middle',
        'headerOptions'=>['class'=>'kv-sticky-column'],
        'contentOptions'=>['class'=>'kv-sticky-column'],
    ],
    [
        'attribute' => 'director',
        'vAlign'=>'middle',
        'headerOptions'=>['class'=>'kv-sticky-column'],
        'contentOptions'=>['class'=>'kv-sticky-column'],
    ],
    [
        'attribute' => 'ofd',
        'vAlign'=>'middle',
        'headerOptions'=>['class'=>'kv-sticky-column'],
        'contentOptions'=>['class'=>'kv-sticky-column'],
    ],
    [
    'class' => '\kartik\grid\ActionColumn',
    'vAlign'=>'middle',
    ],
];

?>
<div class="organization-index">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?php Pjax::begin(); echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'containerOptions' => ['style'=>'overflow: auto'],
        'pjax' => true,
        'export' => [
            'fontAwesome' => false,
        ],
        'responsive' => true,
        'hover' => true,
        'condensed' => true,
        'floatHeader' => true,

        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> '.Html::encode($this->title).' </h3>',
            'type' => 'info',
            'before' => 
            Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success'])
            .' '.
            Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['class' => 'btn btn-info']),
            'showFooter' => false
        ],
    ]); Pjax::end(); ?>

</div>
