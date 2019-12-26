<?php
namespace app\models;
use yii\db\ActiveRecord;
use Yii;
class Admin extends ActiveRecord
{
    public static function tableName()
    {
        return "{{%shop_admin}}";
    }
 
    public function rules()
    {
        return [
            ['adminuser', 'required'],
            ['adminpass', 'required'],
            ['adminpass', 'validatePass']
        ];
    }
 
    public function validatePass()
    {
        if (!$this->hasErrors()) {
//            判断用户名密码是否正确
            $data = self::find()
                ->where(['adminuser' => $this->adminuser])
                ->andwhere(['adminpass' => md5($this->adminpass)])
                ->one();
            if (is_null($data)) {
                $this->addError('adminpass', 'adminuser or adminpass error');
            }
        }
    }
    public function login($data)
    {
        if($this->load($data) && $this->validate()) {
//            登陆信息写入session
            $session = Yii::$app->session;
            $session->open();
            $session->set('adminuser', $this->adminuser);
//           更新登陆时间和IP
            //$this->updateAll(['logintime' => time(), 'loginip' => ip2long(Yii::$app->request->userIP)], ['adminuser' => $this->adminuser]);
            return true;
        }
        return false;
    }
}