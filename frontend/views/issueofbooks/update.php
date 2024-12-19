<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Issueofbooks $model */

$this->title = 'Обновить данные о выдаче книги: ' . $model->record;
$this->params['breadcrumbs'][] = ['label' => 'Выдача книг', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->record, 'url' => ['view', 'record' => $model->record]];
$this->params['breadcrumbs'][] = 'Обновление данных';
?>
<div class="issueofbooks-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
