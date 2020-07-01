<?php 

class Retroconnect {

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
      echo 'Estás en localhost';
    }else{

    }
    return;
  }

  public static function startceluloide() {
    $celuloide = new self();
    return;
  }  	

}