<?php 

class Retroconnect {

    private $db_host;
    private $db_nombre;
    private $db_usuario;
    private $db_contra;

    function __construct() {
    	//$this->init();
  	}

  /**
   * Método para ejecutar cada "método" de forma subsecuente
   *
   * @return void
   */
    public function show() {
    // Todos los métodos que queremos ejecutar consecutivamente
    //echo 'Empezando';

    }  
    private function init() {
    // Todos los métodos que queremos ejecutar consecutivamente
    $this->init_session();
    }

    /**
    * Método para iniciar la sesión en el sistema
    * 
    * @return void
    */
    public static function init_session() {
        if(session_status() == PHP_SESSION_NONE) {
          session_start();
        }
        return;
      }

    public static function local_or_web() {
        $ip_view = in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']);
        if($ip_view == 1){
            //echo 'Estás en localhost';
            $db_host="localhost";
            $db_nombre="u805003232_bd_ensayo";
            $db_usuario="root";
            $db_contra="";     
        }else{
            $db_host="localhost";
            $db_nombre="u805003232_bd_ensayo";
            $db_usuario="u805003232_javi1";
            $db_contra="123456";
        }
        return $ip_view;
    }

    public static function variable_select_query($sql, $param_post=null) {
        $ip_view = in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']);
        if($ip_view == 1){
           // echo 'Estás en localhost';
            $db_host="localhost";
            $db_nombre="u805003232_bd_ensayo";
            $db_usuario="root";
            $db_contra=""; 
            $total_results = 0;   

            try {
                $conn = new PDO("mysql:host=$db_host;dbname=$db_nombre", $db_usuario, $db_contra);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $result=$conn->prepare($sql);
                $result->setFetchMode(PDO::FETCH_ASSOC);
                if($param_post != null){
                    $result->execute(array('%'.$param_post.'%'));
                }else{
                    $result->execute();
                }
                
                $result_num = $result->rowCount();
                if($result_num < 1){

                }else{
                    $display['search_films'] = array(); 
                    while($row = $result->fetch()){
                        $display['search_films'][] = $row;   
                    }  
                    $total_results = count($display['search_films']);   
                    $datos_pasados = $display['search_films'];       
                }
            }
            catch(PDOException $e)
                {
                echo "<h1 style='color:red;'>¡ERROR!</h1></br>";    
                echo $sql . "<br>" . $e->getMessage();
                }

            $conn = null;  
                    
        }else{
            $db_host="localhost";
            $db_nombre="u805003232_bd_ensayo";
            $db_usuario="u805003232_javi1";
            $db_contra="123456";

            try {
                $conn = new PDO("mysql:host=$db_host;dbname=$db_nombre", $db_usuario, $db_contra);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $result=$conn->prepare($sql);
                $result->setFetchMode(PDO::FETCH_ASSOC);
                if($param_post != null){
                    $result->execute(array('%'.$param_post.'%'));
                }else{
                    $result->execute();
                }
                $result_num = $result->rowCount();
                if($result_num < 1){

                }else{
                    $display['search_films'] = array(); 
                    while($row = $result->fetch()){
                        $display['search_films'][] = $row;   
                    }  
                    $total_results = count($display['search_films']);   
                    $datos_pasados = $display['search_films'];       
                }
            }
            catch(PDOException $e)
                {
                echo "<h1 style='color:red;'>¡ERROR!</h1></br>";    
                echo $sql . "<br>" . $e->getMessage();
                }

            $conn = null;             
        }
        if($total_results > 0){
        return $datos_pasados;
        }
    }

  public static function startceluloide() {
    $celuloide = new self();
    return;
  }  	

}