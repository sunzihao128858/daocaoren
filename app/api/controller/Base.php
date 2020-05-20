<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/3/30
 * Time: 下午2:07
 */
namespace app\api\controller;
use app\api\model\Token;
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
    }
}