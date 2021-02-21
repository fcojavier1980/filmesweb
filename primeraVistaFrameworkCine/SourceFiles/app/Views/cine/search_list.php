<?php
include WEB_LOCAL . 'primeraVistaFrameworkCine/SourceFiles/app/m/m_search_list.php';
//include WEB_LOCAL . 'primeraVistaFrameworkCine/SourceFiles/functions/helpers.php';
include WEB_LOCAL . 'primeraVistaFrameworkCine/SourceFiles/functions/list_helper.php';

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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

</script> 
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <script type="text/javascript" src="<?= BASEPATH ?>SourceFiles/resources/assets/jquery-1.7.1.js"></script>
        <script type="text/javascript" src="<?= BASEPATH ?>SourceFiles/functions/js_functions.js"></script>
        <link rel="stylesheet" type="text/css" href="<?= BASEPATH ?>SourceFiles/app/Views/css/new-dessign.css">
    </head>
    <body>
        <div class="main-content">  
            <?php include 'tabs-header.php'; ?> 
            <?php include 'navigation-bar.php'; ?>   
            <div class="specific_content_list">
                <?php
                if(isset($display['search_films'])){
                    $header_title = isset($title) ? 'BÚSQUEDA' : 'LISTADO COMPLETO';
                    $header_list = array( 'Título', 'Director','Año', 'Género','Subida','&nbsp'); 
                    $container_list = 'list_content';
                    $data_list = $display['search_films'];
                    $keys_data_list = array( 'titulo', 'director','anyo','genero','created_at','id');   
                    $style_data_list = array( '210px', '140px','60px', '110px','80px', '15px');
                    $action_filter1 = array(
                      'type' => 'redirect_and_view',
                      'name' => 'Ver Ficha',
                      'url' => 'index.php?r=cine/film_sheet&id=', 
                    );    
                    listado_flex_5col_1action($header_title, $total_results, $header_list, $container_list, $data_list, $keys_data_list,$style_data_list, $data_list_size=null, $action_filter1);
                    }else{ ?>
                <div class="list_content"><span class="rotulo_mid">No se han encontrado resultados</span></div>
                <?php } ?>
            </div> 
            <div id="footer">
                <div class="center">
                    <p>
                        &copy; Retroceluloide.com
                    </p>
                </div>
            </div>
        </div>  


    </body>
</html> 

