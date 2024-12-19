<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Issueofbooks $model */

$this->title = 'Добавить данные о выдаче книги';
$this->params['breadcrumbs'][] = ['label' => 'Выдача книг', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="issueofbooks-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
