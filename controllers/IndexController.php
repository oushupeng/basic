<?php
namespace app\controllers;
use yii\web\Controller;
use app\models\Admin;
use Yii;
 
class IndexController extends Controller
{
    public function actionIndex()
    {
//      不使用布局
        //$this->layout = false;
        $model = new Admin;
//        是否是post提交
        if (Yii::$app->request->isPost) {
//            获得post提交参数
            $post = Yii::$app->request->post();
            if($model->login($post)){
                return "登陆成功";
            } else {
                return "登陆失败";
            }
        } else {
            return $this->render("index", ['model' => $model]);
        }
    }
 
}