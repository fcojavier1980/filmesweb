<?php
class ROUTER
{
	static function show_view($view)
	{
		$content = include BASEPATHPUB. "SourceFiles/app/Views/$view.php";
	}
	
	//Con esta función creamos un link hacia otra url
	static function create_action_url($r)
	{
		return "index.php?r=$r";
	}

	static function show_view_data($view, $data=null)
	{
		$content = include  BASEPATHPUB. "SourceFiles/app/Views/$view.php";
		//include "../retroceluloide/primeraVistaFrameworkCine/SourceFiles/app/Views/layouts/layout.php";
		
	}	
}
