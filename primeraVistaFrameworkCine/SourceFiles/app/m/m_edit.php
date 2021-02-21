<?php
if(!defined('IS_LOCAL3')) define('IS_LOCAL3'   , in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']));
if(!defined('URLWEB3')) define('URLWEB3' , IS_LOCAL3 ? 'http://localhost/proyectos/public_html/' : 'https://retroceluloide.com/'); 

require '../../framework/Model/connection_bdensayo.php';
if(isset($_POST['director'])){
$id = $_POST['id_film'];
$title = $_POST['title'];		
$dir_new = $_POST['director'];
$anyo = $_POST['anyo'];
$video = $_POST['videourl'];
$reparto = $_POST['reparto'];
$genero = $_POST['genero'];
$nacionalidad = $_POST['nacionalidad'];
$texto = $_POST['texto'];
$cvideo = $_POST['cvideo'];


try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_nombre", $db_usuario, $db_contra);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="UPDATE peliculas SET titulo = '$title', director = '$dir_new', anyo = '$anyo', genero = '$genero', nacionalidad = '$nacionalidad', reparto = '$reparto', texto = '$texto', videourl = '$video' , cvideo = '$cvideo' WHERE id = '$id'";
    // use exec() because no results are returned
    $conn->exec($sql);
    }
catch(PDOException $e)
    {
    echo "<span style='color:red;'>¡ERROR!</span></br>";    
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

	
}
// PHP permanent URL redirection

header("refresh:1; url=" . URLWEB3 . "index.php?r=cine/index");
exit();


?>