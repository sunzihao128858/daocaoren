<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/3/30
 * Time: 下午2:07
 */
namespace app\api\controller;
use app\api\model\Token;
use app\api\model\TokenUtil;
use think\Config;
use think\Controller;
use think\response\Json;

class Base extends Controller
{




    public function _initialize() {

//        echo 34;die;
        //print_r($this->request->request());die;
//        $request = $this->request->request();
//        var_dump(!isset($request['token']));die;
//        if(!isset($request['token'])){
//            echo  (json_encode(['status'=>'500','msg'=>'错误']));
//            die;
//            echo 45465;die;
//        }
//        if($request['token'] == ""){
//            echo 45;die;
//            return json(['status'=>'500','msg'=>'错误']);
//        }
//        echo  json_encode(['status'=>'500','msg'=>'错误']);//        die;
//        $jwtToken = new Token();
//        $checkToken = $jwtToken->checkToken($request['token']);
//        $data = (array)$checkToken['data']['data'];
//        echo "token: ";
//        print_r($data);die;
        $this->_checkLogin();
    }
    /**
     * 检查是否需要登录
     */
    private function _checkLogin(){
        $controller =   $this->request->controller();//获得控制器名
        $action     =   $this->request->action();//获得处理器名

//        print_r(Config::get('need_login'));
//        print_r($controller);
//        die;
        if(in_array(strtolower($controller.".".$action),Config::get('need_login'))){
            $request = $this->request->request();
            $jwtToken = new Token();
            if(isset($request['token'])){
                $checkToken = $jwtToken->checkToken($request['token']);
                //print_r($checkToken);die;
                if($checkToken['status'] == 200){
                    if(!TokenUtil::getMemberInfo($checkToken['data']['data']->uid, $request['token'])){
                        echo json_encode([
                            'status'=>'404',
                            'msg'=>"token错误",
                            'data'=>[],
                        ]);
                        die;
                    }
                }else{
                    echo json_encode([
                        'status'=>'404',
                        'msg'=>"已失效, 请重新登录",
                        'data'=>[],
                    ]);
                    die;
                }
            }else{
                echo json_encode([
                    'status'=>'404',
                    'msg'=>"token错误",
                    'data'=>[],
                ]);
                die;
            }

        }

    }
}