<?php defined('IN_DESTOON') or exit('Access Denied');?><!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>我的提成</title>
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
<link rel="stylesheet" href="static/style/weui.min.css">
<link rel="stylesheet" href="static/style/index.min.css">
</head>
<body style="background: #f4f4f4">
<script type="text/javascript">
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
<div class="head" style="position: fixed;top: 0;width: 100%;z-index: 99;">
<a onclick="history.go(-1)"><img src="static/style/back.png" width="22" height="14"  alt=""/></a>
  <div>我的提成</div>
    <a href="../mobile"><img src="static/style/home.png" width="22" height="21"  alt=""/></a>
</div>
<div style="height: 44px;"></div>
<div class="weui-panel weui-panel_access">
    <a href="javascript:void(0);">
        <div class="weui-panel__hd weui-cell">
                <span class="weui-cell__bd">可以提现金额</span>
                <span class="weui-cell__ft">¥<?php echo $u['money'];?>元</span>
        </div>
        <div class="weui-panel__bd">
           
        </div>
    </a>
 <a href="/mobile/purchase.php?moduleid=16&itemid=27180&beginDate=&endDate=&roomNum=6">
        <div class="weui-panel__hd weui-cell" style="color:red;">
               <span class="weui-cell__bd"> 我要提现</span>
              <span class="weui-cell__ft">点击即可申请提现</span>
        </div>
       
    </a>

 <a href="javascript:void(0);">
        <div class="weui-panel__hd weui-cell"style="color:blue;">
                <span class="weui-cell__bd">我的下线</span>
               
        </div>
        <div class="weui-panel__bd">
           
        </div>
<?php if(is_array($order)) { foreach($order as $k => $v) { ?>
 <div class="weui-panel__hd weui-cell">
                <span class="weui-cell__bd"><?php echo $v['username'];?></span>
               
        </div>
        <?php } } ?>
    </a>
</div>
<div style="height: 36px;"></div>
 <?php include template('footer', 'mobile');?>
</body>
</html>
