<?php
     
     use yii\helpers\Html;
     use yii\bootstrap\ActiveForm;
      
     $this->title = 'Регистрация нового пользователя';
     $this->params['breadcrumbs'][] = $this->title;
     ?>
     <div class="site-signup">
         <h1><?= Html::encode($this->title) ?></h1>
         <p>Пожалуйста заполните все поля:</p>
         <div class="row">
             <div class="col-lg-5">
      
                 <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                     <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Имя пользователя') ?>
                     <?= $form->field($model, 'email')->label('E-mail') ?>
                     <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>
                     <div class="form-group">
                         <?= Html::submitButton('Зарегистрировать', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                     </div>
                 <?php ActiveForm::end(); ?>
      
             </div>
         </div>
     </div>