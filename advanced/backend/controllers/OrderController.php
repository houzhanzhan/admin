<?php
/**
 * Created by PhpStorm.
 * User: B41
 * Date: 2017/9/1
 * Time: 15:03
 */

namespace backend\controllers;
use yii;
use yii\web\Controller;

class OrderController extends Controller{
    public $layout = 'back';
    public function actionOrder(){
        return $this->renderPartial('order');
    }
}