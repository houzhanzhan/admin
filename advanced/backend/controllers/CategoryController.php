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

class CategoryController extends Controller{
//    public $layout = 'back';
    /**
     * 产品展示->添加->删除
     */
    public function actionCategory_list(){
        $sql="select * from productinfo";
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $count=count($data);
        return $this->renderPartial('category_list',array('data'=>$data,'count'=>$count));
    }
    public function actionCategory_list_add(){
        if($_GET){
            return $this->renderPartial('category_list_add');
        }else{
            $data = $_POST[''];
            print_r($data);die;
            $add_time=time();
            return $this->redirect(["category/category_list"]);
        }

    }
    public function actionCategory_list_del(){
        $id=Yii::$app->request->get('id');
        $sql = "delete from productinfo where id=$id";
        Yii::$app->db->createCommand($sql)->execute();
        return $this->redirect(["category/category_list"]);
    }
    /**
     * 产品分类展示->添加->删除
     */
    public function actionCategory_type(){
        return $this->renderPartial('category_type');
    }
    public function actionCategory_type_add(){
        return $this->renderPartial('');
    }
    public function actionCategory_type_del(){
        return $this->renderPartial('');
    }
}