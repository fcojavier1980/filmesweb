<?php
require "Model/ModelRouter.php";

if (isset($_GET['r'])){

		$ruta = $_GET['r']; /* String con todo lo que haya después del r= */
		filter_var($ruta, FILTER_SANITIZE_URL);
		$arrayRutaDividida = explode("/", $ruta);
		/*Guarda la string en un array. El delimitador '/' parte el string en trozos y los va colocando
		 * en la siguiente posición
		 */
		
		$controlador = $arrayRutaDividida[0];
		$funcion = $arrayRutaDividida[1];
		
		$claseDel_controlador = ucfirst($controlador)."Controller";
		
		require BASEPATHPUB.  "SourceFiles/app/Controllers/".$claseDel_controlador.".php";
		
		$clase = new $claseDel_controlador;
		
		call_user_func(array($clase, $funcion));
		/* Esta función te va a buscar el nombre de la función que le pasas como segundo parámetro 
		 * dentro de la clase que le pasas como primer parámetro. */

}else{
	$ip_view = in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']);
    if($ip_view == 1){
		header("Location: http://localhost/proyectos/public_html/index.php?r=cine/index");
	}else{
		header("Location: https://retroceluloide.com/index.php?r=cine/index");
	}
}