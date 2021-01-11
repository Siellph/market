<?php


use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use app\models\OrganizationQuery;
use kartik\popover\PopoverX;

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
    ],
Yii::$app->user->can('admin') ? (
    [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'inn',
        'editableOptions'=>[
            'formOptions' => ['action' => ['/reg-data/editinn']],
            'placement' => PopoverX::ALIGN_AUTO_LEFT,
            'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
        ],
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'format'=>['text'],
        'pageSummary'=>true
    ] ) : (
        [
            'attribute' => 'inn',
            'vAlign'=>'middle',
            'headerOptions'=>['class'=>'kv-sticky-column'],
            'contentOptions'=>['class'=>'kv-sticky-column'],
        ]
    ),
Yii::$app->user->can('admin') ? (
    [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'mesto_ustanovki',
        'editableOptions'=>[
            'formOptions' => ['action' => ['/reg-data/editMU']],
            'placement' => PopoverX::ALIGN_AUTO_LEFT,
            'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
        ],
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'format'=>['text'],
        'pageSummary'=>true
    ] ) : (
        [
            'attribute' => 'mesto_ustanovki',
            'vAlign'=>'middle',
            'headerOptions'=>['class'=>'kv-sticky-column'],
            'contentOptions'=>['class'=>'kv-sticky-column'],
        ]
    ),
    Yii::$app->user->can('admin') ? (
    [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'adress_ustanovki',
        'editableOptions'=>[
            'formOptions' => ['action' => ['/reg-data/editAU']],
            'placement' => PopoverX::ALIGN_AUTO_LEFT,
            'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
        ],
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'format'=>['text'],
        'pageSummary'=>true
    ] ) : (
        [
            'attribute' => 'adress_ustanovki',
            'vAlign'=>'middle',
            'headerOptions'=>['class'=>'kv-sticky-column'],
            'contentOptions'=>['class'=>'kv-sticky-column'],
        ]
    ),
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
    Yii::$app->user->can('admin') ? (
    [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'rnm',
        'editableOptions'=>[
            'formOptions' => ['action' => ['/reg-data/editrnm']],
            'placement' => PopoverX::ALIGN_AUTO_LEFT,
            'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
        ],
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'format'=>['text'],
        'pageSummary'=>true
    ] ) : (
        [
            'attribute' => 'rnm',
            'vAlign'=>'middle',
            'headerOptions'=>['class'=>'kv-sticky-column'],
            'contentOptions'=>['class'=>'kv-sticky-column'],
        ]
    ),
    Yii::$app->user->can('admin') ? (
    [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'licens',
        'editableOptions'=>[
            'formOptions' => ['action' => ['/reg-data/editlicens']],
            'placement' => PopoverX::ALIGN_AUTO_LEFT,
            'inputType'=>\kartik\editable\Editable::INPUT_TEXT,
        ],
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'format'=>['text'],
        'pageSummary'=>true
    ] ) : (
        [
            'attribute' => 'licens',
            'vAlign'=>'middle',
            'headerOptions'=>['class'=>'kv-sticky-column'],
            'contentOptions'=>['class'=>'kv-sticky-column'],
        ]
    ),
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
    Yii::$app->user->can('admin') ? (
    [   
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'status',
        'filter' => ['Выполнено' => 'Выполнено', 'В работе' => 'В работе'],
        'editableOptions'=>[
            'formOptions' => ['action' => ['/reg-data/editstatus']],
            'placement' => PopoverX::ALIGN_AUTO_LEFT,
            'inputType'=>\kartik\editable\Editable::INPUT_SELECT2,
            'options'=>[
                'data' => [
                    'Выполнено' => 'Выполнено',
                    'В работе' => 'В работе'
                ],
                'class'=>'form-control',
            ]
        ],
        'refreshGrid' => true,
        'width' => '100px',
        'vAlign'=>'middle',
        'hAlign' => 'center',
        'format'=>['text'],
        'pageSummary'=>true
    ] ) : (
        [
            'attribute' => 'status',
            'vAlign'=>'middle',
            'headerOptions'=>['class'=>'kv-sticky-column'],
            'contentOptions'=>['class'=>'kv-sticky-column'],
        ]
    ),
    [
        'class' => 'kartik\grid\ActionColumn',
        'template' => YII::$app->user->can('admin') ? ('{view}&nbsp;{update}&nbsp{delete}') : ('{view}'),
        'dropdown' => false,
        'vAlign'=>'middle',
    ],
];

$this->title = 'Регистрационные данные';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reg-data-index col-12">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php Pjax::begin(); 
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'autoXlFormat' => true,
        'columns' => $gridColumns,
        'containerOptions' => ['style'=>'overflow: auto'],
        'pjax' => true,
        'pjaxSettings'=>[
            'refreshGrid' => true,
            'neverTimeout'=>true,
            ],
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
            'before' => 
            Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success'])
            .' '.
            Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['class' => 'btn btn-info']),
            'showFooter' => false
        ],
    ]); Pjax::end(); ?>

</div>
