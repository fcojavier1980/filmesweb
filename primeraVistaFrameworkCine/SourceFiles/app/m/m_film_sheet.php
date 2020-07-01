<?php 
//LOCAL
//require '../retroceluloide/config.php';

//WEB
//require '../retroceluloide/config.php'; 

$ip_view = in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']);
if($ip_view == 1){
	$db_host="localhost";
	$db_nombre="bdensayo";
	$db_usuario="root";
	$db_contra="";
}else{
	$db_host="localhost";
	$db_nombre="u805003232_bd_ensayo";
	$db_usuario="u805003232_javi1";
	$db_contra="123456";
	$db_host="localhost";

}

 //echo $_GET['id'];
 $id = $_GET['id'];
/*
$genre_random = rand(1,5);

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
*/

$consulta="SELECT * FROM peliculas WHERE id = " . $id;

$conexion = new PDO("mysql:host=$db_host;dbname=$db_nombre", $db_usuario, $db_contra);

$resultado1=$conexion->prepare($consulta);

$resultado1->execute(array());

$registro1;

$display['films'] = array();

while ($registro1=$resultado1->fetch(PDO::FETCH_ASSOC)) {


	array_push($display['films'], $registro1);

}

$consulta2="SELECT * FROM film_comments WHERE id = " . $id . " ORDER by fecha DESC";
$resultado2=$conexion->prepare($consulta2);
$resultado2->execute(array());

$registro2;

$display['film_comments'] = array();

while ($registro2=$resultado2->fetch(PDO::FETCH_ASSOC)) {


	array_push($display['film_comments'], $registro2);

}

$consulta3="SELECT * FROM info_video WHERE id = " . $id;
$resultado3=$conexion->prepare($consulta3);
$resultado3->execute(array());

$registro3;

$display['film_video_options'] = array();

while ($registro3=$resultado3->fetch(PDO::FETCH_ASSOC)) {


	array_push($display['film_video_options'], $registro3);

}

$datos_info_video = $display['film_video_options'];
$conexion = null;
