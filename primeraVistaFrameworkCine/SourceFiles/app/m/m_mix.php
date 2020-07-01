<?php
require BASEPATHPUB . 'SourceFiles/framework/Model/connection_bdensayo.php';
require BASEPATHPUB.'SourceFiles/app/m/m_login.php';

session_start();
if(isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'Javi'){
  $_SESSION['usuario'] = 'Javi';
}else{
  $_SESSION['usuario'] = 'NULL';
}

try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_nombre", $db_usuario, $db_contra);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="SELECT * FROM peliculas";
    // use exec() because no results are returned
    $result=$conn->prepare($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();
    $result_num = $result->rowCount();
        $display['mix_films'] = array(); 
        while($row = $result->fetch()){
            //echo "Nombre: {$row['title']} <br>";
            $display['mix_films'][] = $row;      
        }  
        $total_results = count($display['mix_films']);
        $datos_pasados = $display['mix_films'];
    }
catch(PDOException $e)
    {
    echo "<h1 style='color:red;'>¡ERROR!</h1></br>";    
    echo $sql . "<br>" . $e->getMessage();
    }
$conn = null;


$paises_distintos = array();
$paises_y_numero = array();

$generos_distintos = array();
$generos_y_numero = array();

foreach ($datos_pasados as $key => $value) {
    array_push($paises_distintos, $value['nacionalidad']);
    array_push($generos_distintos, $value['genero']);
}

$paises_distintos_fix = array_unique($paises_distintos);
$generos_distintos_fix = array_unique($generos_distintos);

foreach ($paises_distintos_fix as $key => $value) {
    $paises_y_numero = array_merge($paises_y_numero,array($value=> array_count_values(array_column($datos_pasados, 'nacionalidad'))[$value]));
}

foreach ($generos_distintos_fix as $key => $value) {
    $generos_y_numero = array_merge($generos_y_numero,array($value=> array_count_values(array_column($datos_pasados, 'genero'))[$value]));
}

try {
    $conn2 = new PDO("mysql:host=$db_host;dbname=$db_nombre", $db_usuario, $db_contra);
    // set the PDO error mode to exception
    $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql2="SELECT reparto FROM peliculas";
    // use exec() because no results are returned
    $result2=$conn2->prepare($sql2);
    $result2->setFetchMode(PDO::FETCH_ASSOC);
    $result2->execute();
    $result_num2 = $result2->rowCount();
        $display['mix_films'] = array(); 
        while($row2 = $result2->fetch()){
            //echo "Nombre: {$row['title']} <br>";
            $display['mix_films'][] = $row2;      
        }  
        $total_results2 = count($display['mix_films']);
        $datos_pasados2 = $display['mix_films'];
    }
catch(PDOException $e)
    {
    echo "<h1 style='color:red;'>¡ERROR!</h1></br>";    
    echo $sql2 . "<br>" . $e->getMessage();
    }
$conn2 = null;

//print_r($generos_y_numero);

?>