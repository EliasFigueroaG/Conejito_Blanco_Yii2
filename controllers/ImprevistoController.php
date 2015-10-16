<?php

namespace app\controllers;

use Yii;
use app\models\Imprevisto;
use app\models\ImprevistoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ImprevistoController implements the CRUD actions for Imprevisto model.
 */
class ImprevistoController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Imprevisto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ImprevistoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Imprevisto model.
     * @param integer $id_imprevisto
     * @param string $rut_parvulo
     * @return mixed
     */
    public function actionView($id_imprevisto, $rut_parvulo)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_imprevisto, $rut_parvulo),
        ]);
    }

    /**
     * Creates a new Imprevisto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Imprevisto();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_imprevisto' => $model->id_imprevisto, 'rut_parvulo' => $model->rut_parvulo]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Imprevisto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_imprevisto
     * @param string $rut_parvulo
     * @return mixed
     */
    public function actionUpdate($id_imprevisto, $rut_parvulo)
    {
        $model = $this->findModel($id_imprevisto, $rut_parvulo);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_imprevisto' => $model->id_imprevisto, 'rut_parvulo' => $model->rut_parvulo]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Imprevisto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_imprevisto
     * @param string $rut_parvulo
     * @return mixed
     */
    public function actionDelete($id_imprevisto, $rut_parvulo)
    {
        $this->findModel($id_imprevisto, $rut_parvulo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Imprevisto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_imprevisto
     * @param string $rut_parvulo
     * @return Imprevisto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_imprevisto, $rut_parvulo)
    {
        if (($model = Imprevisto::findOne(['id_imprevisto' => $id_imprevisto, 'rut_parvulo' => $rut_parvulo])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
