<?php
if(!defined('IS_LOCAL2')) define('IS_LOCAL2'   , in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']));
if(!defined('URLWEB2')) define('URLWEB2' , IS_LOCAL2 ? 'http://localhost/proyectos/public_html/' : 'https://retroceluloide.com/');    

$init_path = 'index.php?r=cine/index';

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

if(!isset($_POST['user'])){ 
}else{
    if(isset($_POST['user'])){
    $user = $_POST['user'];     
    $password = $_POST['password'];

    try {
        $conn = new PDO("mysql:host=$db_host;dbname=$db_nombre", $db_usuario, $db_contra);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$sql="SELECT * FROM USUARIOS_PASS WHERE USUARIOS = '$user' AND PASSWORD ='$password'";
        // use exec() because no results are returned
        $result=$conn->prepare('SELECT * FROM USUARIOS_PASS WHERE USUARIOS = ? AND PASSWORD = ?');
        $result->execute(array($user, $password));
        $result_num = $result->rowCount();
            if($result_num < 1){
                    echo '<script type="text/javascript">';
                    echo 'alert("USUARIO y/o CONTRASEÑA INCORRECTOS");';                    
                    echo 'window.location.href="'.URLWEB2 . $init_path .'"';
                    echo '</script>';                   

            }else{
                session_start();
                $_SESSION['usuario'] = $_POST['user'];
                    echo '<script type="text/javascript">';
                    echo 'alert("LOGIN CORRECTO");';
                    echo 'window.location.href="'.URLWEB2 . $init_path .'"';
                    echo '</script>';  

            }
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


}



?>