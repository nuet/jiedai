<?php exit;?>
<sql>
	<time>2016-12-02 23:01:26</time>
	<ip>222.45.91.194</ip>
	<user>zhangming</user>
	<php>/member/trade.php</php>
	<querystring>action=order&amp;fields=1&amp;kw=%E5%95%86%E5%8A%A1&amp;status=&amp;fromtime=&amp;totime=</querystring>
	<message>		<query>SELECT * FROM a.*,b.company from destoon_member as a left join destoon_ as b on a.seller=b.username WHERE a.buyer='zhangming' AND a.title  LIKE '%商务%' ORDER BY itemid DESC LIMIT 0,20</query>
		<errno>0</errno>
		<error>You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '*,b.company from destoon_member as a left join destoon_ as b on a.seller=b.usern' at line 1</error>
		<errmsg>MySQL Query Error</errmsg>
</message>
</sql>