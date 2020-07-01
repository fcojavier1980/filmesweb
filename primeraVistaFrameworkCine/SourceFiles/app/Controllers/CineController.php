<?php
//include WEB_LOCAL . 'primeraVistaFrameworkCine/SourceFiles/app/m/m_search_list.php';

class CineController{

	public $datos_recibidos;

	public function CineController($data =null){
	//	echo $data . 'construvtor';
	//var_dump($data);	
	//return $data;

	}

	public function index(){

		return ROUTER::show_view('cine/inicio');

	}

	public function add_film(){

		return ROUTER::show_view('cine/add_film');
	
	}
	
	public function login_window(){

		return ROUTER::show_view('cine/login_window');
	
	}	

	public function mix_zone(){

		return ROUTER::show_view('cine/mix');
	
	}	
	public function game_zone(){

		return ROUTER::show_view('cine/game');
	
	}			

	public function film_sheet(){

		return ROUTER::show_view('cine/film_sheet');

	}

	public function advanced_search(){

		return ROUTER::show_view('cine/advanced_search');

	}	

	public function search_list($datos_search=null){

		$datos_recibidos = $this->CineController();

		$datos_recibidos2 = 'Datos para la lista';
		//var_dump($datos_recibidos);

		return ROUTER::show_view_data('cine/search_list', $datos_recibidos2);
	
	}

	public function search_list_data($data=null){
		//echo $data;
		//$data2 = $this->search_list($data);
		//var_dump($data2);
		//echo 'Copon';
		//return ROUTER::show_view_data('cine/search_list');
	
	}
}