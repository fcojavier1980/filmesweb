<?php
include WEB_LOCAL . 'primeraVistaFrameworkCine/SourceFiles/app/m/m_advanced_search.php';
//include WEB_LOCAL . 'primeraVistaFrameworkCine/SourceFiles/functions/helpers.php';
include WEB_LOCAL . 'primeraVistaFrameworkCine/SourceFiles/functions/list_helper.php';

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script> 
<script>
function goBack() {
  window.location.replace('<?= URLWEB ?>index.php?r=cine/index', 'MsgWindow', 'resizable=yes,top=200,left=400,width=400,height=300');
}

function submitGenre(elem){

    var inputs_gen = $( "input[name='new_genre']" );  
    $( inputs_gen ).each(function() {
        $( this ).remove();
    });
    var id_genre = elem.id;
    $("#"+id_genre ).append('<input type="hidden" name="new_genre" value="'+elem.id+'"/>');
    $( "#main-form" ).submit();
  
}

$( document ).ready(function() {
    var ancho_inicial = $(window).width();
    if(ancho_inicial < 450){
        $('#icon_search').hide();
    }else{ 
        $('#icon_search').show();
    }
    //setInterval(function(){ transitionNext(); }, 600);
    $('.header_list_sub').css('width', '80.5%');
    $('.header_list').css('width', '80.5%');
});

