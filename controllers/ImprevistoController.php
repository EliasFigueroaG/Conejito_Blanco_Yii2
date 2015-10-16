<?php

namespace app\controllers;

use Yii;
use app\models\Imprevisto;
use app\models\ImprevistoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
<<<<<<< HEAD

=======
use yii\filters\AccessControl;
>>>>>>> refs/remotes/EliasFigueroaG/master
/**
 * ImprevistoController implements the CRUD actions for Imprevisto model.
 */
class ImprevistoController extends Controller
{
    public function behaviors()
    {
        return [
<<<<<<< HEAD
=======
          'access'=>[
              'class'=>AccessControl::classname(),
              'only'=>['create','update','delete'],
              'rules'=>[
                  [
                    'allow'=>true,
                    'roles'=>['@']
                  ],
          ]
        ],
>>>>>>> refs/remotes/EliasFigueroaG/master
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
<<<<<<< HEAD
     * @param integer $id_imprevisto
     * @param string $rut_parvulo
     * @return mixed
     */
    public function actionView($id_imprevisto, $rut_parvulo)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_imprevisto, $rut_parvulo),
=======
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
>>>>>>> refs/remotes/EliasFigueroaG/master
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
<<<<<<< HEAD
            return $this->redirect(['view', 'id_imprevisto' => $model->id_imprevisto, 'rut_parvulo' => $model->rut_parvulo]);
=======

          $model->fecha = date('Y-m-d h:m:s');
          $model->save();
            return $this->redirect(['view', 'id' => $model->id_imprevisto]);
>>>>>>> refs/remotes/EliasFigueroaG/master
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Imprevisto model.
     * If update is successful, the browser will be redirected to the 'view' page.
<<<<<<< HEAD
     * @param integer $id_imprevisto
     * @param string $rut_parvulo
     * @return mixed
     */
    public function actionUpdate($id_imprevisto, $rut_parvulo)
    {
        $model = $this->findModel($id_imprevisto, $rut_parvulo);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_imprevisto' => $model->id_imprevisto, 'rut_parvulo' => $model->rut_parvulo]);
=======
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_imprevisto]);
>>>>>>> refs/remotes/EliasFigueroaG/master
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Imprevisto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
<<<<<<< HEAD
     * @param integer $id_imprevisto
     * @param string $rut_parvulo
     * @return mixed
     */
    public function actionDelete($id_imprevisto, $rut_parvulo)
    {
        $this->findModel($id_imprevisto, $rut_parvulo)->delete();
=======
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
>>>>>>> refs/remotes/EliasFigueroaG/master

        return $this->redirect(['index']);
    }

    /**
     * Finds the Imprevisto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
<<<<<<< HEAD
     * @param integer $id_imprevisto
     * @param string $rut_parvulo
     * @return Imprevisto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_imprevisto, $rut_parvulo)
    {
        if (($model = Imprevisto::findOne(['id_imprevisto' => $id_imprevisto, 'rut_parvulo' => $rut_parvulo])) !== null) {
=======
     * @param integer $id
     * @return Imprevisto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Imprevisto::findOne($id)) !== null) {
>>>>>>> refs/remotes/EliasFigueroaG/master
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
