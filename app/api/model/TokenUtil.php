<?php


namespace app\api\model;


use think\Db;
use think\Model;

class TokenUtil extends Model{

    public static function getMemberInfo($uid,$token){
        $memberinfo =   Db::name('member')->field("token")
                        ->where(['uid'=>$uid])->find();
        if($memberinfo['token'] == $token){
            return true;
        }else{
            return false;
        }
    }

}