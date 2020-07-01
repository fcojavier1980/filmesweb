<?php
require_once 'primeraVistaFrameworkCine/SourceFiles/classes/Retroconnect.php';

$sesion1 = new Retroconnect();
$sesion1->local_or_web();

require 'config.php';

require BASEPATHPUB.'SourceFiles/framework/Model.php';
/*echo(Retroconnect::local_or_web());
$arr_from_query = Retroconnect::variable_select_query("SELECT * FROM peliculas WHERE reparto LIKE '%Eduardo Fajardo%'");
var_dump($arr_from_query);
*/
?>