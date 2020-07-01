<?php

//require WEB_LOCAL.'config.php';

if(isset($_GET['id'])){
  require BASEPATHPUB.'SourceFiles/app/m/m_film_sheet.php';
}else{
  require BASEPATHPUB.'SourceFiles/app/m/m_inicio.php';
}


require BASEPATHPUB.'SourceFiles/app/m/m_login.php';

//p_($display['films']);

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
    if(ancho_de_ventana < 450){
        $('#icon_search').hide();
    }else{ 
        $('#icon_search').show();
    }
    posicionaFlechas2();

}); 



function posicionaFlechas() {
    $('#preloader').css('display', 'none');
    var posBox = $('#box_film_content_id1').offset().top;
    var heightBox = $('#box_film_content_id1').height();

    var posBoxRound = Math.round(posBox);
    var posBoxRoundFixed = posBoxRound - 160;
    var posArrowNext = posBoxRoundFixed+'px'
    var heightBoxRound = Math.round(heightBox);
    var middleHeight = heightBoxRound / 2.4;
    var posArrowFinal = posBoxRoundFixed + middleHeight;
    var posArrowFinalFixed = posArrowFinal+'px';
      
    $('.arrow-nav-right').each(function() {
        $(this).css('margin-top', posArrowFinalFixed);
    });
    $('.arrow-nav-left').each(function() {
        $(this).css('margin-top', posArrowFinalFixed);
    });  
}

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

function changeFilmNext(elem){

    var padre = $(elem).parent();
    var pap = $(padre);
    var tio = pap.next();
    pap.css('display', 'none');
    tio.css('display', 'flex');

    var current_id = elem.id;
    var current_id_number = current_id.slice(10);
    var current_id_number_next = parseInt(current_id_number)+1;
    var current_cartel = $('#box_film_content_img_id'+current_id_number_next);
    $('#box_film_content_img_id'+current_id_number_next).attr('src', '<?= BASEPATH ?>SourceFiles/resources/images/'+imagesArray[current_id_number]);
    $('#videotube'+current_id_number_next).attr('src', videourlsArray[current_id_number]);
    $('#fotograma_id'+current_id_number_next).attr('src', '<?= BASEPATH ?>SourceFiles/resources/images/'+fotogramasArray[current_id_number]);  
    posicionaFlechas2();   
}

function changeFilmPrev(elem){

  var padre = $(elem).parent();
  var pap = $(padre);
  var tio = pap.prev();
  pap.css('display', 'none');
  tio.css('display', 'flex');
  posicionaFlechas2(); 

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

</script>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="retroceluloide" content="">
        <meta name="retroceluloide" content="width=device-width">
        <meta property="og:url"           content="https://retroceluloide.com" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="Retroceluloide.com" />
        <meta property="og:description"   content="Clásicos a un click. Sin spams." />
        <meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" />        
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?= BASEPATH ?>SourceFiles/app/Views/css/new-dessign.css">
    </head>
    <body>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v6.0"></script>
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
                <div class="arrow-nav-left" id="arrow_before<?php echo $cont ?>" style="cursor: pointer; z-index: 10000; visibility: <?php echo $cont == 1 ? 'hidden' : 'visible' ?>" onclick="changeFilmPrev(this);">
                    <img src="<?= BASEPATH ?>SourceFiles/resources/images/icon-arrow.png" alt="Smiley face" style="transform: rotate(180deg);"/>
                </div>
                <div class="box_film_content" id="box_film_content_id<?php echo $cont ?>">
                    <div class="film_cover_box">
                        <img src="" id="box_film_content_img_id<?php echo $cont ?>" title="Cover"/>
                    </div>
                    <div class="film_text_box">
                        <div style="text-align: center; background-color: gold;"><span class="label-title"><?php echo $elemento['titulo'] ?></span>&nbsp<span class="label-year">(<?php echo $elemento['anyo'] ?>)</span></div>
                        <div style="margin-left: 10px;margin-top: 10px;"><span class="label-text">Director: </span><span class="label-director"><?php echo $elemento['director'] ?></span></div>
                        <div style="margin-left: 10px;margin-top: 5px;"><span class="label-text">Reparto: </span><span class="label-reparto"><?php echo $elemento['reparto'] ?></span></div>
                        <?php include 'edit_view.php'; ?>
                        <div>
                            <button type="button" class="mod-text admin_actions" onclick="showMod(this);">MODIFICAR</button>
                        </div>
                        <?php include 'video-control.php'; ?>
                    </div>
                </div>
                <div class="arrow-nav-right" id="arrow_next<?php echo $cont ?>" style="cursor: pointer; visibility: <?php echo $cont == $films_total ? 'hidden' : 'visible' ?>" onclick="changeFilmNext(this);" ;>
                    <img src="<?= BASEPATH ?>SourceFiles/resources/images/icon-arrow.png" alt="Smiley face"/>
                </div>
            </div>
            <?php $cont++; }             
            $query = mysqli_query( $con, "SELECT DISTINCT(fecha) FROM visitas ORDER BY fecha DESC");
            if (mysqli_num_rows($query) > 0) { ?>
                <div style="background-color: #556b2f; display: <?= $_SESSION['usuario'] == 'NULL' ? 'none' : 'block'?>">
                    <table border="1" width="250px" cellpading="5px" cellspacing="5px">
                        <tr>
                            <td>FECHA</td><td>VISITAS</td>
                        </tr> 
                        <?php while ($row = mysqli_fetch_array($query)) {
                        $current_date = $row['fecha'];
                        $query_visitas = mysqli_query($con, "SELECT COUNT(*) as num FROM `visitas` WHERE fecha = '$current_date'");
                        $row_visits = mysqli_fetch_array($query_visitas) ?>
                        <tr>
                            <td><?php echo $current_date ?></td><td align="right"><?php echo $row_visits['num'] ?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            <?php } ?>
            <!--
            <div class="fb-like" data-href="https://retroceluloide.com" data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div> -->
            <div style="background-color: #556b2f;">
                <div class="label-reparto">Retroceluloide.com no almacena ningún video en sus servidores, publicamos contenido de otros sitios web que son de dominio libre. Cualquier reclamo hacerlo llegar a dichos servidores ajenos a este sitio.</div>
                <div class="label-reparto">El Administrador de esta web no se hace responsable de los comentarios u otras acciones de los usuarios. Usted no puede utilizar este sitio para distribuir o descargar cualquier archivo del que usted no tenga los derechos legales. Es su responsabilidad adherirse o no a estos términos.</div>
            </div>    
        </div>
    </body>
</html>