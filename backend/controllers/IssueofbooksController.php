<?php

namespace backend\controllers;

use app\models\Issueofbooks;
use app\models\IssueSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IssueofbooksController implements the CRUD actions for Issueofbooks model.
 */
class IssueofbooksController extends Controller
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
     * Lists all Issueofbooks models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new IssueSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Issueofbooks model.
     * @param int $record Record
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($record)
    {
        return $this->render('view', [
            'model' => $this->findModel($record),
        ]);
    }

    /**
     * Creates a new Issueofbooks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Issueofbooks();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'record' => $model->record]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Issueofbooks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $record Record
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($record)
    {
        $model = $this->findModel($record);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'record' => $model->record]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Issueofbooks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $record Record
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($record)
    {
        $this->findModel($record)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Issueofbooks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $record Record
     * @return Issueofbooks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($record)
    {
        if (($model = Issueofbooks::findOne(['record' => $record])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
