<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Readers $model */

$this->title = 'Добавить данные о читателе';
$this->params['breadcrumbs'][] = ['label' => 'Читатели', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="readers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
