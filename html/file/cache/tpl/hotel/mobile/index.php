<?php defined('IN_DESTOON') or exit('Access Denied');?><!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>延彤借款</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <link rel="stylesheet" href="static/style/weui.min.css">
    <link rel="stylesheet" href="static/style/index.min.css">
    <script type="text/javascript" src="static/script/TouchSlide.1.1.js"></script>
    <style>
        .fl{width: 48%;float: left;}
        .clearfix:after {
            clear:both;
            content:'.';
            display:block;
            width: 0;
            height: 0;
            visibility:hidden;
        }
        .member{background-color: #5ad7f5;height: 78px;margin-bottom: 10px;}
        .order{background-color: #00c7bd;height: 78px;}
   
        .login{height: 166px;}
        .left{margin-right: 10px;}
    </style>
</head>
<body>
<div id="focus" class="focus">
    <div class="hd" style="height: 0;">
        <ul></ul>
    </div>
    <div class="bd">
        <ul>
            <li><a href="#"><img src="static/style/lunbo1.jpg" /></a></li>
            <li><a href="#"><img src="static/style/lunbo2.jpg" /></a></li>
 <li><a href="#"><img src="static/style/lunbo3.jpg" /></a></li>
        </ul>
    </div>
</div>
<script type="text/javascript">
TouchSlide({ 
slideCell:"#focus",
titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
mainCell:".bd ul", 
effect:"leftLoop", 
autoPlay:true,//自动播放
autoPage:true //自动分页
});
</script>
<!-- <div class="main">
    <div class="main_t">
        <div class="main_t_l">
            <div class="main_l_1">
                <a href="my.php">
                    <div class="box">
                         <img src="static/style/geren-zhongx.png" /> 
                        <p>个人中心</p>
                    </div>
                </a>
            </div>
            <div class="main_l_2">
                <a href="myorder.php">
                    <div class="box">
                        <img src="static/style/dingdan.png" /> 
                        <p>我的订单</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="main_r_1">
                <?php if($_userid) { ?>
                <a href="search.php">
                    <div class="box">
                        <img src="static/style/yuding.png" />
                        <p>酒店预订</p>
                    </div>
                </a>
                <?php } else { ?>
                <a href="login.php">
                    <div class="box">
                        <img src="static/style/geren-zhongx.png" /> 
                        <p>用户登录</p>
                    </div>
                </a>
                <?php } ?>
        </div>
    </div>
    
</div> -->
<div class="member" style="height:121px"  >
             <a href="#"> <img src="static/style/fenxiang.jpg" width="100%" height="100%"></a>
            </div>
<div class="main clearfix">
    <div class="fl left">
        <div class="member">
            <a href="my.php">
                <div class="box">
                     <img src="static/style/geren-zhongx.png" /> 
                    <p>个人中心</p>
                </div>
            </a>
        </div>
        <div class="order">
            <a href="myorder.php">
                <div class="box">
                    <img src="static/style/dingdan.png" /> 
                    <p>我的申请</p>
                </div>
            </a>
        </div>
    </div>
     <div class="fl login">
     <?php if($_userid) { ?>
        <div class="member1" style="background-color: #ff5f56;height:100%">
        
            <a href="/mobile/index.php?moduleid=4&username=jjdccd&beginDate=&endDate=&roomNum=1">
            <div class="box" style="padding-top:30px;">
                <img src="static/style/yuding.png" />
                <p>借款申请</p>
            </div>
          </a>
        
        </div>
       
        <?php } else { ?>
        <div class="member1" style="background-color: #ff5f56;height:100%">
        
            <a href="login.php">
            <div class="box"  style="padding-top:30px;">
                <img src="static/style/geren-zhongx.png" /> 
                <p>用户登录</p>
            </div>
          </a>
        
        </div>
        
        <?php } ?>
        
    </div>
   
</div>
<div class="footer">
<?php if($_userid) { ?>
     <p>分享链接,关注公众号：延彤财务</p>
   
<form action="">
      <input type="text" class="share-input"  value="http://www.anluze.com/mobile/register.php?shangxian=<?php echo $_username;?>" id="copy-content"/>
      <button class="copy-button" type="button" onclick="copyContent();"> 复制 </button>
</form>
    <?php } ?>
</div>
</body>
<script type="text/javascript">
     /*Copy function implementation */
        function copyContent(){ 
        var copyobject=document.getElementById("copy-content");
        copyobject.select();
        document.execCommand("Copy");
        alert("已复制成功哦~"); 
    };
</script>
<script type="text/javascript">
    var ua = navigator.userAgent.toLowerCase();
    if(ua.match(/MicroMessenger/i)=="micromessenger") {
        localStorage.ind = location.href;
    }
    
</script>
</html>
