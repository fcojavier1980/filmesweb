<?php
require '../../framework/Model/connection_bdensayo.php';
if(isset($_POST['id_film'])){
$p_id = $_POST['id_film'];


$consulta="DELETE FROM peliculas WHERE id = $p_id";

var_dump($consulta);
/*
$conexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);
mysqli_set_charset($conexion, "utf8");

$resultados=mysqli_query($conexion, $consulta);


mysqli_close($conexion);
*/

try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_nombre", $db_usuario, $db_contra);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="DELETE FROM peliculas WHERE id = $p_id";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<h1 style='color:green;'>PELÍCULA ELIMINADO CON ÉXITO</h1>";
    }
catch(PDOException $e)
    {
    echo "<h1 style='color:red;'>¡ERROR!</h1></br>";    
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;	
}
// PHP permanent URL redirection



exit();

?>