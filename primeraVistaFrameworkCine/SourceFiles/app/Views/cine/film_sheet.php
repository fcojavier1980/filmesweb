<?php

//require WEB_LOCAL.'config.php';
//include WEB_LOCAL . 'primeraVistaFrameworkCine/SourceFiles/functions/helpers.php';
include WEB_LOCAL . 'primeraVistaFrameworkCine/SourceFiles/functions/functions.php';
include WEB_LOCAL . 'primeraVistaFrameworkCine/SourceFiles/functions/helpers.php';
if(isset($_GET['id'])){
  require BASEPATHPUB.'SourceFiles/app/m/m_film_sheet.php';

}else{
  require BASEPATHPUB.'SourceFiles/app/m/m_inicio.php';
}


require BASEPATHPUB.'SourceFiles/app/m/m_login.php';


//p_($display['films']);
//p_($display['film_video_options']);
session_start();
if(isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'Javi'){
  $_SESSION['usuario'] = 'Javi';
}else{
  $_SESSION['usuario'] = 'NULL';
}
?>
<?php
    $current_tab = $display['films'][0]['genero'];
    $pelis_genero_total = count($display['films']);
    $new_array_images = array();
    $new_array_urls = array();
    $new_array_fotogramas = array();
    for($k = 0; $pelis_genero_total > $k; $k++){
        $contenido_img = $display['films'][$k]['image'];
        $contenido_url = $display['films'][$k]['videourl'];
        $contenido_fotograma = $display['films'][$k]['fotograma'];
        $new_array_images[] = $contenido_img;
        $new_array_urls[] = $contenido_url;  
        $new_array_fotogramas[] = $contenido_fotograma;
}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script>
var imagesArray = <?php echo json_encode($new_array_images); ?>;  
var videourlsArray = <?php echo json_encode($new_array_urls); ?>;
var fotogramasArray = <?php echo json_encode($new_array_fotogramas); ?>;

$( document ).ready(function() {
    posicionaFlechas2();
    $('#box_film_content_img_id1').attr('src', '<?= BASEPATH ?>SourceFiles/resources/images/'+imagesArray[0]);
    $('#videotube1').attr('src', videourlsArray[0]);
    $('#fotograma_id1').attr('src', '<?= BASEPATH ?>SourceFiles/resources/images/'+fotogramasArray[0]); 
    var ancho_inicial = $(window).width();
    if(ancho_inicial < 450){
        $('#icon_search').hide();
    }else{ 
        $('#icon_search').show();
    }

});

$(window).resize(function(){
    var ancho_de_ventana = $(this).width();
    if(ancho_de_ventana < 470){
        $('#icon_search').hide();
    }else{ 
        $('#icon_search').show();
    }
    posicionaFlechas2();

}); 


function posicionaFlechas2() {
    $('#preloader').css('display', 'none');
    var box_film = $('.specific_content');
    $(box_film).each(function() {
        var actual = $(this);
        var estado_actual =$(actual[0]).css('display');
        if(estado_actual == 'flex'){
            var actual_visible = actual[0];
            var box_image = $(actual_visible).find('.film_cover_box');
            var box_image_visible = box_image[0];
            var box_image_visible_top = box_image_visible.offsetTop;
            var box_image_visible_height = box_image_visible.clientHeight;
            var box_image_visible_height_fix = box_image_visible_height / 2.1;
            var top_de_flechas = box_image_visible_top + box_image_visible_height_fix;
            var top_de_flechas_fix = box_image_visible_height_fix;

            var box_image_arrow_right = $(actual_visible).find("div[id^='arrow_next']");
            var box_image_arrow_right_actual = box_image_arrow_right[0];
            $(box_image_arrow_right_actual).css('margin-top', top_de_flechas_fix);

            var box_image_arrow_left = $(actual_visible).find("div[id^='arrow_before']");
            var box_image_arrow_left_actual = box_image_arrow_left[0];
            $(box_image_arrow_left_actual).css('margin-top', top_de_flechas_fix);            
        }else{}
    });

}



