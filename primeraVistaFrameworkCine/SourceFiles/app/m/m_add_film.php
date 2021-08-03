<?php
if(!defined('IS_LOCAL4')) define('IS_LOCAL4'   , in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']));
if(!defined('URLWEB4')) define('URLWEB4' , IS_LOCAL4 ? 'http://localhost/proyectos/retroceluloide/' : 'https://retroceluloide.com/');  

require '../../framework/Model/connection_bdensayo.php';

$titulo = $_GET["title"];
$anyo = $_GET["anyo"];
$director = $_GET["director"];
$genero = $_GET["genero"];
$nacionalidad = $_GET["nacionalidad"];
$reparto = $_GET["reparto"];
$description = $_GET["description"];
$image = $_GET["cover"];
$videourl = $_GET["videourl"];
$fotograma = $_GET["fotograma"];


try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_nombre", $db_usuario, $db_contra);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO peliculas (titulo, director, anyo, genero, nacionalidad, reparto, comments,image, videourl, fotograma) VALUES ('$titulo', '$director', '$anyo', '$genero', '$nacionalidad', '$reparto', '$description', '$image' , '$videourl', '$fotograma')";
    // use exec() because no results are returned
    $conn->exec($sql);
    }
catch(PDOException $e)
    {
    echo "<h1 style='color:red;'>¡ERROR AL INTRODUCIR REGISTRO!</h1></br>";    
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

header("refresh:1; url=" . URLWEB4 . "index.php?r=cine/index");
exit();


?>
