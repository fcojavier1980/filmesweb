<?php 

class Retrostart {

	function __construct() {
    	$this->init();
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

public static function init_web() {
    $ip_view = in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']);
    if($ip_view == 1){
      if (headers_sent()) {
          // las cabeceras ya se han enviado, no intentar añadir una nueva
          //header("Location: http://localhost/proyectos/retroceluloide/index.php?r=cine/index");
          die("Redirect failed. Please click on this link: <a href=...>");
      }
      else {
          // es posible añadir nuevas cabeceras HTTP
          header("Location: http://localhost/proyectos/retroceluloide/index.php?r=cine/index");
          die();
      }
    }else{
      if (headers_sent()) {
          // las cabeceras ya se han enviado, no intentar añadir una nueva
          //header("Location: http://localhost/proyectos/retroceluloide/index.php?r=cine/index");
      }
      else {
          // es posible añadir nuevas cabeceras HTTP
          header("Location: https://retroceluloide.000webhostapp.com/index.php?r=cine/index");
          die();
      }
    }
    return;
  }

  public static function startceluloide() {
    $celuloide = new self();
    return;
  }  	

}