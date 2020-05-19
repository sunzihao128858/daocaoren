<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:40:"./views/home/mobile/activity\index.phtml";i:1571712517;s:51:"D:\www\public\views\home\mobile\common\footer.phtml";i:1571712517;}*/ ?>
﻿<!DOCTYPE HTML>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
		<title>推推推广活动</title>
		<link rel="shortcut icon" href="clientapp/images/new_images/favicon.ico"/>
		<link href="/static/home/mobile/css/reset_5.css" rel="stylesheet" type="text/css" />
		<link href="/static/home/mobile/css/style.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="/static/home/mobile/css/font-awesome.min.css">
		<link rel="stylesheet" href="/static/home/mobile/css/new_style.css"/>
		<link rel="stylesheet" href="/static/home/mobile/css/new_page.css"/>
	</head>
    <style type="text/css">
    	.site-header .tit-name{
    		text-indent: 0px;
    		padding-left: 0;
    	}
    </style>
	<body style="background: #fff;">
		<header class="site-header header-fixed">
			<div class="tit-name">活动</div>
		</header>
		<div class="new-active-list">
			<ul>
				<li>
					<a href="/home/activity/luckydraw.html">
						<img src="/static/home/mobile/picture/ad01.png" />
						<span>参与抽奖将消耗100积分 <img src="/static/home/mobile/picture/ard.png"/></span>
					</a>
				</li>
				<li>
					<a href="/home/invite.html">
						<img src="/static/home/mobile/picture/ad02.png" />
						<span>好友提现5元我得0.5元，好友做任务我得25%返利<img src="/static/home/mobile/picture/ard.png"/></span>
					</a>
				</li>
				<li>
					<a href="/home/account.html">
						<img src="/static/home/mobile/picture/ad03.png" />
						<span>每日签到领积分 <img src="/static/home/mobile/picture/ard.png"/></span>
					</a>
				</li>
			</ul>
		</div>

        <footer class="new-footer">
    <ul>
        <li>
            <a href="/home/index.html">
                <img <?php if($controller != 'index'): ?>class="gray"<?php endif; ?> src="/static/home/mobile/picture/home.png" />
                <span>首页</span>
            </a>
        </li>
        <li>
            <a href="/home/activity.html">
                <img  <?php if($controller != 'activity'): ?>class="gray"<?php endif; ?>  src="/static/home/mobile/picture/activity.png" />
                <span>活动</span>
            </a>
        </li>
        <li>
            <a href="/home/task/add.html">
                <span class="add-span"></span>
                <span>发布</span>
            </a>
        </li>
        <li>
            <a href="/home/invite.html">
                <img  <?php if($controller != 'invite'): ?>class="gray"<?php endif; ?>  src="/static/home/mobile/picture/news.png" />
                <span>收徒</span>
            </a>
        </li>
        <li>
            <a href="/home/account.html">
                <img <?php if($controller != 'account'): ?>class="gray"<?php endif; ?>  src="/static/home/mobile/picture/users.png" />
                <span>我的</span>
            </a>
        </li>
    </ul>
</footer>
</body>
</html>