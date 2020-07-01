<?php
if(!defined('IS_LOCAL3')) define('IS_LOCAL3'   , in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']));
if(!defined('URLWEB3')) define('URLWEB3' , IS_LOCAL3 ? 'http://localhost/proyectos/public_html/' : 'https://retroceluloide.com/'); 

require '../../framework/Model/connection_bdensayo.php';

$film_id = $_POST['film_id'];
$user = $_POST['usuario'];		
$comment = $_POST['comment'];


    try {
        $conn = new PDO("mysql:host=$db_host;dbname=$db_nombre", $db_usuario, $db_contra);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$sql="SELECT * FROM USUARIOS_PASS WHERE USUARIOS = '$user' AND PASSWORD ='$password'";
        // use exec() because no results are returned
        $result=$conn->prepare("INSERT INTO film_comments (id, usuario, comment) VALUES (?, ?, ?)");
        $result->execute(array($film_id, $user, $comment));

        }
    catch(PDOException $e)
        {
        echo "<h1 style='color:red;'>¡ERROR!</h1></br>";    
        echo $sql . "<br>" . $e->getMessage();
        }

    $conn = null;

	

// PHP permanent URL redirection

header("refresh:1; url=" . URLWEB3 . "index.php?r=cine/index");
exit();


?>