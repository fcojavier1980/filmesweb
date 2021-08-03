<?php 
$ip_view = in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']);
if($ip_view == 1){
	$db_host="localhost";
	$db_nombre="u805003232_bd_ensayo";
	$db_usuario="root";
	$db_contra="";
}else{
	$db_host="localhost";
	$db_nombre="u805003232_bd_ensayo";
	$db_usuario="u805003232_javi1";
	$db_contra="123456";
	$db_host="localhost";

}

?>
