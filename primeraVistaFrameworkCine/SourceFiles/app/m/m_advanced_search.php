<?php
include BASEPATHPUB . 'SourceFiles/functions/helpers.php';
require BASEPATHPUB . 'SourceFiles/framework/Model/connection_bdensayo.php';
require BASEPATHPUB.'SourceFiles/app/m/m_login.php';
session_start();
if(isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'Javi'){
  $_SESSION['usuario'] = 'Javi';
}else{
  $_SESSION['usuario'] = 'NULL';
}


//Secho(Retroconnect::local_or_web());
//Query para crear el select tag de países
$arr_from_query_countries_tag = Retroconnect::variable_select_query("SELECT DISTINCT nacionalidad FROM peliculas ORDER BY nacionalidad asc");
$total_results_tag = count($arr_from_query_countries_tag); 
//p_($arr_from_query_countries_tag);


//Query para crear la lista de paises
if(isset($_POST['countries_select_tag_name']) && $_POST['countries_select_tag_name'] != 'pais'){ 
    $country = $_POST['countries_select_tag_name'];
   // echo $country;
    $submit_done_country = 'submit done country';

    $arr_from_query_country = Retroconnect::variable_select_query("SELECT * FROM peliculas WHERE nacionalidad LIKE ?", $country);
    if(isset($arr_from_query_country)){    
        $total_results = count($arr_from_query_country); 
    }
}

//Query para crear la lista de actores
if(isset($_POST['actor']) && $_POST['actor'] != ''){ 
    $actor = $_POST['actor'];

    $submit_done_actor = 'submit done actor';

    $arr_from_query_actor = Retroconnect::variable_select_query("SELECT * FROM peliculas WHERE reparto LIKE ?", $actor);
    if(isset($arr_from_query_actor)){
        $total_results = count($arr_from_query_actor);   
    }
}
?>