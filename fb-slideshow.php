<ul class="fb-slideshow">
<?php
	/*
	require('./fb-php-sdk/facebook.php');
	*/

	$facebook = new Facebook(array(
		'appId'  => 'YOUR_APPID_GOES_HERE',
		'secret' => 'YOUR_SECRET_GOES_HERE',
		'cookie' => false,
	));

	$fb_rdata = $facebook->api(array(
		'method'   => 'fql.query',
		'query'    => 'SELECT pid, src, src_small, src_big, caption FROM photo WHERE aid = "599802953370465_150315" ORDER BY created DESC LIMIT 6',
		'callback' => ''
	));

	$time = 0;
	foreach ($fb_rdata as $fb_jkeys => $fb_jdata ) {
		$anim_cls = '-webkit-animation-delay:'.$time.'s; -moz-animation-delay:'.$time.'s; -o-animation-delay:'.$time.'s; -ms-animation-delay:'.$time.'s; animation-delay:'.$time.'s;';
		echo(chr(13).chr(10));
		echo('<li>'.chr(13).chr(10));
		echo('<span style="background-image:url(\''.$fb_jdata['src_big'].'\'); '.$anim_cls.'">&nbsp;</span>'.chr(13).chr(10));
		echo('<div style="'.$anim_cls.'">'.chr(13).chr(10));
		echo('<h3>'.utf8_decode($fb_jdata['caption']).'</h3>'.chr(13).chr(10));
		echo('</div>'.chr(13).chr(10));
		echo('</li>'.chr(13).chr(10));
		echo(chr(13).chr(10));
		$time = $time + 6;
		/* Debug
		echo('src: ' . $fb_jdata['src'] . '<br />');
		echo('src_big: ' . $fb_jdata['src_big'] . '<br />');
		echo('src_small: ' . $fb_jdata['src_small'] . '<br />');
		*/
	}
?>
</ul>
