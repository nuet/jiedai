<?php defined('IN_DESTOON') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Cache-control" content="no-cache">
<meta content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
<meta content="telephone=no" name="format-detection">
<meta content="address=no" name="format-detection">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-capable" content="yes">
<title>修改用户信息</title>
<link type="text/css" rel="stylesheet"  href="static/css/bootstrap.min.css">
<link type="text/css" rel="stylesheet"  href="static/css/base.css">
<link type="text/css" rel="stylesheet"  href="static/css/default.css">
<link type="text/css" rel="stylesheet"  href="static/css/iocn.css">
<style type="text/css">
.title{text-align: center;line-height: 50px;float: left;color: #fff;padding-left: 20px;}
</style>
<script type="text/javascript" src="static/script/zepto.min.js"></script>
<script src="static/script/jquery-1.11.2.min.js"></script>
<script type='text/javascript' src='static/dialog/dialog-min.js'></script>
<script type="text/javascript">
//jquery和tap冲突的解决方式
/*$.noConflict();*/
//自定义弹出框，dialog
function jAlert(content){
var d = dialog({
    title: '提示',
    content: content,
    okValue: '确定',
    ok: function () {
    }
});
d.showModal();
}
//提示后，点击确定跳转
function jAlert2(content,redictUrl){
var d = dialog({
    title: '提示',
    content: content,
    okValue: '确定',
    ok: function () {
    window.location.href = redictUrl;
    }
});
d.showModal();
}
//转菊花的加载效果
jQuery(function() {
var d = dialog( {
zIndex : 87
});
jQuery(document).ajaxStart(function() {
d.showModal();
});
jQuery(document).ajaxComplete(function() {
d.close();
});
});
</script>
<script type="text/javascript">
function beforeSubmitPoint(name) {
var resultStr = '';
if ($('#jinghao').val()==''){
jAlert('警号不能为空');
$('#jinghao').focus();
}else if(name==''){
jAlert('姓名不能为空');
$('#name').focus();
}else if ($('#phone').val()==''){
jAlert('手机号不能为空');
$('#phone').focus();
}else{
var param = $('#submitFrom').serialize();
var url = "my.php?" + param + "&action=infoacc";
$.getJSON(url,function(result){
if(result.stat == 1){
resultStr = "用户资料修改成功，即将刷新您的个人信息页面";
jAlert2(resultStr,'my.php?action=info');
/*window.location.href='my.php?action=info';*/
}else {
jAlert(result.msg);
}
});
}
}
$(function(){
$('#submit').bind('touchstart click', function(){
var name = $('#name').val();
beforeSubmitPoint($.trim(name));
})
})
</script>
</head>
<body>
<!-- 引用JS文件：弹出 -->
<!-- Dependencies -->
<link rel="stylesheet" href="static/dialog/ui-dialog.css" />
<script type="text/javascript">
window.onload=function(){
var _width=document.documentElement.clientWidth;
document.body.style.width=_width+'px';
}
function goBack(){
var referrer = document.referrer;
var url = window.location.href;
//alert(url);
if(referrer == null || referrer ==''){
//从微信访问进来，没有上一个页面时，默认返回到首页
window.location.href="/index.htm";
}else{

window.history.back();

}
}
var AJPath = '../ajax.php';
</script>
<header class="clearfix" style="position:fixed;top:0;width:100%;background:#FFF;z-index:99">
<a onclick="history.go(-1)" class="back"><img src="static/images/back.png" height="14" /></a>
<h1 class="f-16 b" style="font-size:16px;">修改用户信息</h1>
<a href="../mobile" class="home"><img src="static/images/home.png" height="21px"/></a>
</header>
<div class="change_password p_t_50" style="padding-top: 60px;">
<form id="submitFrom" method="post"> 
    <div class="box_captcha" style="margin:0 auto;">用户名</div>
    <div class="box_captcha">
        <input type="text" name="jinghao" id="jinghao" disabled="disabled" class="form-control captcha" value="<?php echo $u['jinghao'];?>" style="padding-left: 10px;">
    </div>
 
    <div class="box_captcha" style="margin:0 auto;">手机</div>
    <div class="box_captcha">
        <input type="text" name="phone" id="phone" value="<?php echo $u['mobile'];?>" style="padding-left: 10px;" class="form-control captcha" placeholder="请输入手机号">
    </div>
    <div class="box_captcha" style="margin:0 auto;">性别</div>
    <div class="box_captcha">
        <input type="radio" name="gender" value="1" <?php if($u['gender']==1) { ?>checked="checked"<?php } ?>
/> 先生&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="gender" value="2" <?php if($u['gender']==2) { ?>checked="checked"<?php } ?>
/> 女士
    </div>
   
    </form>
    <a class="btn btn_default" id="submit" style="width: 90%;">修改</a>  
</div>
</body>
</html>