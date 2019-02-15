<?php
header("content-type:text/html;charset=utf8");
$url='https://b-ssl.duitang.com/uploads/item/201804/13/20180413171612_jFzU2.thumb.224_0.jpeg';


// https://b-ssl.duitang.com/uploads/blog/201501/16/20150116164131_GEnKx.thumb.224_0.jpeg

$content=file_get_contents($url);

var_dump($content);

/*$ch=curl_init($url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
$content=curl_exec($ch);
// $pattern="/data-iid src=\"(http:\/\/b-ssl\.duitang\.com\/uploads\/)(\w+)\/(\d+)\/(\d+)\/(\d+)_(\w+)\.(\w+)\.(224_0\.jpeg)\"/";
$pattern="/data-iid src=\"(https:\/\/b-ssl\.duitang\.com\/uploads\/blog\/201501\/16\/20150116164131\_GEnKx\.thumb\.224\_0\.jpeg)\"/";

preg_match_all($pattern,$content,$match,PREG_SET_ORDER);
// curl_error($ch);
var_dump($match);*/