<?php
if(!defined('IS_LOCAL4')) define('IS_LOCAL4'   , in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']));
if(!defined('URLWEB4')) define('URLWEB4' , IS_LOCAL4 ? 'http://localhost/proyectos/public_html/' : 'https://retroceluloide.com/');  

require '../../framework/Model/connection_bdensayo.php';

$id = $_POST["id"];
$etiqueta = $_POST["etiqueta"];
$description = $_POST["description"];
$videourl = $_POST["videourl"];
$idioma = $_POST["idioma"];
$peso = $_POST["peso"];
$calidad = $_POST["calidad"];
$tipo = $_POST["tipo"];


try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_nombre", $db_usuario, $db_contra);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO info_video (id, etiqueta, description, videourl, idioma, peso, calidad, tipo) VALUES ('$id', '$etiqueta', '$description', '$videourl', '$idioma', '$peso', '$calidad', '$tipo')";
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
