<?php

namespace app\controllers;

use app\models\Task;
use Yii;
use app\models\User;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->actionTest();
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);



        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTest() {
        /*
         $user = new User();
             $user->username = 'Alex';
             $user->password_hash = 'dsfddf';
             $user->auth_key = 'key1';
             $user->creator_id = 1;
             $user->updater_id = 1;
             $user->created_at = 323;
             $user->updated_at = 444;
         $user->save();

        $user = new User();
        $user->username = 'Kirill';
        $user->password_hash = 'dsfddf';
        $user->auth_key = 'key2';
        $user->creator_id = 2;
        $user->updater_id = 2;
        $user->created_at = time();
        $user->updated_at = time();
        $user->save();

        $user = new User();
        $user->username = 'Anton';
        $user->password_hash = 'dsfddf';
        $user->auth_key = 'key3';
        $user->creator_id = 3;
        $user->updater_id = 3;
        $user->created_at = time();
        $user->updated_at = time();
        $user->save();

     $user = User::findOne(2);
       $task = new Task();
            $task->title = 'title1';
            $task->description = 'desc1';
            $task->created_at = time();
            $task->link(Task::RELATION_CREATOR, $user);

       $task = new Task();
            $task->title = 'title2';
            $task->description = 'desc2';
            $task->created_at = time();
            $task->link(Task::RELATION_CREATOR, $user);

       $task = new Task();
            $task->title = 'title3';
            $task->description = 'desc3';
            $task->created_at = time();
            $task->link(Task::RELATION_CREATOR, $user);
        */

     /*$models = User::find()->with(User::RELATION_TASKS)->all();
        foreach ($models as $model) {
            _end($model);
        } */

    /* $models = User::find()->innerJoinWith(User::RELATION_TASKS)->all();
        foreach ($models as $model) {
            _end($model);
        } */

       /* $user = User::findOne(8);
        $task = new Task();
            $task->title = 'task10';
            $task->description = 'good task';
            $task->created_at = time();

        $task->link(Task::RELATION_CREATOR, $user);

       $task = Task::findOne(7);
       _end($task->getAccessedUsers()->all());
       */
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->id !=8) {
            throw new ForbiddenHttpException('Ошибка доступа!');
        }
        $model = new User();
        //$model->creator_id = 1;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->id !=11) {
            throw new ForbiddenHttpException('Ошибка доступа!');
        }
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
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

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
