<?php

namespace app\controllers;

use app\models\Product;
use yii\data\Sort;
use yii\db\Query;
use yii\web\Controller;

class TestController extends Controller
{
    public function actionIndex(){

        $prop = \yii::$app->test->run();

        $product = new Product();
        $product -> id = 1;
        $product -> name = 'Имя';
        $product -> price = 'цена';
        //$product -> prop =  $prop;

        //$this->actionInsert();
        $this->actionSelect();



        return $this -> render('index', [
           'product' => $product,
        ]);
    }

    public function actionInsert() {

        \Yii::$app->db->createCommand()->batchInsert('task', ['title', 'description', 'creator_id', 'updater_id', 'created_at', 'updated_at'], [
            ['title1', 'desc1', 1, 1, 111, 121],
            ['title2', 'desc2', 2, 2, 222, 232],
            ['title3', 'desc3', 3, 3, 333, 343],
        ])->execute();

        \Yii::$app->db->createCommand()->insert('user', [
            'username' => 'alex',
            'password_hash' => 123,
            'auth_key' => 'key',
            'creator_id' => 1,
            'updater_id' => 1,
            'created_at' => 323,
            'updated_at' => 444,
        ])->execute();

        \Yii::$app->db->createCommand()->insert('user', [
            'username' => 'Kiril',
            'password_hash' => 222,
            'auth_key' => 'key2',
            'creator_id' => 2,
            'updater_id' => 2,
            'created_at' => 222,
            'updated_at' => 232,
        ])->execute();

        \Yii::$app->db->createCommand()->insert('user', [
            'username' => 'Ivan',
            'password_hash' => 333,
            'auth_key' => 'key3',
            'creator_id' => 3,
            'updater_id' => 3,
            'created_at' => 333,
            'updated_at' => 343,
        ])->execute();

        \Yii::$app->db->createCommand()->insert('user', [
            'username' => 'Alla',
            'password_hash' => 444,
            'auth_key' => 'key4',
            'creator_id' => 4,
            'updater_id' => 4,
            'created_at' => 444,
            'updated_at' => 454,
        ])->execute();

        $data = \Yii::$app->db->createCommand()->insert('user', [
            'username' => 'Nikolaj',
            'password_hash' => 555,
            'auth_key' => 'key5',
            'creator_id' => 5,
            'updater_id' => 5,
            'created_at' => 555,
            'updated_at' => 565,
        ])->execute();
        _end($data);
    }

    public function actionSelect() {
        //$data = (new Query()) -> from('user') -> select(['id', 'username', 'password_hash']) -> where(['id' => 1]) -> all();
        //$data = (new Query()) -> from('user') -> select(['id', 'username', 'password_hash']) -> where(['>', 'id', '1']) -> orderBy(['username' => SORT_STRING]) -> all();
        //$data = (new Query()) -> from('user') -> count();
        $data = (new Query()) -> from('task')->innerJoin('user', 'task.creator_id = user.creator_id')->all();
        _end($data);
    }
}
