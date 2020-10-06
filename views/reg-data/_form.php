<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Json;
/* @var $this yii\web\View */
/* @var $model app\models\RegData */
/* @var $form yii\widgets\ActiveForm */

$content = [
           'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель ФН-1' => 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель ФН-1',
           'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1» исполнение 2' => 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1» исполнение 2',
           'Средство криптографической защиты фискальных данных «ФН-1» исполнение 3 версия 1' => 'Средство криптографической защиты фискальных данных «ФН-1» исполнение 3 версия 1',
           'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1» исполнение Из13-2' => 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1» исполнение Из13-2',
           'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Из15-2' => 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Из15-2',
           'Средство криптографической защиты фискальных данных «ФН-1» исполнение 3 версия 2' => 'Средство криптографической защиты фискальных данных «ФН-1» исполнение 3 версия 2',
           'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1» исполнение Пр13-2' => 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1» исполнение Пр13-2',
           'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Пр15-2' => 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Пр15-2',
           'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение 3' => 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение 3',
           'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Ав15-2' => 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Ав15-2',
           'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Ав36-2' => 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Ав36-2',
           'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение 5-15-2' => 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение 5-15-2',
           'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение 4' => 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение 4',
           'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение 5-15-1' => 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение 5-15-1',
           'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение 2' => 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение 2',
           'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Эв15-2' => 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Эв15-2',
           'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Эв36-2' => 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение Эв36-2',
           'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение 6-15-2' => 'Шифровальное (криптографическое) средство защиты фискальных данных фискальный накопитель «ФН-1.1» исполнение 6-15-2'
    ];

    $param = ['prompt' => 'Выбрать необходимый', ];
?>

<div class="reg-data-form">
    <?php $form = ActiveForm::begin(); ?>
<div class="col-md-4">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kkt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zn_kkt')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4">

    <?= $form->field($model, 'fn')->dropDownList($content, $param)?>

    <?= $form->field($model, 'zn_fn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rnm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'licens')->textInput(['maxlength' => true]) ?>
 
    <?= $form->field($model, 'proshivka')->textInput() ?>
    </div>
  <div class="col-md-4">
    <?= $form->field($model, 'vid_raboti')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_reg')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>
  
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>