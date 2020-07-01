<?php 
//LOCAL
//require '../retroceluloide/config.php';

//WEB
require '../public_html/config.php'; 

require BASEPATHPUB . 'SourceFiles/framework/Model/connection_bdensayo.php';




	$consulta="SELECT * FROM peliculas ORDER BY RAND()";

$conexion = new PDO("mysql:host=$db_host;dbname=$db_nombre", $db_usuario, $db_contra);

$resultado1=$conexion->prepare($consulta);

$resultado1->execute(array());

$registro1;

$display['films'] = array();

while ($registro1=$resultado1->fetch(PDO::FETCH_ASSOC)) {


	array_push($display['films'], $registro1);

}

$consulta2="SELECT usuario , comment , titulo , fecha , id_comment FROM film_comments INNER JOIN peliculas ON film_comments.id=peliculas.id ORDER BY fecha DESC";
$resultado2=$conexion->prepare($consulta2);
$resultado2->execute(array());

$registro2;

$display['film_last_comments'] = array();

while ($registro2=$resultado2->fetch(PDO::FETCH_ASSOC)) {


	array_push($display['film_last_comments'], $registro2);

}

$conexion = null;

$con = mysqli_connect($db_host, $db_usuario, $db_contra);
mysqli_select_db($con, $db_nombre);
$hoy = date("Y-m-d");
$hora = date("H:i:s");
$consulta_visita_real = "SELECT * FROM visitas WHERE fecha='$hoy' AND ip='".$_SERVER['REMOTE_ADDR']."'";
$rs_visita_real = mysqli_query($con, $consulta_visita_real);
if (mysqli_num_rows($rs_visita_real) == 0) {

   $insert_real = "INSERT INTO visitas (ip, fecha, hour, num) VALUES ('".$_SERVER['REMOTE_ADDR']."', '$hoy', '$hora', 1)";
   mysqli_query($con,$insert_real);

}

//SELECT * FROM `visitas` order by fecha desc limit 8 
//$consulta_ultimas_visitas = "SELECT * FROM visitas order by fecha desc limit 8";
//$rs_ultimas_visitas = mysqli_query($con, $consulta_ultimas_visitas);
//var_dump($rs_ultimas_visitas);
$consulta_ultimas_visitas = Retroconnect::variable_select_query("SELECT * FROM visitas order by fecha desc limit 8");
$total_results_last_visit = count($consulta_ultimas_visitas); 

