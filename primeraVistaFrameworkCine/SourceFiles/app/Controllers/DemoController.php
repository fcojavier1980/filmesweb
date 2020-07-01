<?php

class DemoController{

	public function index(){

		return ROUTER::show_view('demo/inicio');

	}

	public function search(){

		return ROUTER::show_view('demo/searcher');
	
	}

	public function search_result(){

		return ROUTER::show_view('demo/searcher_result_list');
	
	}
	
	public function add_costs(){

		return ROUTER::show_view('demo/add_cost');
	
	}
	public function finances(){

		return ROUTER::show_view('demo/add_finanzas');
	
	}
	public function sigov1(){

		return ROUTER::show_view('demo/sigov1');
	
	}
	public function sigov2(){

		return ROUTER::show_view('demo/sigov2');
	
	}
	public function pruebas(){

		return ROUTER::show_view('demo/sigov-flex');
	
	}	
	public function gastos_lista(){

		return ROUTER::show_view('demo/listado_gastos');
	
	}

	public function database(){

		return ROUTER::show_view('demo/bbdd');
	
	}		
}