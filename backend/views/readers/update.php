<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Readers $model */

$this->title = 'Обновить данные: ' . $model->FIO;
$this->params['breadcrumbs'][] = ['label' => 'Читатели', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->FIO, 'url' => ['view', 'ticket_number' => $model->ticket_number]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="readers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
