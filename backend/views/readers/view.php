<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Readers $model */

$this->title = $model->FIO;
$this->params['breadcrumbs'][] = ['label' => 'Читатели', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="readers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить данные', ['update', 'ticket_number' => $model->ticket_number], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить данные', ['delete', 'ticket_number' => $model->ticket_number], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить данные?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ticket_number',
            'FIO',
            'address',
            'phone',
        ],
    ]) ?>

</div>
