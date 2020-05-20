<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/1/19
 * Time: 19:56
 */

namespace app\api\controller;

use app\admin\model\Invitation;
use app\base\output\Json;
use app\home\model\Member;
use think\Controller;
use think\Cookie;
use think\exception\ErrorException;
use think\Loader;
use think\Db;
use app\api\model\Token;

class Auth extends  Controller{

    public function api_check(){
        $request = $this->request->request();

        $jwtToken = new Token();
        try{
            $checkToken = $jwtToken->checkToken($request['token']);
        }catch (ErrorException $e){
            print_r(454);die;
        }

        print_r($checkToken);die;
    }



    /** 登录接口
     * @return \think\response\Json
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function login(){
        if($this->request->request()){
            $params = ($this->request->post());

            $validate = new \think\Validate([
                ['username', 'require|number', '缺少必要参数: username'],
                ['password', 'require', '缺少必要参数: password'],
            ]);
            if (!$validate->check($params)) {
                return json([
                    'status'=>'404',
                    //'msg'=>$validate->getError(),
                    'msg'=>"用户名或密码错误",
                    'data'=>[],
                ]);
            }else{
                $member_info    =   Db::name('member')->field("uid,salt,password")->where(['username'=>$params['username']])->find();
                if($member_info == NULL){
                    return json([
                        'status'=>'405',
                        'msg'=>"未注册",
                        'data'=>[],
                    ]);
                }else{
                    $new_password   =   md5_password($params['password'],$member_info['salt']);
                    if($new_password == $member_info['password']){

                        $jwtToken = new Token();
                        $token = $jwtToken->newCreateToken($member_info['uid'], $params['username']);
                        if(Db::name('member')->where(['uid' => $member_info['uid']])->update(['token' => $token['token']])){
                            return json([
                                'status'=>'200',
                                'msg'=>"密码正确",
                                'data'=>['token'=>$token['token']],
                            ]);
                        }else{
                            return json([
                                'status'=>'500',
                                'msg'=>"服务器错误",
                                'data'=>[],
                            ]);
                        }

                    }else{
                        return json([
                            'status'=>'404',
                            'msg'=>"用户名或密码错误",
                            'data'=>[],
                        ]);
                    }
                }


            }
        }else{
            return json([
                'status'=>'500',
                'msg'=>'服务器错误',
                'data'=>[],
                ]);die;
        }

    }


    public function register(){
        if($this->request->request()){
            $params = ($this->request->post());
            if(isset($params['password'])){
                $params['password'] = trim($params['password']);
            }
            $validate = new \think\Validate([
                //['username', 'require|number', '缺少必要参数: username'],
                ['username','require|max:11|/^1[3-9]{1}[0-9]{9}$/','请输入手机号码|手机号码最多不能超过11个字符|手机号码格式不正确'],
                ['password', 'require|min:6', '密码不合规'],
            ]);
            if (!$validate->check($params)) {
                return json([
                    'status'=>'404',
                    'msg'=>$validate->getError(),
                    'data'=>[],
                ]);
            }else{
                $params['salt'] = random(8);
                $params['password'] = md5_password($params['password'],$params['salt']);
                $params['create_time'] = TIMESTAMP;
                $insert_member_id = Member::addInfo($params);
                if(!$insert_member_id){
                    return json([
                        'status'=>'200',
                        'msg'=>"注册失败",
                        'data'=>[],
                    ]);
                }else{
                    return json([
                        'status'=>'200',
                        'msg'=>"注册成功",
                        'data'=>[],
                    ]);
                }
            }
        }else{
            return json([
                'status'=>'500',
                'msg'=>'服务器错误',
                'data'=>[],
            ]);die;
        }
    }
    //注册
    public function register2(){
        $parent_uid = intval(trim(params('i')));

        if(request()->isAjax()){
            $params = array_trim(request()->post());
            $validate = Loader::validate('Member');
            if(!$validate->check($params)){
                message($validate->getError(),'','error');
            }

            $parent_member = [];
            if ($parent_uid > 0) {
                $parent_member = Member::getUserInfoById($parent_uid);
                if (!$parent_member) {
                    message('邀请失败','','error');
                }
            }

            Db::startTrans();
            $params['parent_uid'] = $parent_uid;
            $params['salt'] = random(8);
            $params['password'] = md5_password($params['password'],$params['salt']);
            $params['create_time'] = TIMESTAMP;
            unset($params['password_confirm'],$params['invitation_code'],$params['captcha']);
            $insert_member_id = Member::addInfo($params);
            if(!$insert_member_id){
                message('注册失败','','error');
            }

            if ($parent_uid > 0) {
                $status3 = Invitation::addInfo([
                    'uid' => $parent_member['uid'],
                    'username' => $parent_member['username'],
                    'invite_uid' => $insert_member_id,
                    'invite_username' => $params['username'],
                    'create_time' => TIMESTAMP
                ]);
                if(!$status3){
                    Db::rollback();
                    message('注册失败','','error');
                }

                $status4 = Member::updateInviteInfo($parent_uid);
                if(!$status4){
                    Db::rollback();
                    message('注册失败','','error');
                }
            }

            Db::commit();

            message('注册成功','/home/auth/login.html','success');
        }
        return $this->fetch(__FUNCTION__, [
            'parent_uid' => $parent_uid
        ]);
    }

    public function findpwd(){
        return $this->fetch(__FUNCTION__);
    }
}