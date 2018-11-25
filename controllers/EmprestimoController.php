<?php

namespace app\controllers;

use Yii;
use app\models\Emprestimo;
use app\models\EmprestimoComTitulos;
use app\models\EmprestimoTitulo;
use app\models\EmprestimoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use app\models\Titulo;
use app\controllers\Alert;

/**
 * EmprestimoController implements the CRUD actions for Emprestimo model.
 */
class EmprestimoController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Emprestimo models.
     * @return mixed
     */
    public function actionIndex()         
    {
        $searchModel = new EmprestimoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    

    /**
     * Displays a single Emprestimo model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    /**
     * Creates a new Emprestimo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        /*$model = new Emprestimo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }*/
        
        $model = new EmprestimoComTitulos();
    
        if ($model->load(Yii::$app->request->post())) {
            
            
            if ($model->save()) {
                $model->saveTitulos();
                if ($model->possuiBonus()){
                    $model->valor = 0.0;
                    $model->save();
                    $model->diminuirBonus();
                    
                    Yii::$app->session->setFlash('msg', '
                        <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <strong>BONUS! </strong>Cliente completou 10 empréstimos, este é por conta da casa.</div>'
                     );
               
                    return $this->redirect(['view', 'id' => $model->id]);
                    
                } else {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }
        

        return $this->render('create', [
            'model' => $model,
            'titulos' => Titulo::getAvailableTitulos(),
        ]);
        
        /*
        return $this->render('create', [
            'model' => $model,
            //'dataProvider' => $dataProvider,
        ]);
         * 
         */
    }

    /**
     * Updates an existing Emprestimo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = EmprestimoComTitulos::findOne($id);
        $model->loadTitulos();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $model->saveTitulos();
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'titulos' => Titulo::getAvailableTitulos(),
        ]);
    }
            
    /*        
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }*/

    /**
     * Deletes an existing Emprestimo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        
        return $this->redirect(['index']);
    }
    
    public function actionDevolver($id)
    {
        
        $model = $this->findModel($id);
        $model->situacao = '2';
        $model->save();
        $model->devolver();
        $model->addBonus();
        
        return $this->redirect(['index']);
   
    }

    /**
     * Finds the Emprestimo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Emprestimo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Emprestimo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    public function getCliente()
    {
        return $this->hasOne(\app\models\Cliente::className(), ['id' => 'cliente_id']);
      
    }
    
    public function getFuncionario()
    {
    
    }
}
