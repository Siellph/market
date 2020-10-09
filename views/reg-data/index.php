<?php

use app\controllers\OrganizationController;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use app\models\OrganizationQuery;
use app\models\Organization;
use yii\web\NotFoundHttpException;
/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\RegDataQuery $searchModel
 */

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

        $searchModel = new OrganizationQuery;
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
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'inn',
        'vAlign'=>'middle',
        'headerOptions'=>['class'=>'kv-sticky-column'],
        'contentOptions'=>['class'=>'kv-sticky-column'],
        'editableOptions'=>['header'=>'ИНН', 'size'=>'md'],
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'adress',
        'vAlign'=>'middle',
        'headerOptions'=>['class'=>'kv-sticky-column'],
        'contentOptions'=>['class'=>'kv-sticky-column'],
    ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'kkt',
                'vAlign'=>'middle',
                'headerOptions'=>['class'=>'kv-sticky-column'],
                'contentOptions'=>['class'=>'kv-sticky-column'],
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'zn_kkt',
                'vAlign'=>'middle',
                'headerOptions'=>['class'=>'kv-sticky-column'],
                'contentOptions'=>['class'=>'kv-sticky-column'],
                'xlFormat' => "\@",
                'format' => ['text'],
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'fn',
                'vAlign'=>'middle',
                'headerOptions'=>['class'=>'kv-sticky-column'],
                'contentOptions'=>['class'=>'kv-sticky-column']
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'zn_fn',
                'vAlign'=>'middle',
                'headerOptions'=>['class'=>'kv-sticky-column'],
                'contentOptions'=>['class'=>'kv-sticky-column'],
                'xlFormat' => "\@",
                'format' => ['text'],
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'rnm',
                'vAlign'=>'middle',
                'headerOptions'=>['class'=>'kv-sticky-column'],
                'contentOptions'=>['class'=>'kv-sticky-column'],
                'xlFormat' => "\@",
                'format' => ['text'],
            ],
            [
                'attribute' => 'licens',
                'vAlign'=>'middle',
                'headerOptions'=>['class'=>'kv-sticky-column'],
                'contentOptions'=>['class'=>'kv-sticky-column'],
            ],
            [
                'attribute' => 'proshivka',
                'vAlign'=>'middle',
                'headerOptions'=>['class'=>'kv-sticky-column'],
                'contentOptions'=>['class'=>'kv-sticky-column'],
            ],
            [
                'attribute' => 'vid_raboti',
                'vAlign'=>'middle',
                'headerOptions'=>['class'=>'kv-sticky-column'],
                'contentOptions'=>['class'=>'kv-sticky-column'],
            ],
            [
                'attribute' => 'date_reg',
                'vAlign'=>'middle',
                'headerOptions'=>['class'=>'kv-sticky-column'],
                'contentOptions'=>['class'=>'kv-sticky-column'],
            ],
            [
                'attribute' => 'status',
                'vAlign'=>'middle',
                'headerOptions'=>['class'=>'kv-sticky-column'],
                'contentOptions'=>['class'=>'kv-sticky-column'],
            ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => true,
        'vAlign'=>'middle',
    ],

    // [
    //     'class' => 'kartik\grid\ActionColumn',
    //             'vAlign'=>'middle',
    //         ],
    ['class' => 'kartik\grid\CheckboxColumn']
];

$this->title = 'Регистрационные данные';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reg-data-index col-12">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /* echo Html::a('Create Reg Data', ['create'], ['class' => 'btn btn-success'])*/  ?>
    </p>

    <?php Pjax::begin(); 
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'autoXlFormat' => true,
        'columns' => $gridColumns,
        // 'columns' => [
        //     ['class' => 'yii\grid\SerialColumn'],

        //     // 'id',
        //     'name',
        //     'inn',
        //     'adress',
        //     'kkt',
        //    'zn_kkt', 
        //    'fn', 
        //    'zn_fn', 
        //    'rnm', 
        //    'licens',
        //    'proshivka',
        // //    ['attribute' => 'proshivka','format' => ['date',(isset(Yii::$app->modules['datecontrol']['displaySettings']['date'])) ? Yii::$app->modules['datecontrol']['displaySettings']['date'] : 'Y-m-d']], 
        //    'vid_raboti',
        //    'date_reg',
        // //    ['attribute' => 'date_reg','format' => ['date',(isset(Yii::$app->modules['datecontrol']['displaySettings']['date'])) ? Yii::$app->modules['datecontrol']['displaySettings']['date'] : 'Y-m-d']], 
        //    'status', 

        //     [
        //         'class' => 'yii\grid\ActionColumn',
        //         'buttons' => [
        //             'update' => function ($url, $model) {
        //                 return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
        //                     Yii::$app->urlManager->createUrl(['reg-data/view', 'id' => $model->id, 'edit' => 't']),
        //                     ['title' => Yii::t('yii', 'Edit'),]
        //                 );
        //             }
        //         ],
        //     ],
        // ],
        'containerOptions' => ['style'=>'overflow: auto'],
        'pjax' => true,
        'export' => [
            'fontAwesome' => false,
        ],
        'responsive' => true,
        'hover' => true,
        'condensed' => true,
        'floatHeader' => true,
        'bordered' => true,
        'striped' => true,
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> '.Html::encode($this->title).' </h3>',
            'type' => 'info',
            'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Добавить', ['create'], ['class' => 'btn btn-success']),
            'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Обновить', ['index'], ['class' => 'btn btn-info']),
            'showFooter' => false
        ],
    ]); Pjax::end(); ?>

</div>
