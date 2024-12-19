<?php

namespace frontend\controllers;

use app\models\Books;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BookskController implements the CRUD actions for Books model.
 */
class BookskController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Books models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Books::find(),
            'pagination' => [
                'pageSize' => 5
            ],
            'sort' => [
                'defaultOrder' => [
                    'IDb' => SORT_DESC,
                ]
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Books model.
     * @param int $IDb Код
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($IDb)
    {
        return $this->render('view', [
            'model' => $this->findModel($IDb),
        ]);
    }

    /**
     * Creates a new Books model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
  public function actionCreate()
  {
    $model = new Books();

    if ($this->request->isPost) {
      if ($model->load(Yii::$app->request->post())) {
        $model->Cover = UploadedFile::getInstance($model, 'Cover');
        if ($model->Cover->tempName == "") {
          $model->Cover = "error";
        } else {
          $model->Cover = file_get_contents($model->Cover->tempName);
        }
        if ($model->save()) {
          return $this->redirect(['view', 'IDb' => $model->IDb]);
        }
      }
    } else {
      $model->loadDefaultValues();
    }
    return $this->render('create', [
      'model' => $model,
    ]);
  }

    /**
     * Updates an existing Books model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $IDb Код
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
  public function actionUpdate($IDb)
  {
    $model = $this->findModel($IDb);

    if ($this->request->isPost) {
      if ($model->load(Yii::$app->request->post())) {
        $model->Cover = UploadedFile::getInstance($model, 'Cover');
        if ($model->Cover->tempName == "") {
          $model->Cover = "error";
        } else {
          $model->Cover = file_get_contents($model->Cover->tempName);
        }
        if ($model->save()) {
          return $this->redirect(['view', 'IDb' => $model->IDb]);
        }
      }
    } else {
      $model->loadDefaultValues();
    }
    return $this->render('update', [
      'model' => $model,
    ]);
  }
    /**
     * Deletes an existing Books model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $IDb Код
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($IDb)
    {
        $this->findModel($IDb)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Books model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $IDb Код
     * @return Books the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($IDb)
    {
        if (($model = Books::findOne(['IDb' => $IDb])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
