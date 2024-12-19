<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Issueofbooks $model */

$this->title = $model->record;
$this->params['breadcrumbs'][] = ['label' => 'Выдача книг', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="issueofbooks-view">
    <p>
        <?= Html::a('Обновить данные', ['update', 'record' => $model->record], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить данные', ['delete', 'record' => $model->record], [
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
            'record',
            'ticket_number',
            'IDb',
            'date_of_issue',
            'return_date',
        ],
    ]) ?>

</div>
