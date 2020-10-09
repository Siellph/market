<?php

use kartik\grid\GridView;
use yii\widgets\Pjax;

$gridColumns = [
    [
        'class'=>'kartik\grid\SerialColumn',
        'contentOptions'=>['class'=>'kartik-sheet-style'],
        'pageSummary'=>'Total',
        'pageSummaryOptions' => ['colspan' => 6],
        'header'=>'#',
        'headerOptions'=>['class'=>'kartik-sheet-style']
    ],
    // [
    //     'attribute' => 'name',
    //     'vAlign'=>'middle',
    //     'headerOptions'=>['class'=>'kv-sticky-column'],
    //     'contentOptions'=>['class'=>'kv-sticky-column'],
    // ],
    // [
    //     'attribute' => 'inn',
    //     'vAlign'=>'middle',
    //     'headerOptions'=>['class'=>'kv-sticky-column'],
    //     'contentOptions'=>['class'=>'kv-sticky-column'],
    // ],
    // [
    //     'attribute' => 'adress',
    //     'vAlign'=>'middle',
    //     'headerOptions'=>['class'=>'kv-sticky-column'],
    //     'contentOptions'=>['class'=>'kv-sticky-column'],
    // ],
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
        'contentOptions'=>['class'=>'kv-sticky-column']
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
];
?>
<div class="reg-data-index">
    <?php Pjax::begin(); 
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => $gridColumns,
    ]); Pjax::end(); ?>

</div>
