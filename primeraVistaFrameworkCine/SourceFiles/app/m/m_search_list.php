<?php
require BASEPATHPUB . 'SourceFiles/framework/Model/connection_bdensayo.php';
require BASEPATHPUB.'SourceFiles/app/m/m_login.php';
session_start();
if(isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'Javi'){
  $_SESSION['usuario'] = 'Javi';
}else{
  $_SESSION['usuario'] = 'NULL';
}

$init_path = 'index.php?r=cine/index';
$search_path = 'index.php?r=cine/search_list';    
if(!isset($_POST['title'])){ 
    try {
        $conn = new PDO("mysql:host=$db_host;dbname=$db_nombre", $db_usuario, $db_contra);
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="SELECT * FROM peliculas ORDER BY created_at DESC";
        $result=$conn->prepare($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $result_num = $result->rowCount();
            if($result_num < 1){                

            }else{
                $display['search_films'] = array(); 
                while($row = $result->fetch()){
                    $display['search_films'][] = $row;
                }  
                $total_results = count($display['search_films']);       
            }
        }
    catch(PDOException $e)
        {
        echo "<h1 style='color:red;'>¡ERROR!</h1></br>";    
        echo $sql . "<br>" . $e->getMessage();
        }

    $conn = null;
}else{
    $title = $_POST['title']; 
    try {
        $conn = new PDO("mysql:host=$db_host;dbname=$db_nombre", $db_usuario, $db_contra);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="SELECT * FROM peliculas WHERE titulo LIKE '%$title%'";
        $result=$conn->prepare('SELECT * FROM peliculas WHERE titulo LIKE ?');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute(array('%'.$title.'%'));
        $result_num = $result->rowCount();
        if($result_num < 1){

        }else{
            $display['search_films'] = array(); 
            while($row = $result->fetch()){
                $display['search_films'][] = $row;   
            }  
            $total_results = count($display['search_films']);          
        }
    }
    catch(PDOException $e)
        {
        echo "<h1 style='color:red;'>¡ERROR!</h1></br>";    
        echo $sql . "<br>" . $e->getMessage();
        }

    $conn = null;
    // PHP permanent URL redirection
    //exit();
    // PHP permanent URL redirection
}


?>