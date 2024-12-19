<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\IssueSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="issueofbooks-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'record') ?>

    <?= $form->field($model, 'ticket_number') ?>

    <?= $form->field($model, 'IDb') ?>

    <?= $form->field($model, 'date_of_issue') ?>

    <?= $form->field($model, 'return_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Найти сбросить', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
