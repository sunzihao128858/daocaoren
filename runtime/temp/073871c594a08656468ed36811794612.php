<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:33:"./views/admin/pc/auth\login.phtml";i:1571712517;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <link rel="stylesheet" type="text/css" href="/static/plugins/SmallPop/spop.min.css">
    <style type="text/css">
        html, body {
            padding: 0;
            margin: 0;
            height: 100%;
            font-size: 16px;
            background-repeat: no-repeat;
            background-position: left top;
            background-color: #242645;
            color: #fff;
            background-size: cover;
            background-image: url(/static/admin/web/images/bg1.jpg);
        }
        body .login {
            box-shadow: -15px 15px 15px rgba(6, 17, 47, 0.7);
            opacity: 1;
            -webkit-transition-timing-function: cubic-bezier(0.68, -0.25, 0.265, 0.85);
            -webkit-transition-property: -webkit-transform,opacity,box-shadow,top,left;
            transition-property: transform,opacity,box-shadow,top,left;
            -webkit-transition-duration: .5s;
            transition-duration: .5s;
            -webkit-transform-origin: 161px 100%;
            -ms-transform-origin: 161px 100%;
            transform-origin: 161px 100%;
            -webkit-transform: rotateX(0deg);
            transform: rotateX(0deg);
            width: 240px;
            height: 300px;
            position: absolute;
            left: 0;
            right: 0;
            margin: auto;
            top: 0;
            bottom: 0;
            padding: 100px 40px 40px 40px;
            background: #35394a;
            background: -webkit-gradient(linear, left bottom, right top, color-stop(0%, #35394a), color-stop(100%, rgb(0, 0, 0)));
            background: -webkit-linear-gradient(230deg, rgba(53, 57, 74, 0) 0%, rgb(0, 0, 0) 100%);
            background: linear-gradient(230deg, rgba(53, 57, 74, 0) 0%, rgb(0, 0, 0) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='rgba(53, 57, 74, 0)', endColorstr='rgb(0, 0, 0)',GradientType=1 );
        }
        body .login .disclaimer {
            position: absolute;
            bottom: 20px;
            left: 35px;
            width: 250px;
        }
        body .login_title {
            color: #D3D7F7;
            height: 60px;
            text-align: left;
            font-size: 16px;
        }
        body .login_fields {
            height: 208px;
            position: absolute;
            left: 0;
        }
        body .login_fields .icon {
            width: 40px;
            height: 40px;
            display: flex;
            display: -webkit-flex;
            align-items: center;
            justify-content: center;
        }
        body .login_fields input[type='password'],body .login_fields input[type='text'] {
            color: #61BFFF !important;
        }
        body .login_fields input[type='text'], body .login_fields input[type='password'] {
            color: #afb1be;
            width: 240px;
            margin-top: -2px;
            background: rgba(57, 61, 82, 0);
            left: 0;
            padding: 10px 5px;
            border-top: 2px solid rgba(57, 61, 82, 0);
            border-bottom: 2px solid rgba(57, 61, 82, 0);
            border-right: none;
            border-left: none;
            outline: none;
            font-family: 'Gudea', sans-serif;
            box-shadow: none;
        }
        body .login_fields__user, body .login_fields__password {
            display: flex;
            display: -webkit-flex;
            margin-top: 10px;
        }
        body .login_fields__submit {
            position: relative;
            top: 17px;
            left: 0;
            width: 80%;
            right: 0;
            margin: auto;
        }
        body .login_fields__submit .forgot {
            float: right;
            font-size: 10px;
            margin-top: 11px;
            text-decoration: underline;
        }
        body .login_fields__submit .forgot a {
            color: #606479;
        }
        body .login_fields__submit input {
            border-radius: 50px;
            background: transparent;
            padding: 10px 50px;
            border: 2px solid #4FA1D9;
            color: #4FA1D9;
            text-transform: uppercase;
            font-size: 11px;
            -webkit-transition-property: background,color;
            transition-property: background,color;
            -webkit-transition-duration: .2s;
            transition-duration: .2s;
        }
        body .login_fields__submit input:focus {
            box-shadow: none;
            outline: none;
        }
        body .login_fields__submit input:hover {
            color: white;
            background: #4FA1D9;
            cursor: pointer;
            -webkit-transition-property: background,color;
            transition-property: background,color;
            -webkit-transition-duration: .2s;
            transition-duration: .2s;
        }
        .code-imgbox{
            position: absolute;
            z-index: 1;
            right: 0;
            top: 0;
        }
        .code-imgbox img{
            width: 120px;
            height: 40px;
        }
    </style>
    <script type="text/javascript" src="/static/plugins/SmallPop/spop.min.js"></script>
    <!-- jQuery 3 -->
    <script src="/static/plugins/jquery/jquery.min.js"></script>
    <script src="/static/admin/web/js/global.js"></script>
</head>
<body>
<div class="login">
    <div class="login_title">
        <span>管理员登录</span>
    </div>
    <div class="login_fields">
        <form id="login_form">
            <div class="login_fields__user">
                <div class="icon">
                    <img src="/static/admin/web/images/user_icon_copy.png">
                </div>
                <input name="username" placeholder="请输入用户名" maxlength="20" type="text" autofocus>
            </div>
            <div class="login_fields__password">
                <div class="icon">
                    <img src="/static/admin/web/images/lock_icon_copy.png">
                </div>
                <input name="password" placeholder="请输入密码" maxlength="20" type="password">
            </div>
            <div class="login_fields__password" style="position: relative">
                <div class="icon">
                    <img src="/static/admin/web/images/key.png">
                </div>
                <input name="captcha" placeholder="验证码" maxlength="8" type="text">
                <div class="code-imgbox">
                    <img src="<?php echo captcha_src(); ?>" onclick="this.src='<?php echo captcha_src(); ?>?'+Math.random()" alt="captcha" />
                </div>
            </div>
            <div class="login_fields__submit">
                <input class="js-login" type="button" value="登录">
            </div>
        </form>
    </div>
    <div class="success">
    </div>
    <div class="disclaimer">
        <p>欢迎登录后台管理系统</p>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        //登录处理
        $('.js-login').click(function () {
            $.post(
                window.location.href,
                $('#login_form').serialize(),
                function (res) {
                    $('.code-imgbox img').click();
                    message(res.message,res.redirect,res.type);
                }
            );
        });

        //回车登录
        $(document).keyup(function(event){
            if(event.keyCode ==13){
                $('.js-login').click();
            }
        });
    });
</script>
</body>
</html>