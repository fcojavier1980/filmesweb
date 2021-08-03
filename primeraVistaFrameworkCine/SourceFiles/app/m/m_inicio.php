<?php 
//LOCAL
//require '../retroceluloide/config.php';

//WEB
require '../public_html/config.php'; 

require BASEPATHPUB . 'SourceFiles/framework/Model/connection_bdensayo.php';

$genre_random = rand(1,6);

if(!isset($_POST['new_genre']) && $genre_random == 1){ 
	$consulta="SELECT * FROM peliculas WHERE genero = 'Spaguetti Western' ORDER BY RAND()";
}

if(!isset($_POST['new_genre']) && $genre_random == 2){ 
	$consulta="SELECT * FROM peliculas WHERE genero = 'Western' ORDER BY RAND()";
}

if(!isset($_POST['new_genre']) && $genre_random == 3){ 
	$consulta="SELECT * FROM peliculas WHERE genero = 'Policiaco' ORDER BY RAND()";
}
if(!isset($_POST['new_genre']) && $genre_random == 4){ 
	$consulta="SELECT * FROM peliculas WHERE genero = 'Aventuras' ORDER BY RAND()";
}
if(!isset($_POST['new_genre']) && $genre_random == 5){ 
	$consulta="SELECT * FROM peliculas WHERE genero = 'Drama' ORDER BY RAND()";
}
if(!isset($_POST['new_genre']) && $genre_random == 6){ 
	$consulta="SELECT * FROM peliculas WHERE genero = 'Otros' ORDER BY RAND()";
}
if(isset($_POST['new_genre']) && $_POST['new_genre'] == 'genre_espa'){ 
	$consulta="SELECT * FROM peliculas WHERE genero = 'Spaguetti Western' ORDER BY RAND()";
}

if(isset($_POST['new_genre']) && $_POST['new_genre'] == 'genre_west'){ 
	$consulta="SELECT * FROM peliculas WHERE genero = 'Western' ORDER BY RAND()";
}
if(isset($_POST['new_genre']) && $_POST['new_genre'] == 'genre_poli'){ 
	$consulta="SELECT * FROM peliculas WHERE genero = 'Policiaco' ORDER BY RAND()";
}

if(isset($_POST['new_genre']) && $_POST['new_genre'] == 'genre_aven'){ 
	$consulta="SELECT * FROM peliculas WHERE genero = 'Aventuras' ORDER BY RAND()";
}

if(isset($_POST['new_genre']) && $_POST['new_genre'] == 'genre_drama'){ 
	$consulta="SELECT * FROM peliculas WHERE genero = 'Drama' ORDER BY RAND()";
}
if(isset($_POST['new_genre']) && $_POST['new_genre'] == 'genre_otros'){ 
	$consulta="SELECT * FROM peliculas WHERE genero = 'Otros' ORDER BY RAND()";
}
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
//$sqlquery = "SELECT * FROM visitas order by fecha desc, hour desc limit 14";
$consulta_ultimas_visitas = Retroconnect::variable_select_query("SELECT * FROM visitas order by fecha desc, hour desc limit 14");
$total_results_last_visit = count($consulta_ultimas_visitas); 

