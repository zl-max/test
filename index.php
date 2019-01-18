<?php 
function get_client_ip(){
    $headers = array('HTTP_X_REAL_FORWARDED_FOR', 'HTTP_X_FORWARDED_FOR', 'HTTP_CLIENT_IP', 'REMOTE_ADDR');
    foreach ($headers as $h){
        $ip = $_SERVER[$h];
        // 有些ip可能隐匿，即为unknown
        if ( isset($ip) && strcasecmp($ip, 'unknown') ){
            break;
        }
    }
    if( $ip ){
        // 可能通过多个代理，其中第一个为真实ip地址
        list($ip) = explode(', ', $ip, 2);
    }
     // 如果是服务器自身访问，获取服务器的ip地址(该地址可能是局域网ip)
    /*if ('127.0.0.1' == $ip){
        $ip = $_SERVER['SERVER_ADDR'];
    }*/
    
    return $ip;
}

echo get_client_ip();