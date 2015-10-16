<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\ValidarFormulario;  // importando la clase
use yii\widgets\ActiveForm;
use yii\web\Response;
use app\models\FormParvulo;
use app\models\Parvulo;
use app\models\FormSearch;
use yii\helpers\Html;
use yii\helpers\Url;

class SiteController extends Controller
{
    public function actionUpdate()  //creaamos la accion para editar
    {
        $model = new FormParvulo; //instancia para el modelo de validación
        $msg=null;
        
        if($model ->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                $table = Parvulo::findOne($model->rut_parvulo);
                if($table)
                {
                    $table -> rut_parvulo = $model->rut_parvulo;
                    $table -> password = $model->password;
                    $table -> email = $model->email;
                    $table -> fecha_nacimiento = $model->fecha_nacimiento;
                    $table -> talla = $model->talla;
                    $table -> peso = $model->peso;
                    if($table->update())
                    {
                        $msg="El Parvulo ha sido actualizaso correctamente";
                    }
                    else 
                    {                 
                        $msg = "El Parvulo no ha podido ser actualizado";    
                    }
                }
                else
                {
                    $msg = "El Parvulo seleccionado no ha sido encontrado ";
                }
            }
            else
            {
                $model->getErrors();
            }
        }
        
        
        if(Yii::$app->request->get("rut_parvulo"))
        {
            $rut_parvulo = Html::encode($_GET["rut_parvulo"]);
            if((int) $rut_parvulo)
            {
                $table = Parvulo::findOne($rut_parvulo);
                if($table)
                {
                    $model -> rut_parvulo = $table->rut_parvulo;
                    $model -> password = $table->password;
                    $model -> email = $table->email;
                    $model -> fecha_nacimiento = $table->fecha_nacimiento;
                    $model -> talla = $table->talla;
                    $model -> peso = $table->peso;
                }
                else 
                {
                    return $this->redirect(["site/view"]);
                }
            }
            else
            {
                return $this->redirect(["site/view"]);
            }
        }
        else
        {
            return $this->redirect(["site/view"]);
        }
        return $this->render("update", ["model"=> $model, "msg" =>$msg] );
    }
    
    public function actionDelete()
    {
        if(Yii::$app->request->post())
        {
            $rut_parvulo = Html::encode($_POST["rut_parvulo"]);
            if((int)$rut_parvulo)
            {
                if(Parvulo::deleteAll("rut_parvulo=:rut_parvulo", [":rut_parvulo" => $rut_parvulo]))
                {
                    echo "Parvulo con rut $rut_parvulo eliminado con exito, redireccionando...";
                    echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/view")."'>";
                    
                }
                else
                {
                    echo "Ha ocurrido un error al eliminar el Parvulo, redireccionando...";
              echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/view")."'>";
                }
            }
            else
            {
              echo "Ha ocurrido un error al eliminar el Parvulo, redireccionando...";
              echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/view")."'>";
            }
             
        }
        else
        {
            return $this->redirect(["site/view"]);
        }    
    }


    
    public function actionView()
    {
        $table = new Parvulo;
        $model = $table->find()->all();  //Extrayendo todos los registros de la tabla parvulo
        
        $form = new FormSearch;
        $search = null;
        if($form->load(Yii::$app->request->get()))
        {
            if($form->validate())  //estamos validnado el campo no se poran ingresar weas de javaScript
            {
                $search = Html::encode($form->q);
                $query = "SELECT * FROM parvulo WHERE rut_parvulo LIKE '%$search%'"; //integrado el campode busqueda
                $model = $table->findBySql($query)->all();
            }
            else 
            {
                 $form->getErrors();   
            }
            
        }
        
        return $this->render("view",["model"=>$model, "form"=>$form, "search"=>$search]);
    }
    
    public function actionCreate()
    {
        $model = new FormParvulo;
        $msg=null;  //mostrar un mensaje cuando el registro es guardado correctamente
        if($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                $table = new Parvulo;//se crea una instancia para conectar a la tabla
                $table->rut_parvulo = $model ->rut_parvulo;
                $table->password = $model -> password;
                $table->email = $model -> email;
                $table->fecha_nacimiento = $model -> fecha_nacimiento;
                $table->talla = $model ->talla;
                $table->peso= $model ->peso;
                if($table->insert())
                {
                    $msg = "Ha registrado a un Parvulo correctamente";
                    $model->rut_parvulo=null;
                    $model->password=null;
                    $model->email=null;
                    $model->fecha_nacimiento=null;
                    $model->talla=null;
                    $model->peso=null;
                }
                else 
                {
                    $msg= "Ha ocurrido un error al ingresar datos de Parvulo";
                    
                }
            }
            else
            {
                $model->getErrors();
            }
        }
        return $this->render("create",['model'=>$model,'msg'=> $msg]);
    }
    
    
    
    
    public function actionSaluda($get = "Conejito Blanco")
    {
        $mensaje="Bienvenidos Parvulos";
        
        return $this->render("saluda",["mensaje"=> $mensaje,"get"=>$get]);
    }
    
    public function actionFormulario($mensaje = null)
    {
        return $this->render("formulario",["mensaje"=>$mensaje]);
    }
    
    public function actionRequest()
    {
        $mensaje=null;
        if(isset($_REQUEST["nombre"]))
        {
            $mensaje = "Bien, has enviado tu nombre correctamente: ".$_REQUEST["nombre"];
        }
        $this -> redirect(["site/formulario","mensaje" => $mensaje]);
    }
    
    public function actionValidarformulario()
    {
        $model = new ValidarFormulario;
        if($model->load(Yii::$app->request->post()))//enviando el formulario
        {
            if($model->validate())
            {
                //realizar las operaciones ej: consultar en la base de datos
                
            }
            else
            {
                //se muestran los errores
                $model->getErrors();
            }
        }
        return $this->render("validarformulario",["model" => $model]);
    }
    
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
