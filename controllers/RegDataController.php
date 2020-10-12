<?php

namespace app\controllers;

use Yii;
use app\models\RegData;
use app\models\RegDataQuery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\grid\EditableColumnAction;
use yii\helpers\ArrayHelper;

/**
 * RegDataController implements the CRUD actions for RegData model.
 */
class RegDataController extends Controller
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
     * Lists all RegData models.
     * @return mixed
     */

    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [
            'editstatus' => [                                       // identifier for your editable column action
                'class' => EditableColumnAction::className(),     // action class name
                'modelClass' => RegData::className(),                // the model for the record being edited
                'outputValue' => function ($model, $attribute, $key, $index) {
                      return '';      // return any custom output value if desired
                },
                'outputMessage' => function($model, $attribute, $key, $index) {
                      return '';                                  // any custom error to return after model save
                },
                'showModelErrors' => true,                        // show model validation errors after save
                'errorOptions' => ['header' => ''],                // error summary HTML options
                'postOnly' => true,
                'ajaxOnly' => true,
                // 'findModel' => function($id, $action) {},
                // 'checkAccess' => function($action, $model) {}
            ],
            'editlicens' => [                                       // identifier for your editable column action
                'class' => EditableColumnAction::className(),     // action class name
                'modelClass' => RegData::className(),                // the model for the record being edited
                'outputValue' => function ($model, $attribute, $key, $index) {
                      return '';      // return any custom output value if desired
                },
                'outputMessage' => function($model, $attribute, $key, $index) {
                      return '';                                  // any custom error to return after model save
                },
                'showModelErrors' => true,                        // show model validation errors after save
                'errorOptions' => ['header' => ''],                // error summary HTML options
                // 'postOnly' => true,
                // 'ajaxOnly' => true,
                // 'findModel' => function($id, $action) {},
                // 'checkAccess' => function($action, $model) {}
            ]
        ]);
    }
    public function actionIndex()
    {
        $searchModel = new RegDataQuery;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

    // if (Yii::$app->request->post('hasEditable')) {

    //     $status = Yii::$app->request->post('editableKey');
    //     $model = RegData::findOne($status);

    //     $out = Json::encode(['output'=>'', 'message'=>'']);

    //     $posted = current($_POST['RegData']);
    //     $post = ['RegData' => $posted];

    //     if ($model->load($post)) {
    //     $model->save();

    //     $output = '';

    //     if (isset($posted['status'])) {
    //     $output = Yii::$app->formatter->asText($model->status);
    //     }

    //     // similarly you can check if the name attribute was posted as well
    //     if (isset($posted['status'])) {
    //     $output = ''; // process as you need
    //     }
    //     $out = Json::encode(['output'=>$output, 'message'=>'']);
    //     }
    //     echo $out;
    //     return;
    // }
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }
    /**
     * Displays a single RegData model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('view', ['model' => $model]);
        }
    }

    /**
     * Creates a new RegData model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RegData;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing RegData model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing RegData model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RegData model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RegData the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RegData::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
