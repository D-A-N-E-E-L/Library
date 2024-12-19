<?php

namespace backend\controllers;

use app\models\Readers;
use app\models\ReadersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReadersController implements the CRUD actions for Readers model.
 */
class ReadersController extends Controller
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
     * Lists all Readers models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ReadersSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->pagination->pageSize = 10;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Readers model.
     * @param int $ticket_number Ticket Number
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ticket_number)
    {
        return $this->render('view', [
            'model' => $this->findModel($ticket_number),
        ]);
    }

    /**
     * Creates a new Readers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Readers();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ticket_number' => $model->ticket_number]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Readers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ticket_number Ticket Number
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ticket_number)
    {
        $model = $this->findModel($ticket_number);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ticket_number' => $model->ticket_number]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Readers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ticket_number Ticket Number
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ticket_number)
    {
        $this->findModel($ticket_number)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Readers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ticket_number Ticket Number
     * @return Readers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ticket_number)
    {
        if (($model = Readers::findOne(['ticket_number' => $ticket_number])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