$(window).resize(function(){
    var ancho_de_ventana = $(this).width();
    if(ancho_de_ventana < 480){
        $('#icon_search').hide();
    }else{ 
        $('#icon_search').show();
    }

}); 
var countries = <?php echo json_encode($arr_from_query_countries_tag); ?>;   
</script> 
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
        <script type="text/javascript" src="<?= BASEPATH ?>SourceFiles/functions/js_functions.js"></script>
        <link rel="stylesheet" type="text/css" href="<?= BASEPATH ?>SourceFiles/app/Views/css/new-dessign.css">
    </head>
    <body>
        <div class="main-content">  
            <?php include 'tabs-header.php'; ?> 
            <?php include 'navigation-bar.php'; ?>
            <div class="specific_content_search">

                <div class="list_content_fields">
                    <div>
                        <div class="label-header-full">Búsqueda avanzada</div>                     
                        <?php 
                        if(isset($total_results) && $total_results != 0 && isset($country)){ 
                          //$num_results_list = count($total_results);?> <div class="rotulo_low2" style="margin-bottom: 15px; margin-left: 25px;">Se han encontrado resultados con:&nbsp<?php echo $country; ?></div>
                        <?php }
                        else if(isset($total_results) && $total_results != 0 && isset($actor)){ 
                          //$num_results_list = count($total_results);?> <div class="rotulo_low2" style="margin-bottom: 15px; margin-left: 25px;">Se han encontrado resultados con:&nbsp<?php echo $actor; ?></div><?php }
                        else if(!isset($total_results)&& isset($actor) || isset($country)){?>
                            <div class="rotulo_low2" style="margin-bottom: 15px; margin-left: 25px;">
                                <?= isset($actor) ? 'No se han encontrado resultados con:&nbsp'.$actor : ''; ?>
                                <?= isset($country) ? 'No se han encontrado resultados con:&nbsp'.$country : ''; ?></div>
                        <?php } ?>
                    </div> 
                    <form id="advanced-search-form-film" action="<?= URLWEB ?>index.php?r=cine/advanced_search" method="post" style="margin-bottom: 0px; display: initial;">
                        <div class="collapsible-container" id="collapsible-container_radio">
                            <div style="padding-top: 8px; padding-left: 15px;" class="label-collapsible">Búsqueda por paises</div>        
                            <div class="icon-plus" id="icon-plus_adv_search" onclick="despliegaRadioSearch();">
                                <img src="<?= BASEPATH ?>SourceFiles/resources/images/icon-plus.png" height="16" width="16"/>
                            </div>
                            <div class="icon-minus" id="icon-minus_adv_search" onclick="despliegaRadioSearch();">
                                <img src="<?= BASEPATH ?>SourceFiles/resources/images/icon-minus.png" height="16" width="16"/>
                            </div>
                            <div style="display: none; margin-left: 15%;" id="advanced_search_radio">
                            <?php foreach($arr_from_query_countries_tag as $element => $value){?>
                                <div class="rotulo_mid" style="margin-top: 12px;">
                                    <input type="radio" class="country_filter_search" name="countries_select_tag_name" value="<?= $value['nacionalidad']; ?>"><?= $value['nacionalidad']; ?>
                                </div>
                            <?php } ?>
                            </div>                             
                        </div>
                        <div class="collapsible-container" id="collapsible-container_input_search">                      
                            <div style="padding-top: 8px; padding-left: 15px;" class="label-collapsible">Búsqueda de Actor/Actriz</div>        
                            <div class="icon-plus" id="icon-plus_input_search" onclick="despliegaInput('search');">
                                <img src="<?= BASEPATH ?>SourceFiles/resources/images/icon-plus.png" height="16" width="16"/>
                            </div>
                            <div class="icon-minus" id="icon-minus_input_search" onclick="despliegaInput('search');">
                                <img src="<?= BASEPATH ?>SourceFiles/resources/images/icon-minus.png" height="16" width="16"/>
                            </div>
                            <div id="advanced_search_input" style="display:none; margin-left: 15%; margin-top: 25px;">
                            <input type="text" class="filter_search_control" id="search_actor_input_id" placeholder="Actor/Actriz" name="actor" style="border-radius: 4px; height: 22px; width: 200px; ">
                            </div>    
                        </div>
                        <button type="submit" value="Submit" class="btn_accept_a" style="margin-left: 45%; margin-bottom: 15px">BUSCAR</button>
                    </form>
                </div>                      
            <div class="specific_content_sub_list">  
                <?php
                if(isset($arr_from_query_country) && $total_results!= 0){
                    $header_title = 'PAIS';
                    $header_list = array( 'Título', 'Director','Año', 'Género','&nbsp');
                    $container_list = 'list_sub_content'; 
                    $data_list =  $arr_from_query_country;
                    $keys_data_list = array( 'titulo', 'director','anyo','genero','id');   
                    $style_data_list = array( '210px', '140px','60px', '110px', '15px');
                    $data_list_size = 'low';
                    $action_filter1 = array(
                      'type' => 'redirect_and_view',
                      'name' => 'Ver Ficha',
                      'url' => 'index.php?r=cine/film_sheet&id=', 
                    );    
                    listado_flex_4col_1action($header_title, $total_results, $header_list, $container_list, $data_list, $keys_data_list, $style_data_list, $data_list_size, $action_filter1);
                    }                
                else if(isset($arr_from_query_actor) && $total_results!= 0){
                    $header_title = 'ACTOR/ACTRIZ';
                    $header_list = array( 'Título', 'Reparto', '&nbsp'); 
                    $container_list = 'list_sub_content'; 
                    $data_list = $arr_from_query_actor;
                    $keys_data_list = array( 'titulo', 'reparto', 'id');   
                    $style_data_list = array( '210px', '310px', '15px');
                    $data_list_size = 'low';
                    $action_filter1 = array(
                      'type' => 'redirect_and_view',
                      'name' => 'Ver Ficha',
                      'url' => 'index.php?r=cine/film_sheet&id=', 
                    );    
                    list_flex_2col_1action($header_title, $total_results, $header_list, $container_list, $data_list, $keys_data_list, $style_data_list, $data_list_size, $action_filter1);
                    }else{ 
                    } ?>
            </div>
            <div id="footer">
                <div class="center">
                    <p>
                        &copy; Retroceluloide.com
                    </p>
                </div>
            </div>
            </div>  

        </div>
    </body>
</html> 

