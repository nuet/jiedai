<?php defined('IN_DESTOON') or exit('Access Denied');?>
<?php if($DT_TOUCH) { ?>
<?php } else { ?>
<div class="back2top"><a href="javascript:void(0);" title="返回顶部">&nbsp;</a></div>
<script type="text/javascript">
/*if(document.body.clientHeight > Dd('main').scrollHeight) Dd('main').style.height=document.body.clientHeight+'px';*/
if(get_local('m_side') == 'Y' && Dd('side_oh').className == 'side_h') {Dh('side');Dd('side_oh').className = 'side_s';}
var destoon_message = <?php echo $_message;?>;
var destoon_chat = <?php echo $_chat;?>;
<?php if($_message && $_sound) { ?>
if(window.location.href.indexOf('message.php') == -1) $('#destoon_space').html(sound('message_<?php echo $_sound;?>'));
<?php } ?>
<?php if($_chat) { ?>
if(window.location.href.indexOf('chat.php') == -1) $('#destoon_space').html(sound('chat_new'));
<?php } ?>
<?php if($_message) { ?>
Dnotification('new_message', '<?php echo $MODULE['2']['linkurl'];?>message.php', '<?php echo useravatar($_username, 'large');?>', '站内信 (<?php echo $_message;?>)', '收到新的站内信件，点击查看');
<?php } ?>
<?php if($_chat) { ?>
Dnotification('new_chat', '<?php echo $MODULE['2']['linkurl'];?>chat.php', '<?php echo useravatar($_username, 'large');?>', '新对话 (<?php echo $_chat;?>)', '收到新的对话请求，点击交谈');
<?php } ?>
<?php if($_userid && $DT['pushtime']) { ?>
window.setInterval('PushNew()',<?php echo $DT['pushtime'];?>*1000);
<?php } ?>
if($('#mini_profile').length > 0) {
$('#my_profile').mouseover(function(){
$('#mini_profile').show('fast');
$('#my_profile').bind('mouseleave',function(){ 
$('#mini_profile').hide(); 
});
}); 
}
</script>
<?php } ?>
<script>
function getMessage() {
    $.ajax({
        url: "getmessage.php?token=d18e4718234a59b88d85ec0293749cd6&username=<?php echo $_username;?>", 
        dataType: "text",
        type: "get",
        success: function (data) {
        if (data>0) {
        var result=
 '<div id="out" style="position: fixed;bottom: 0;right: 0;width: 300px;z-index:99;">'
 +'<audio autoplay="autoplay">'
   +'<source src="../file/flash/msg.ogg" type="audio/ogg"/>'
   +'<source src="../file/flash/msg.mp3" type="audio/mp3"/>'
   +'<source src="../file/flash/msg.wav" type="audio/wav"/>'
   +'您的浏览器不支持播放音频，请升级'
 +'</audio>'
 +'<div style="background-color: #19b4ee;height: 30px;"></div>'
 +'<div style="background-color: #fff;text-align: center;height: 120px;line-height: 120px;border:1px solid #ddd;">'
 +'<a id="in" href="trade.php?action=index" style="color:#000;font-size:16px;">'
 +'您有'
 +data
 +'个未处理订单'
 +'</a>'
 +'</div>'
 +'</div>';
 $("body").append(result);
        }
        
        },
        complete: function () {
            setTimeout(function () {
                getMessage();
            }, 20000);
        }
    });
};
getMessage();
$("#in").click(function(){
$("#out").remove();
})
</script>
</body>
</html>