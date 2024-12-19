<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Issueofbooks $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="issueofbooks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ticket_number')->textInput() ?>

    <?= $form->field($model, 'IDb')->textInput() ?>

    <?= $form->field($model, 'date_of_issue')->textInput() ?>

    <?= $form->field($model, 'return_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
