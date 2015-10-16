<?php

namespace app\controllers;

use Yii;
use app\models\Hito;
use app\models\HitoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
<<<<<<< HEAD

=======
use yii\filters\AccessControl;
>>>>>>> refs/remotes/EliasFigueroaG/master
/**
 * HitoController implements the CRUD actions for Hito model.
 */
class HitoController extends Controller
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
     * Lists all Hito models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HitoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Hito model.
<<<<<<< HEAD
     * @param string $id
=======
     * @param integer $id
>>>>>>> refs/remotes/EliasFigueroaG/master
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Hito model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Hito();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
<<<<<<< HEAD
            return $this->redirect(['view', 'id' => $model->rut_parvulo]);
=======
          $model->fecha = date('Y-m-d h:m:s');
          $model->save();
            return $this->redirect(['view', 'id' => $model->id_hito]);
>>>>>>> refs/remotes/EliasFigueroaG/master
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Hito model.
     * If update is successful, the browser will be redirected to the 'view' page.
<<<<<<< HEAD
     * @param string $id
=======
     * @param integer $id
>>>>>>> refs/remotes/EliasFigueroaG/master
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
<<<<<<< HEAD
            return $this->redirect(['view', 'id' => $model->rut_parvulo]);
=======
            return $this->redirect(['view', 'id' => $model->id_hito]);
>>>>>>> refs/remotes/EliasFigueroaG/master
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Hito model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
<<<<<<< HEAD
     * @param string $id
=======
     * @param integer $id
>>>>>>> refs/remotes/EliasFigueroaG/master
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Hito model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
<<<<<<< HEAD
     * @param string $id
=======
     * @param integer $id
>>>>>>> refs/remotes/EliasFigueroaG/master
     * @return Hito the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Hito::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