function redirect_film(elem){

  var hermano = $(elem).next();
  var url = hermano[0].value;
    window.open(url, "_blank");
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

function showMod(elem){
  var padre_container = $(elem).parent().parent(); 
  var otraClaseElems = $(padre_container).find(".floating_acciones");
    otraClaseElems.show();

}

function showPassWindow(){
  $( "#window_pass" ).show();
}

function close_window_pass(){
  $('#window_pass').hide();
}

function checkPass(){

  $( ".admin_actions" ).show();
}

function goToExternalLink(url){
    window.open(url);
}

function validateForm(){
    var usuario = $('#usuario_input_id').val();
    var comentario = $('#comment_input_id').val();

    if(usuario != "" && comentario != ""){
        $('#form_comment').submit();

    }else{
        alert('¡ Debes rellenar tanto el campo de NOMBRE como el de COMENTARIO antes de enviar !');
    }
}

function showOptionForm(){
  
  $(".floating_options").show();
  //alert('sfgbdfgh');
}
</script>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Retroceluloide.com</title>      
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
        <script type="text/javascript" src="<?= BASEPATH ?>SourceFiles/functions/js_functions.js"></script>
        <script>
          $( document ).ready(function() {
              simulaClick();
          });
        </script>        
        <link rel="stylesheet" type="text/css" href="<?= BASEPATH ?>SourceFiles/app/Views/css/new-dessign.css">
    </head>
    <body>
        <div class="main-content">    
            <div id="preloader">
                <img src="<?= BASEPATH ?>SourceFiles/resources/images/preloader.gif" alt="Preloader"/>
            </div>
            <div class="module-block-default">
                <?php include 'tabs-header.php'; ?> 
                <?php include 'navigation-bar.php'; ?>               
            </div> 
            <?php
            $cont = 1;
            $films_total = count($display['films']);
            foreach ($display['films'] as $key => $elemento){ ?>
            <div class="specific_content" id="specific_film_<?php echo $elemento['id']; ?>" style="display: <?php echo $cont == 1 ? 'flex' : 'none' ?>">
                <div class="clip-container-sheet">   
                    <img src="<?= BASEPATH ?>SourceFiles/resources/images/clip.png" />         
                </div>                          
                <div class="box_film_content" id="box_film_content_id<?php echo $cont ?>">
                    <div class="film_cover_box">
                        <img src="" id="box_film_content_img_id<?php echo $cont ?>" title="Cover"/>
                    </div>
                    <div class="film_text_box">
                        <div class="film_text_cuaderno_sheet">
                        <div style="text-align: center; background-color: transparent;"><span class="label-title"><?php echo $elemento['titulo'] ?></span>&nbsp<span class="label-year">(<?php echo $elemento['anyo'] ?>)</span></div>
                        <div style="margin-left: 10px;margin-top: 10px;"><span class="label-text">Director: </span><span class="label-director"><?php echo $elemento['director'] ?></span></div>
                        <div style="margin-left: 10px;margin-top: 5px;"><span class="label-text">Reparto: </span><span class="label-reparto"><?php echo $elemento['reparto'] ?></span></div>
                        <div style="margin-left: 10px;margin-top: 5px;"><span class="label-text">Nacionalidad: </span><span class="label-reparto"><?php echo $elemento['nacionalidad'] ?></span></div>                        
                        <?php include 'edit_view.php'; ?>
                        <?php include 'add_video_option.php'; ?>
                        <?php
                        $cont3 = 1;
                        $film_video_options_total = count($display['film_video_options']);
                        foreach ($display['film_video_options'] as $key3 => $elemento3){ 
                            collapsibleSectionVideoInfo($elemento3['id_video_option'], $elemento3['etiqueta'], $elemento3['id_video_option'], $elemento3['idioma'], $elemento3['peso'], $elemento3['calidad'], $elemento3['tipo'], $elemento3['videourl'])?>
                        <?php $cont3++; } ?>                           
                        
                       </div>
                        <div>
                    
                            <button type="button" class="mod-text admin_actions" onclick="showMod(this);">MODIFICAR</button>
                            <button type="button" class="mod-text admin_actions" onclick="showOptionForm();">AÑADIR OPCIÓN DE VIDEO</button>
                        </div>
                        <?php include 'video-control-sheet.php'; ?>
                    
                </div>
            </div>
             

            </div>
            <form action="<?= URL ?>SourceFiles/app/m/m_add_comment.php" id="form_comment" method="post" style="margin-bottom: 0px;"> 
                <div class="specific_content_comment">
                    <?php
                    $cont2 = 1;
                    $film_comments_total = count($display['film_comments']);

                     if($film_comments_total >= 1){
                        collapsibleSectionReadComments('comentarios', 'Comentarios' , $display['film_comments']);
                    }?>
                    <input type="hidden" name="film_id" value="<?php echo $elemento['id']; ?>" />
                    <?php collapsibleOneSectionInputAndTextarea('nuevo_comentario', 'Comenta', 'Nombre', 'Comentario', 'usuario', 'comment', 'text', 'text'); ?> 
                </div>  
            </form> 
        </div>
            <?php $cont++; } ?>
         
 
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