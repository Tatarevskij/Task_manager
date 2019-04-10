<?php

namespace app\controllers;

use app\models\Product;
use yii\web\Controller;

class TestController extends Controller
{
    public function actionIndex(){

        $prop = \yii::$app->test->run();

        $product = new Product();
        $product -> id = 1;
        $product -> name = 'Имя';
        $product -> category = 'Категория';
        $product -> price = 'цена';
        $product -> prop =  $prop;

        return $this -> render('index', [
            'product' => $product,
        ]);


    }
}
