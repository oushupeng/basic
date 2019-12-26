<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<?php $form = ActiveForm::begin()?>
<?= $form->field($model, 'adminuser')->textInput(['placeholder' => "用户名"])->label('账号') ?>
<?= $form->field($model, 'adminpass')->passwordInput()->label('密码') ?>
<?= Html::submitButton('提交') ?>
<?php ActiveForm::end() ?>