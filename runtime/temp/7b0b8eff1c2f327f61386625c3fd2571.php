<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:36:"./views/admin/pc/taskjoin\post.phtml";i:1571712517;s:73:"D:\soft\xampp\htdocs\daocaoren2\public\views\admin\pc\common\header.phtml";i:1571712517;s:74:"D:\soft\xampp\htdocs\daocaoren2\public\views\admin\pc\common\sidebar.phtml";i:1581344509;s:72:"D:\soft\xampp\htdocs\daocaoren2\public\views\admin\pc\taskjoin\nav.phtml";i:1571712517;s:73:"D:\soft\xampp\htdocs\daocaoren2\public\views\admin\pc\taskjoin\tabs.phtml";i:1571712517;s:73:"D:\soft\xampp\htdocs\daocaoren2\public\views\admin\pc\common\footer.phtml";i:1581344425;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>管理系统 | 管理后台</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- 弹出框 -->
    <link rel="stylesheet" type="text/css" href="/static/plugins/SmallPop/spop.min.css">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/static/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/static/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/static/plugins/Ionicons/css/ionicons.min.css">
    <!-- 图片展示插件样式 -->
    <link rel="stylesheet" href="/static/plugins/magnify/dist/jquery.magnify.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/static/plugins/AdminLTE/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/static/plugins/AdminLTE/css/skins/_all-skins.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="/static/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="/static/plugins/html5shiv.min.js"></script>
    <script src="/static/plugins/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="/static/plugins/SmallPop/spop.min.js"></script>
    <!-- jQuery 3 -->
    <script src="/static/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="/static/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="/static/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- 剪切板 -->
    <script type="text/javascript" src="/static/plugins/clipboard.min.js"></script>
    <!-- 图片展示插件 -->
    <script type="text/javascript" src="/static/plugins/magnify/dist/jquery.magnify.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/static/plugins/AdminLTE/js/adminlte.min.js"></script>
    <!--引入JS-->
    <script src="/static/admin/web/js/global.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="/admin" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>系统</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>管理系统</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img onerror="this.src='/static/admin/web/images/avatar.png'" src="<?php echo to_media($admin['avatar']); ?>" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?php echo $admin['username']; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img onerror="this.src='/static/admin/web/images/avatar.png'" src="<?php echo to_media($admin['avatar']); ?>" class="img-circle" alt="User Image">
                                <p>
                                    <?php echo $admin['username']; ?>
                                    <small><?php echo date('Y年m月d日'); ?></small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo U('index/profile'); ?>" class="btn btn-default btn-flat">资料设置</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo U('auth/login'); ?>" class="btn btn-default btn-flat">退出</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img onerror="this.src='/static/admin/web/images/avatar.png'" src="<?php echo to_media($admin['avatar']); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $admin['username']; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i>在线</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">功能菜单</li>

            <?php if(is_array($treeMenu) || $treeMenu instanceof \think\Collection || $treeMenu instanceof \think\Paginator): $i = 0; $__LIST__ = $treeMenu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$oo): $mod = ($i % 2 );++$i;if($oo['childnum'] == '0'): ?>
                <li <?php if(menuActive($oo['name'], $oo['level'])): ?>class="active"<?php endif; ?>><a href="<?php echo U($oo['name']); ?>"><i class="<?php echo $oo['icon']; ?>"></i><span><?php echo $oo['title']; ?></span></a></li>
                <?php elseif($oo['level'] == '1'): ?>
                <li class="treeview <?php if(menuActive($oo['name'], $oo['level'])): ?>active<?php endif; ?>">
                    <a href="javascript:void(0);">
                        <i class="<?php echo $oo['icon']; ?>"></i><span><?php echo $oo['title']; ?></span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                        <?php if(is_array($oo['children']) || $oo['children'] instanceof \think\Collection || $oo['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $oo['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$to): $mod = ($i % 2 );++$i;?>
                        <li <?php if(menuActive($to['name'])): ?>class="active"<?php endif; ?>><a href="<?php echo U($to['name']); ?>"><i class="<?php echo $to['icon']; ?>"></i><?php echo $to['title']; ?></a></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </li>
                <?php endif; endforeach; endif; else: echo "" ;endif; if($_SERVER['SERVER_NAME'] == 'tuiguang.51muma.com'): ?>
            <li <?php if(in_array($controller,['lock'])): ?>class="active"<?php endif; ?>>
            <a href="<?php echo U('lock/index'); ?>">
                <i class="fa fa-dashboard"></i>
                <span>授权管理</span>
            </a>
            </li>
            <?php endif; ?>

            <li class="header">其他功能</li>
            <li><a href="http://%77%77%77%2E%73%6F%75%68%6F%2E%6E%65%74" target="_blank">
                    <i class="fa fa-circle-o text-red"></i>
                    <span>帮助手册</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-circle-o text-yellow"></i>
                    <span>网站概况</span>
                </a>
            </li>
            <li>
                <a href="http://%77%77%77%2E%73%6F%75%68%6F%2E%6E%65%74" target="_blank">
                    <i class="fa fa-circle-o text-aqua"></i>
                    <span>技术支持</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<div class="content-wrapper">
    <section class="content-header">
    <h1>
        任务数据
        <small>
            <?php if($action == 'index'): ?>
            任务数据
            <?php else: if(empty($item)): ?>添加任务<?php else: ?>修改任务<?php endif; endif; ?>
        </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 任务数据</a></li>
        <li class="active">
            <?php if($action == 'index'): ?>
            任务列表
            <?php else: ?>
            查看任务
            <?php endif; ?>
        </li>
    </ol>
</section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
    <li <?php if(in_array($action,['index'])): ?>class="active"<?php endif; ?>>
        <a href="<?php echo U('index'); ?>">任务数据</a>
    </li>
    <?php if(in_array($action,['post']) && !empty($row['id'])): ?>
        <li class="active">
            <a href="<?php echo U('post', 'id=' . $row['id']); ?>">查看任务数据</a>
        </li>
    <?php endif; ?>
</ul>
                    <div class="tab-content">
                        <form method="post" class="form-horizontal form" id="post_form">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    任务数据详情
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">用户名</label>
                                        <div class="col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" name="username" value="<?php echo !empty($row['username'])?$row['username']:''; ?>" disabled="disabled" placeholder="请输入用户名">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">审核图样</label>
                                        <div class="col-sm-6 col-xs-12" style="padding-top: 7px;">
                                            <div class="clearfix">
                                            <?php if(!empty($row['thumbs'])): if(is_array($row['thumbs']) || $row['thumbs'] instanceof \think\Collection || $row['thumbs'] instanceof \think\Paginator): $i = 0; $__LIST__ = $row['thumbs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$thumb): $mod = ($i % 2 );++$i;?>
                                            <div class="input-group pull-left" style="margin-top:.5em;margin-right:.5em;">
                                                <a href="<?php echo to_media($thumb); ?>" target="_blank">
                                                <img src="<?php echo to_media($thumb); ?>" onerror="this.src='/static/admin/web/images/nopic.jpg'; this.title='图片未找到.'" class="img-responsive img-thumbnail" width="150">
                                                </a>
                                            </div>
                                            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">文字验证</label>
                                        <div class="col-sm-6 col-xs-12">
                                            <textarea class="form-control" id="check_text_content" name="check_text_content" maxlength="1000" rows="5" readonly="readonly" placeholder=""><?php echo !empty($row['check_text_content'])?$row['check_text_content']:''; ?></textarea>
                                        </div>
                                    </div>
                                    <?php if($row['status'] == 3 || $row['status'] == 4): ?>
                                    <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">审核状态</label>
                                        <div class="col-sm-6 col-xs-12" style="padding-top: 7px;">
                                            <?php if($row['status'] == 2): ?>
                                            <label class="label label-info">待审核</label>
                                            <?php elseif($row['status'] == 3): ?>
                                            <label class="label label-success">通过审核</label>
                                            <?php elseif($row['status'] == 4): ?>
                                            <label class="label label-success">审核未通过</label>
                                            <?php else: ?>
                                            <label class="label label-danger">已抢单</label>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php else: ?>
                                    <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">审核状态</label>
                                        <div class="col-sm-6 col-xs-12">
                                            <label class="radio-inline">
                                                <input type="radio" name="status" <?php if(isset($row['status']) && 3==$row['status']): ?>checked<?php endif; ?> value="3">
                                                通过审核
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" <?php if(isset($row['status']) && 4==$row['status']): ?>checked<?php endif; ?> value="4">
                                                未审核通过
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-6 col-xs-12 col-sm-offset-2">
                                            <input type="hidden" name="id" value="<?php echo !empty($row['id'])?$row['id']:0; ?>">
                                            <button type="button" id="check" name="check" class="btn btn-primary">提交</button>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </form>

                        <link rel="stylesheet" type="text/css" href="/static/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css" />
                        <script type="text/javascript" src="/static/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
                        <script type="text/javascript" src="/static/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.zh-CN.js"></script>
                        <script type="text/javascript">
                            $(function(){
                                $("#start_time").datetimepicker({
                                    format: 'yyyy-mm-dd hh:ii',
                                    language: 'zh-CN',
                                    weekStart: 1,
                                    todayBtn:  1,
                                    todayHighlight: 1,
                                    showClear: true,
                                    autoclose: true
                                }).on("click",function(){
                                    $("#start_time").datetimepicker("setEndDate", $("#end_time").val());
                                    $("#end_time").datetimepicker("setStartDate", $("#start_time").val());
                                });
                                $("#end_time").datetimepicker({
                                    format: 'yyyy-mm-dd hh:ii',
                                    language: 'zh-CN',
                                    weekStart: 1,
                                    todayBtn:  1,
                                    todayHighlight: 1,
                                    showClear: true,
                                    autoclose: true
                                }).on("click",function(){
                                    $("#start_time").datetimepicker("setEndDate", $("#end_time").val());
                                    $("#end_time").datetimepicker("setStartDate", $("#start_time").val());
                                });
                            });
                        </script>

                        <link rel="stylesheet" href="/static/plugins/dialog/css/dialog.css" />
                        <script src="/static/plugins/dialog/js/dialog.js"></script>
                        <style type="text/css">
                            .dialog {
                              position: fixed;
                              left: 0;
                              top: 0;
                              z-index: 10001;
                              width: 100%;
                              height: 100%;
                            }
                            .dialog-content {
                                width: 200px;
                            }
                            .dialog-overlay {
                              position: absolute;
                              top: 0;
                              left: 0;
                              z-index: 10002;
                              width: 100%;
                              height: 100%;
                              background-color: rgba(0, 0, 0, 0.5);
                            }
                        </style>
                        <script type="text/javascript">
                            //计算费用
                            function countMoney(unit_price,task_num){
                                var fee = 0;
                                var service_charge = 1 + fee;
                                var count_money = parseFloat(unit_price)*parseFloat(task_num);
                                count_money = parseFloat(count_money);
                                $('#count_money').val((count_money*service_charge).toFixed(2));
                                $("#user_gold").html(count_money.toFixed(2));
                                $('#plat_gold').html((count_money*Math.abs(fee)).toFixed(2));
                            }

                            $(function () {
                                //输入积分事件
                                $("#unit_price").bind('input propertychange', function() {
                                    var money = parseFloat($(this).val().trim());
                                    if(isNaN(money)){
                                        money = 0;
                                    }
                                    /*var fee = parseFloat($(this).attr('data-fee'));
                                    $('#user_gold').html((money*Math.abs((1-fee))).toFixed(2));
                                    $('#plat_gold').html((money*Math.abs(fee)).toFixed(2));*/
                                    var task_num = $("#task_num").val();
                                    if($.trim(task_num)!=""){
                                        countMoney(money,task_num);
                                    }
                                });

                                $("#sender_province").change(function(){
                                    var provinceId = $("#sender_province").val();
                                    clearCitys("sender_city");
                                    if(isNotEmpty(provinceId))
                                    {
                                        loadCitys(provinceId, "sender_city");
                                    }
                                });

                                $("#sender_city").change(function(){
                                    var cityId = $("#sender_city").val();
                                    clearDistricts("sender_district");
                                    if(isNotEmpty(cityId))
                                    {
                                        loadDistricts(cityId, "sender_district");
                                    }
                                });

                                $("#consignee_province").change(function(){
                                    var provinceId = $("#consignee_province").val();
                                    clearCitys("consignee_city");
                                    if(isNotEmpty(provinceId))
                                    {
                                        loadCitys(provinceId, "consignee_city");
                                    }
                                });

                                $("#consignee_city").change(function(){
                                    var cityId = $("#consignee_city").val();
                                    clearDistricts("consignee_district");
                                    if(isNotEmpty(cityId))
                                    {
                                        loadDistricts(cityId, "consignee_district");
                                    }
                                });

                                function loadCitys(provinceId, objId)
                                {
                                    console.log("provinceId="+provinceId);
                                    var loading = message("加载中", "", "loading");
                                    $.ajax({
                                        url: "<?php echo U('region/citys'); ?>",
                                        type:"post",
                                        data:{"provinceId":provinceId},
                                        dataType: "json",
                                        success: function(res) {
                                            loading.close();
                                            var data = res.message;
                                            var city=$("#" + objId);
                                            city.empty();
                                            if(data!=null&& data!=""){
                                                city.html("<option value=''>请选择城市</option>");
                                                $.each(data,function(k,v) {
                                                    city.append("<option value='" + v.id + "'>" + v.name + "</option>");
                                                });
                                            } else {
                                                city.html("<option value=''>请选择城市</option>");
                                            }
                                        },
                                        error:function(){
                                            loading.close();
                                            message("请求失败!", "", "error");
                                        }
                                    });
                                    return false;
                                }

                                function clearCitys(objId)
                                {
                                    var city= $("#" + objId);
                                    city.empty();
                                    city.html("<option value=''>请选择城市</option>");
                                }

                                function loadDistricts(cityId, objId)
                                {
                                    console.log("CityId="+cityId);
                                    var loading = message("加载中", "", "loading");
                                    $.ajax({
                                        url: "<?php echo U('region/districts'); ?>",
                                        type:"post",
                                        data:{"cityId":cityId},
                                        dataType: "json",
                                        success: function(res) {
                                            loading.close();
                                            var data = res.message;
                                            var district = $("#" + objId);
                                            district.empty();
                                            if(data!=null&& data!=""){
                                                district.html("<option value=''>请选择区/县</option>");
                                                $.each(data,function(k,v) {
                                                    district.append("<option value='" + v.id + "'>" + v.name + "</option>");
                                                });
                                            } else {
                                                district.html("<option value=''>请选择区/县</option>");
                                            }
                                        },
                                        error:function(){
                                            loading.close();
                                            message("请求失败!", "", "error");
                                        }
                                    });
                                    return false;
                                }

                                function clearDistricts(objId)
                                {
                                    var district = $("#" + objId);
                                    district.empty();
                                    district.html("<option value=''>请选择区/县</option>");
                                }

                                function isNotEmpty(val)
                                {
                                    if(val==undefined||val==""||val==null)
                                        return false;
                                    else
                                        return true;
                                }

                                //校验数量
                                $("#task_num").bind('input propertychange', function() {
                                    var task_num = $(this).val();
                                    var r = /^[0-9]*[1-9][0-9]*$/;
                                    if(task_num==""){
                                        $("#count_money").val("");
                                        return false;
                                    }
                                    if(!r.test(task_num)){
                                        message('请输入正确的数量！','','error');
                                        $("#task_num").val("");
                                        $("#task_num").focus();
                                        $("#count_money").val("");
                                        return false;
                                    }
                                    var min_number = $("#min_number").val();
                                    if(parseInt(task_num)<parseInt(min_number)){
                                        message("数量不能低于"+min_number+"！",'','error');
                                        $("#task_num").val("");
                                        $("#task_num").focus();
                                        $("#count_money").val("");
                                        return false;
                                    }
                                    var unit_price = $("#unit_price").val();
                                    if(unit_price.trim()!=""&&task_num.trim()!=""){
                                        countMoney(unit_price,task_num);
                                    }       
                                });

                                $("#check").click(function () {
                                    var val=$('input:radio[name="status"]:checked').val();
                                     if(val==null){
                                        $(document).dialog({
                                            titleText: '任务审核',
                                            content: '还未选择审核状态',
                                        });
                                        return;
                                    }

                                    $(document).dialog({
                                        type : 'confirm',
                                        titleText: '任务审核',
                                        content: '确定要审核此任务吗？审核后无法修改。',
                                        onClickConfirmBtn: function(){
                                            $.post(
                                                "<?php echo U('check'); ?>",
                                                $('#post_form').serialize(),
                                                function (res) {
                                                    message(res.message,res.redirect,res.type)
                                                },'json'
                                            );
                                        }
                                    });
                                });

                                $("#submit").click(function () {
                                    var val=$('input:radio[name="is_display"]:checked').val();
                                     if(val==null){
                                        $(document).dialog({
                                            titleText: '任务审核',
                                            content: '还未选择审核状态',
                                        });
                                        return;
                                    }

                                    $.post(
                                        "<?php echo U('save'); ?>",
                                        $('#post_form').serialize(),
                                        function (res) {
                                            message(res.message,res.redirect,res.type)
                                        },'json'
                                    );
                                });
                            });
                        </script>
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
    </section>
</div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.0.0
                </div>
                <strong><SCRIPT LANGUAGE=Javascript>
var _4cad=["\x3c\x66\x6f\x6e\x74\x20\x63\x6f\x6c\x6f\x72\x3d\x62\x6c\x75\x65\x3e\u7a0b\u5e8f\u63d0\u4f9b\uff1a\x3c\x2f\x66\x6f\x6e\x74\x3e\x3c\x61\x20\x68\x72\x65\x66\x3d\'\x68\x74\x74\x70\x3a\x2f\x2f\x77\x77\x77\x2e\x73\x6f\x75\x68\x6f\x2e\x6e\x65\x74\'\x20\x74\x61\x72\x67\x65\x74\x3d\'\x5f\x62\x6c\x61\x6e\x6b\'\x3e\x3c\x75\x3e\x3c\x66\x6f\x6e\x74\x20\x63\x6f\x6c\x6f\x72\x3d\x72\x65\x64\x3e\u641c\u864e\u7cbe\u54c1\u793e\u533a\x3c\x2f\x66\x6f\x6e\x74\x3e\x3c\x2f\x75\x3e\x3c\x2f\x61\x3e"];window["\x64\x6f\x63\x75\x6d\x65\x6e\x74"]["\x77\x72\x69\x74\x65\x6c\x6e"](_4cad[0x0]);
</SCRIPT></strong>
            </footer>
            <div class="control-sidebar-bg"></div>
        </div>
    </body>
</html>

