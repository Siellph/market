<?php

use app\controllers\RegDataController;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

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
        // uncomment below and comment detail if you need to render via ajax
        // 'detailUrl' => Url::to(['/site/book-details']),
        'detail' => function ($model, $key, $index, $column) {
            return Yii::$app->controller->renderPartial('..\organization\view', ['model' => $model]);
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
        'editableOptions'=>['header'=>'ИНН', 'size'=>'md']
    ],
    [
        'attribute' => 'adress',
        'vAlign'=>'middle',
        'headerOptions'=>['class'=>'kv-sticky-column'],
        'contentOptions'=>['class'=>'kv-sticky-column'],
    ],
            [
                'attribute' => 'kkt',
                'vAlign'=>'middle',
                'headerOptions'=>['class'=>'kv-sticky-column'],
                'contentOptions'=>['class'=>'kv-sticky-column'],
            ],
            [
                'attribute' => 'zn_kkt',
                'vAlign'=>'middle',
                'headerOptions'=>['class'=>'kv-sticky-column'],
                'contentOptions'=>['class'=>'kv-sticky-column'],
            ],
            [
                'attribute' => 'fn',
                'vAlign'=>'middle',
                'headerOptions'=>['class'=>'kv-sticky-column'],
                'contentOptions'=>['class'=>'kv-sticky-column'],
            ],
            [
                'attribute' => 'zn_fn',
                'vAlign'=>'middle',
                'headerOptions'=>['class'=>'kv-sticky-column'],
                'contentOptions'=>['class'=>'kv-sticky-column'],
            ],
            [
                'attribute' => 'rnm',
                'vAlign'=>'middle',
                'headerOptions'=>['class'=>'kv-sticky-column'],
                'contentOptions'=>['class'=>'kv-sticky-column'],
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
        'urlCreator' => function($action, $model, $key, $index) { return '#'; },
        'viewOptions'=>['title'=>$viewMsg, 'data-toggle'=>'tooltip'],
        'updateOptions'=>['title'=>$updateMsg, 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['title'=>$deleteMsg, 'data-toggle'=>'tooltip'], 
    ],
    ['class' => 'kartik\grid\CheckboxColumn']
];

$this->title = 'Регистрационые данные';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reg-data-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumns,
    'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
    'toolbar' =>  [
        '{export}',
        '{toggleData}'
    ],
    'pjax' => true,
    'export' => [
        'fontAwesome' => false,
    ],
    'bordered' => true,
    'striped' => true,
    'condensed' => true,
    'responsive' => true,
    'hover' => true,
    'floatHeader' => true,
    // 'floatHeaderOptions' => ['top' => $scrollingTop],
    'showPageSummary' => false,
    'panel' => [
        'type' => GridView::TYPE_PRIMARY
    ],
    'resizableColumns'=>true,
    'resizeStorageKey'=>Yii::$app->user->id . '-' . date("m")
]);


//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    // GridView::widget([
        // 'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        // 'columns' => $gridColumns,
        // 'toolbar' => [
        //     [
        //         'content'=>
        //             Html::button('<i class="glyphicon glyphicon-plus"></i>', [
        //                 'type'=>'button', 
        //                 'title'=>Yii::t('kvgrid', 'Add Book'), 
        //                 'class'=>'btn btn-success'
        //             ]) . ' '.
        //             Html::a('<i class="fas fa-redo"></i>', ['grid-demo'], [
        //                 'class' => 'btn btn-secondary', 
        //                 'title' => Yii::t('kvgrid', 'Reset Grid')
        //             ]),
        //     ],
        //     '{export}',
        //     '{toggleData}'
        // ],
        // [
        //     ['class' => 'yii\grid\SerialColumn'],

        //     // 'id',
        //     'name',
        //     'inn',
        //     'adress',
        //     'kkt',
        //     'zn_kkt',
        //     'fn',
        //     'zn_fn',
        //     'rnm',
        //     'licens',
        //     'proshivka',
        //     'vid_raboti',
        //     'date_reg',
        //     'status',

        //     ['class' => 'yii\grid\ActionColumn'],
        // ],
    //     'resizableColumns'=>true,
    //     'resizeStorageKey'=>Yii::$app->user->id . '-' . date("m")
    // ]); 
    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    
    ?>

    <?php Pjax::end(); ?>

</div>
