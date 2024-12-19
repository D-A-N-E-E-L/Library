<?php

use app\models\Issueofbooks;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Books $model */

$this->title = $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Книги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="books-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          [
            'label' => 'Обложка',
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
          [
            'label' => 'Статус',
            'format' => 'raw',
            'value' => function ($model)
            {
              $id = Issueofbooks::find()->select('return_date')->where(['IDb' => $model -> IDb])->one();
              if (!$id == null) {
                $dr = $id->return_date;
              }else{ $dr = '';}
              $dn = date("Y-m-d");
              if ($dr < $dn) { return "В наличии"; }
              else if ($dr == ''){return "В наличии";}
              else{return "Нет в наличии до: {$dr}";}
            }
          ]
        ],
    ]) ?>

</div>
