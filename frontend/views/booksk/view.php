<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Books $model */

$this->title = $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Книг', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="books-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить данные', ['update', 'IDb' => $model->IDb], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить данные', ['delete', 'IDb' => $model->IDb], [
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
          [
            'label' => 'Картинка',
            'format' => 'raw',
            'value' => function ($model) {
              $image = $model['Cover'];
              return Html::img("data:image/jpeg;base64,".base64_encode($image)."",["width"=>"70px","height"=>"100px"]);
            },
          ],
            'IDb',
            'Author',
            'Name',
            'Pages',
            'Year',
            'Genre',
            'AgeL',
        ],
    ]) ?>

</div>
