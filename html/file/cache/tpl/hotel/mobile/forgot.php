<?php defined('IN_DESTOON') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Cache-control" content="no-cache">
<meta content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
<meta content="mobileephone=no" name="format-detection">
<meta content="address=no" name="format-detection">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-capable" content="yes">
<title>忘记密码</title>
<link type="text/css" rel="stylesheet"  href="static/css/bootstrap.min.css">
<link type="text/css" rel="stylesheet"  href="static/css/base.css">
<link type="text/css" rel="stylesheet"  href="static/css/default.css">
<link type="text/css" rel="stylesheet"  href="static/css/iocn.css">
<script type="text/javascript" src="static/script/jquery-1.11.2.min.js"></script>
</head>
<body>
<script type="text/javascript" src="http://pingjs.qq.com/h5/stats.js" name="MTAH5" sid="500002101" cid="500002102" ></script>
<!-- 引用JS文件：弹出 -->
<!-- Dependencies -->
<link rel="stylesheet" href="static/dialog/ui-dialog.css" />
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
</script>
<header class="clearfix" style="position:fixed;top:0;width:100%;background:#FFF;z-index:99">
<a href="javascript:goBack();" class="back"><img src="static/images/back.png" height="14" /></a>
<h1 class="f-16 b" style="font-size:16px;">忘记密码</h1>
<a href="../mobile" class="home"><img src="static/images/home.png" height="21px"/></a>
</header>
<div class="register" style="margin-top: 30px;">
   请联系客服进行修改密码
   <br />
   客服电话：0516-66651975
</div>
<script type="text/javascript" src="static/script/bootstrap.min.js"></script>
<script>
jQuery(function(jQuery){
var reg=/^1[34578][0-9]\d{8}$/;
var redirectUrl = "";
if(redirectUrl == '' || redirectUrl == null){
redirectUrl = "../mobile";
}
var url="";
var newTime=oldTime=null;
var timer=60;   //设置倒计时 时间数 正整数/秒
oldTime=parseInt(localStorage.time);  //用html5 本地存储 存放 时间  防止刷新重新提交和cookie 同样的效果
if(parseInt(new Date().getTime()/1000)-oldTime>=timer){
localStorage.removeItem("time");
}
var canSendMsg ='T';
function touchT(){
jQuery("#getCode_btn").bind("click",function(){
if(canSendMsg == 'F')
return;
canSendMsg = 'F';
var data = new Object();
var mobile = jQuery('#mobile').val();
if(mobile ==''){
jAlert("手机号码不能为空");
canSendMsg ='T';
return false;
}


if(reg.test(mobile)){
if(localStorage.time){ 
oldTime=parseInt(localStorage.time);  //用html5 本地存储 存放 时间  防止刷新重新提交和cookie 同样的效果
newTime=oldTime+timer;
if(parseInt(new Date().getTime()/1000)-oldTime>=timer){
localStorage.removeItem("time");
}else{
//jAlert("短信已发送\n由于“服务商原因”\n可能延迟\n请耐心等待...");
}
}else{
localStorage.time=oldTime=parseInt(new Date().getTime()/1000);
newTime=parseInt(localStorage.time)+timer;
}
url="forgot.php?action=send&mobile="+mobile;
jQuery.getJSON(url,function(result){ //发出验证
if(result.stat == "发送成功"){
jQuery("#getCode_btn").addClass("ui-btn-c").removeClass("ui-btn-y");
jQuery("#getCode_btn").html(parseInt(new Date().getTime()/1000)-newTime+"秒后重新发送");
jQuery("#getCode_btn").unbind("touchstart");
settime();
}else {
jAlert(result.stat);
}
canSendMsg = 'T';
});
}else{
canSendMsg ='T';
jAlert("手机号码格式不正确！");
}
});
}
function settime(){
var time=parseInt(newTime)-parseInt(new Date().getTime()/1000);
if(time<=0){
localStorage.removeItem("time");
jQuery("#getCode_btn").addClass("ui-btn-y").removeClass("ui-btn-c");;
jQuery("#getCode_btn").html("获取验证码");
touchT();
canSendMsg = 'T';
}else{
jQuery("#getCode_btn").html(time+"秒后重新发送");
setTimeout(settime,1000);
canSendMsg = 'F';
}
}
touchT();

var isSubmit = false;

jQuery('#submit').bind('touchstart click', function(){
var msg ="";
var b ="T";
var password= jQuery("#password").val().replace(/[ ]/g,"");
var mobile= jQuery("#mobile").val().replace(/[ ]/g,"");
var verifyCode = jQuery('#verifyCode').val().replace(/[ ]/g,"");

if(mobile == '') {
jAlert("手机号码不能为空");
return false;
}
if(mobile != '') {
if(!reg.test(mobile)){
jAlert("手机号格式错误");
return false;
}
}
if (verifyCode == '') {//判断
jAlert("请输入验证码");
return false;
}
if (password == '') {//判断
jAlert("请输入新密码");
return false;
}
if(b=='T'){//验证通过提交注册 

isSubmit = true;
url="forgot.php?action=verify&mobile="+mobile+"&verifyCode="+verifyCode+"&password="+password;
$.getJSON(url,function(result){
if(result.stat == 1){
resultStr = "密码重置成功，即将转入登录页面";
jAlert2(resultStr,'login.php');
/*window.location.href='login.php';*/
} else {
            jAlert(result.msg);
        }
});
}else {
jAlert(msg);
return false;
}
});
});
</script>
</body>
</html>