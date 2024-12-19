<?php

use app\models\Issueofbooks;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\IssueSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Выдача книг';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="issueofbooks-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Довавить данные о выдаче книги', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'record',
            'ticket_number',
            'IDb',
            'date_of_issue',
            'return_date',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Issueofbooks $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'record' => $model->record]);
                 }
            ],
        ],
    ]); ?>


</div>
