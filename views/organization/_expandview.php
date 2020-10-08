<?php

use app\models\Organization;
use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\Organization $model
 */


?>
<div class="organization-view container">



    <?= DetailView::widget([
        'model' => $model,
        'condensed' => false,
        'hover' => true,
        'attributes' => [
            'name',
            'inn',
            'adress',
            // 'director',
            // 'mesto_ustanovki',
            // 'adress_ustanovki',
            // 'ofd',
        ],
        'enableEditMode' => true,
    ]) ?>

</div>
