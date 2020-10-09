<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

$gridColumns = [
    // [
    //     'attribute' => 'name',
    //     'vAlign'=>'middle',
    //     'headerOptions'=>['class'=>'kv-sticky-column'],
    //     'contentOptions'=>['class'=>'kv-sticky-column'],
    //     'filter' => false,
    // ],
    // [
    //     'attribute' => 'inn',
    //     'vAlign'=>'middle',
    //     'headerOptions'=>['class'=>'kv-sticky-column'],
    //     'contentOptions'=>['class'=>'kv-sticky-column'],
    //     'filter' => false,
    // ],
    // [
    //     'attribute' => 'adress',
    //     'vAlign'=>'middle',
    //     'headerOptions'=>['class'=>'kv-sticky-column'],
    //     'contentOptions'=>['class'=>'kv-sticky-column'],
    // ],
    [
        'attribute' => 'director',
        'vAlign'=>'middle',
        'headerOptions'=>['class'=>'kv-sticky-column'],
        'contentOptions'=>['class'=>'kv-sticky-column'],
        'filter' => false,
    ],
    [
        'attribute' => 'mesto_ustanovki',
        'vAlign'=>'middle',
        'headerOptions'=>['class'=>'kv-sticky-column'],
        'contentOptions'=>['class'=>'kv-sticky-column'],
        'filter' => false,
    ],
    [
        'attribute' => 'adress_ustanovki',
        'vAlign'=>'middle',
        'headerOptions'=>['class'=>'kv-sticky-column'],
        'contentOptions'=>['class'=>'kv-sticky-column'],
        'filter' => false,
    ],
    [
        'attribute' => 'ofd',
        'vAlign'=>'middle',
        'headerOptions'=>['class'=>'kv-sticky-column'],
        'contentOptions'=>['class'=>'kv-sticky-column'],
        'filter' => false,
    ],

];

Pjax::begin(); echo GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => $gridColumns,
    ]); Pjax::end(); 