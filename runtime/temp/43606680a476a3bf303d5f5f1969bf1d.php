<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:40:"./views/home/mobile/register\index.phtml";i:1571712517;}*/ ?>
<html>
<head>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>注册</title>
    <link href="/static/home/mobile/css/reset_5.css" rel="stylesheet" type="text/css">
    <link href="/static/home/mobile/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/static/home/mobile/css/new_style.css">
    <link rel="stylesheet" href="/static/home/mobile/css/font-awesome.min.css">

    <script type="text/javascript" src="/static/home/mobile/js/jquery.min.js"></script>
    <!-- 弹出层 -->
    <link rel="stylesheet" href="/static/plugins/dialog/css/dialog.css" />
    <script src="/static/plugins/dialog/lib/zepto.min.js"></script>
    <script src="/static/plugins/dialog/js/dialog.js"></script>
    <!-- 弹出层 -->
    <script type="text/javascript" src="/static/home/mobile/js/global.js"></script>
</head>
<body>
    <style>
        .site-header .tit-name {
            overflow: initial;
        }
        #tomial {
            width: 100%;
            height: 30px;
            color: #fff;
            font-size: 14px;
            background-color: #FE4B1C;
            pointer-events: initial;
            border: none;
            border-radius: 3px;
            outline: none;
            -webkit-appearance: none;
        }
    </style>

    <div class="site-header registerTitle">
        <a href="/home.html" class="back"></a>
        <div class="tit-name"><img src="<?php echo to_media(!empty($site['logo'])?$site['logo']:''); ?>"></div>
    </div>
    <div class="main-cont">
        <div class="main registerMain">
            <div class="member-tab">
                <ul class="m_tab_tit">
                    <li class="nobg">
                        <a href="/home/auth/login.html">账号登录</a>
                    </li>
                    <li class="active libg">
                        <a href="/home/register.html">免费注册</a>
                    </li>
                </ul>
            </div>
            <div class="denglu-box">
                <form id="register_form">
                    <div class="dl-form">
                    <div class="item-box">
                        <input id="username" name="username" placeholder="手机号" type="text" class="m_txt">
                    </div>
                    <div class="item-box" style="display: none;">
                        <input name="email" placeholder="邮箱，可用于找回密码" type="email" class="m_txt">
                    </div>
                    <div class="item-box">
                        <input name="password" type="password" class="m_txt" placeholder="输入密码">
                    </div>
                    <div class="item-box">
                        <input name="password_confirm" type="password" class="m_txt" placeholder="确认密码">
                    </div>
                    <div class="item-box">
                        <input type="text" class="m_txt" placeholder="输入验证码" id="captcha" name="captcha">
                        <div class="yzm">
                            <img style="width:90px; height:30px;"  src="<?php echo captcha_src(); ?>" onclick="this.src='<?php echo captcha_src(); ?>?'+Math.random()" alt="captcha" />
                        </div>
                    </div>
                    <!--<div class="item-box">
                        <input id="verification" name="verification" class="button1 active m_txt" placeholder="请输入短信验证码" required />
                        <div class="yzm">
                            <button type="button" id="tomial" class="btn btn-primary text-center">发送验证码</button>
                        </div>
                    </div>-->
                </div>
                <input type="hidden" name="parent_uid" value="<?php echo $parent_uid; ?>" />
                </form>
            </div>
        </div>
        <div class="member-btn">
            <input type="button" class="button1 active js-register" value="确认注册">
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            //确认注册
            $('.js-register').click(function () {
                $.post(
                    window.location.href,
                    $('#register_form').serialize(),
                    function(res) {
                        $('.yzm img').click();
                        message(res.message,res.redirect,res.type);
                    },'json'
                );
            });

            //回车登录
            $(document).keyup(function(event){
                if(event.keyCode ==13){
                    $('.js-register').click();
                }
            });

            $('#tomial').click(function(){
                var mobile = $("#username").val();
                var partten = /^1[3-9]\d{9}$/;
                if(!partten.test(mobile)){
                    message('请输入正确的手机号','','error');
                    return false;
                }

                var validate = $.trim($("#captcha").val());
                if(validate == '') {
                    message('请输入验证码','','error');
                    return false;
                }

                $("#tomial").attr("disabled", true);

                var data = {
                    type: 2,
                    mobile: mobile,
                    validate: validate
                };
                Common.ApiPost("/home/register/sendsmscode", data, function (res) {
                    if(res.type != "success"){
                        $('.yzm img').click();
                        $("#tomial").attr("disabled", false);
                        message(res.message,res.redirect,res.type);
                        return;
                    }
                    new invokeSettime("#tomial");
                }, function (res) {
                    $('.yzm img').click();
                    $("#tomial").attr("disabled", false);
                    message(res.message,res.redirect,res.type);
                });
            });
        });

    function invokeSettime(obj){
        var countdown=60;
        settime(obj);
        function settime(obj) {
            if (countdown == 0) {
                $(obj).attr("disabled",false);
                $(obj).text("获取验证码");
                countdown = 60;
                return;
            } else {
                $(obj).attr("disabled",true);
                $(obj).text("(" + countdown + ") s 重发");
                countdown--;
            }
            setTimeout(function() {
                    settime(obj) }
                ,1000)
        }
    }
    </script>
</body>
</html>