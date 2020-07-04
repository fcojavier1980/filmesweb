<?php
//require WEB_LOCAL.'config.php';
include WEB_LOCAL . 'primeraVistaFrameworkCine/SourceFiles/functions/helpers.php';
if(isset($_GET['id'])){
  require BASEPATHPUB.'SourceFiles/app/m/m_film_sheet.php';
}else{
  require BASEPATHPUB.'SourceFiles/app/m/m_inicio.php';
}

require BASEPATHPUB.'SourceFiles/app/m/m_login.php';

session_start();
if(isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'Javi'){
  $_SESSION['usuario'] = 'Javi';
}else{
  $_SESSION['usuario'] = 'NULL';
}
//p_($display['films']);
//p_($display['film_last_comments']);
//p_($display['film_video_options']);
  
?>
<?php
    $current_tab = $display['films'][0]['genero'];
    $pelis_genero_total = count($display['films']);
    $new_array_ids = array();
    $new_array_titles = array();
    $new_array_anyos = array();
    $new_array_directors = array();
    $new_array_repartos = array();
    $new_array_links = array();
    $new_array_images = array();
    $new_array_urls = array();
    $new_array_fotogramas = array();
    for($k = 0; $pelis_genero_total > $k; $k++){
        $contenido_id = $display['films'][$k]['id'];
        $contenido_title = $display['films'][$k]['titulo'];
        $contenido_anyo = $display['films'][$k]['anyo'];
        $contenido_director = $display['films'][$k]['director'];
        $contenido_reparto = $display['films'][$k]['reparto'];
        $contenido_texto = $display['films'][$k]['texto'];
        $contenido_img = $display['films'][$k]['image'];
        $contenido_url = $display['films'][$k]['videourl'];
        $contenido_fotograma = $display['films'][$k]['fotograma'];
        $new_array_ids[] = $contenido_id;
        $new_array_titles[] = $contenido_title;
        $new_array_anyos[] = $contenido_anyo;
        $new_array_directors[] = $contenido_director;
        $new_array_repartos[] = $contenido_reparto;
        $new_array_links[] = $contenido_texto;
        $new_array_images[] = $contenido_img;
        $new_array_urls[] = $contenido_url;  
        $new_array_fotogramas[] = $contenido_fotograma;
    }

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script>
var idsArray = <?php echo json_encode($new_array_ids); ?>;     
var titlesArray = <?php echo json_encode($new_array_titles); ?>;     
var anyosArray = <?php echo json_encode($new_array_anyos); ?>;
var directorsArray = <?php echo json_encode($new_array_directors); ?>;
var repartosArray = <?php echo json_encode($new_array_repartos); ?>;
var linksArray = <?php echo json_encode($new_array_links); ?>;
var imagesArray = <?php echo json_encode($new_array_images); ?>;  
var videourlsArray = <?php echo json_encode($new_array_urls); ?>;
var fotogramasArray = <?php echo json_encode($new_array_fotogramas); ?>;
$( document ).ready(function() {
    var ancho_inicial = $(window).width();
    if(ancho_inicial < 450){
        $('#icon_search').hide();
    }else{ 
        $('#icon_search').show();
    }
    $('#preloader').css('display', 'none');
    videoFirstLoad();
    //setInterval(function(){ transitionNext(); }, 600);
    animaScrolling();
    setInterval(function(){ animaScrolling(); }, 100000);
});

$(window).resize(function(){
    var ancho_de_ventana = $(this).width();
    if(ancho_de_ventana < 480){
        $('#icon_search').hide();
    }else{ 
        $('#icon_search').show();
    }

}); 



function videoFirstLoad(){
    var linkFirstLoad = linksArray[3];
    var idFirstLoad = idsArray[3]
    var fotograma_url = fotogramasArray[3];
    var video_url = videourlsArray[3];
    var plattform_okru_old = video_url.includes("ok.ru/video/");
    var plattform_okru_new = video_url.includes("ok.ru/videoembed/"); 
    var plattform_dailymotion = video_url.includes("dailymotion");  
    var plattform_drive_google = video_url.includes("drive.google");  
    var plattform_youtube = video_url.includes("youtube");
    var plattform_archiveorg = video_url.includes("archive.org");
    var plattform_gloria = video_url.includes("gloria.tv");
    var plattform_peertube = video_url.includes("peertube");     
    var plattform_mega = video_url.includes("mega");   

    if(plattform_okru_old == true){
        $('#play_overlay_img').show();
        $('#fotograma_id').show();
         var okru_play = $('#play_overlay_img').attr('src', '<?= BASEPATH ?>SourceFiles/resources/images/play_overlay.png');
        var okru_fotograma = $('#fotograma_id').attr('src', '<?= BASEPATH ?>SourceFiles/resources/images/'+fotograma_url);
    }
    if(plattform_okru_new == true || plattform_dailymotion == true || plattform_gloria == true || plattform_drive_google == true || plattform_mega == true){
        $('#okru_iframe').show();
        var ru_daily = $('#okru_iframe').attr('src', video_url);
    }       
    if(plattform_youtube == true){
        $('#videotube_iframe').show();
        var youtube = $('#videotube_iframe').attr('src', video_url);
    }  
    if(plattform_archiveorg == true || plattform_peertube == true){
        $('video').show();
        var archive_gloria_peertube_poster = $('video').attr('poster', '<?= BASEPATH ?>SourceFiles/resources/images/'+fotograma_url);
        $('video').find('source').attr('src', video_url);       
        $('video')[0].load(); 
    }    

    alterLinkManagement(linkFirstLoad, idFirstLoad);     

}


var contador_posicion0x1 = 0;
var contador_posicion1x1 = 1;
var contador_posicion2x1 = 2;
var contador_posicion3x1 = 3;
var contador_posicion4x1 = 4;
var contador_posicion5x1 = 5;
var contador_posicion6x1 = 6;
var num_total = imagesArray.length-1;

function sliderNext_x1(){

    $('#alter-link-block').hide();
    $('#link_to_film_sheet').remove();
    contador_posicion0x1--;  
    contador_posicion1x1--;  
    contador_posicion2x1--;  
    contador_posicion3x1--;  
    contador_posicion4x1--; 
    contador_posicion5x1--;
    contador_posicion6x1--;

    if(contador_posicion0x1 == -1){
        contador_posicion0x1 = num_total;
    }if(contador_posicion1x1 == -1){
        contador_posicion1x1 = num_total;
    }if(contador_posicion2x1 == -1){
        contador_posicion2x1 = num_total;
    }if(contador_posicion3x1 == -1){
        contador_posicion3x1 = num_total;
    }if(contador_posicion4x1 == -1){
        contador_posicion4x1 = num_total;
    }if(contador_posicion5x1 == -1){
        contador_posicion5x1 = num_total;
    }if(contador_posicion6x1 == -1){
        contador_posicion6x1 = num_total;
    }

    $('#box_film_content_img_id0').attr('src', '<?= BASEPATH ?>SourceFiles/resources/images/'+imagesArray[contador_posicion0x1]);
    $('#box_film_content_img_id1').attr('src', '<?= BASEPATH ?>SourceFiles/resources/images/'+imagesArray[contador_posicion1x1]);
    $('#box_film_content_img_id2').attr('src', '<?= BASEPATH ?>SourceFiles/resources/images/'+imagesArray[contador_posicion2x1]);
    $('#box_film_content_img_id3').attr('src', '<?= BASEPATH ?>SourceFiles/resources/images/'+imagesArray[contador_posicion3x1]);
    $('#box_film_content_img_id4').attr('src', '<?= BASEPATH ?>SourceFiles/resources/images/'+imagesArray[contador_posicion4x1]);
    $('#box_film_content_img_id5').attr('src', '<?= BASEPATH ?>SourceFiles/resources/images/'+imagesArray[contador_posicion5x1]);
    $('#box_film_content_img_id6').attr('src', '<?= BASEPATH ?>SourceFiles/resources/images/'+imagesArray[contador_posicion6x1]);
    /*
    jQuery.fn.whenLoaded = function(fn){
      return this.each(function(){
        // if already loaded call callback
        if (this.complete || this.readyState == 'complete'){
          fn.call(this);
        } else { // otherwise bind onload event
          $(this).load(fn);
        }
      });
    }
    console.time('loop');
    $('#box_film_content_img_id3').whenLoaded(function(){
      console.log(this.src + ' loaded');
    });
    console.timeEnd('loop');
 */
    $('#box_film_content_title_id0').text(titlesArray[contador_posicion0x1]);
    $('#box_film_content_title_id1').text(titlesArray[contador_posicion1x1]);
    $('#box_film_content_title_id2').text(titlesArray[contador_posicion2x1]);
    $('#box_film_content_title_id3').text(titlesArray[contador_posicion3x1]);
    $('#box_film_content_title_id4').text(titlesArray[contador_posicion4x1]);
    $('#box_film_content_title_id5').text(titlesArray[contador_posicion5x1]);
    $('#box_film_content_title_id6').text(titlesArray[contador_posicion6x1]);

    $('#box_film_content_year_id3').text(anyosArray[contador_posicion3x1]);

    $('#box_film_content_director_id3').text(directorsArray[contador_posicion3x1]);
    $('#box_film_content_reparto_id3').text(repartosArray[contador_posicion3x1]);
    var path_initial = "<?= URLWEB ?>";
    var link_film_sheet = path_initial+"index.php?r=cine/film_sheet&id="+idsArray[contador_posicion3x1];
    if(linksArray[contador_posicion3x1] == 1){
        $('#box_film_content_link_id3').append($("<a href="+link_film_sheet+" id='link_to_film_sheet'>ENLACE ALTERNATIVO</a>"));
    }
    

    var video_url = videourlsArray[contador_posicion3x1];
    var fotograma_url = fotogramasArray[contador_posicion3x1];
    var plattform_okru_old = video_url.includes("ok.ru/video/");
    var plattform_okru_new = video_url.includes("ok.ru/videoembed/"); 
    var plattform_dailymotion = video_url.includes("dailymotion");    
    var plattform_drive_google = video_url.includes("drive.google")
    var plattform_youtube = video_url.includes("youtube");
    var plattform_archiveorg = video_url.includes("archive.org");
    var plattform_gloria = video_url.includes("gloria.tv");
    var plattform_peertube = video_url.includes("peertube");    
    var plattform_mega = video_url.includes("mega");  

    if(plattform_okru_old == true){
        $('#videotube_iframe').hide();
        $('#play_overlay_img').show();
        $('#okru_iframe').hide();
        $('video').hide();
        $('#fotograma_id').show();
        var okru_play = $('#play_overlay_img').attr('src', '<?= BASEPATH ?>SourceFiles/resources/images/play_overlay.png');
        var okru_fotograma = $('#fotograma_id').attr('src', '<?= BASEPATH ?>SourceFiles/resources/images/'+fotograma_url);
        var fotograma_animation = $('#box_film_content_fot_id3').attr('src', '<?= BASEPATH ?>SourceFiles/resources/images/'+fotograma_url);
        var okru_input_hidden_url = $('#url_okru_old').val(video_url);
    }
    if(plattform_okru_new == true || plattform_dailymotion == true || plattform_gloria == true || plattform_drive_google == true || plattform_mega == true){
        $('#videotube_iframe').hide();
        $('#play_overlay_img').hide();
        $('#fotograma_id').hide();
        $('video').hide();        
        $('#okru_iframe').show();
        var ru_daily = $('#okru_iframe').attr('src', video_url);
    }      
    if(plattform_youtube == true){
        $('#play_overlay_img').hide();
        $('#fotograma_id').hide();
        $('#okru_iframe').hide();  
        $('video').hide();              
        $('#videotube_iframe').show();
        var youtube = $('#videotube_iframe').attr('src', video_url);
    }     
    if(plattform_archiveorg == true || plattform_peertube == true){
        $('#play_overlay_img').hide();
        $('#fotograma_id').hide();
        $('#okru_iframe').hide();        
        $('#videotube_iframe').hide();
        $('video').show();
        var archive_gloria_peertube_poster = $('video').attr('poster', '<?= BASEPATH ?>SourceFiles/resources/images/'+fotograma_url);
        $('video').find('source').attr('src', video_url);       
        $('video')[0].load(); 
    }   
    var fotograma_animation = $('#box_film_content_fot_id3').attr('src', '<?= BASEPATH ?>SourceFiles/resources/images/'+fotograma_url);
    var okru_input_hidden_url = $('#url_okru_old').val(video_url);
    var urlAnimage = '<?= BASEPATH ?>SourceFiles/resources/images/'+fotograma_url;
    
    alterLinkManagement();
   // imageAnimationManagement(urlAnimage);
}

function imageAnimationManagement(elem){
    $('#specific_film_1').fadeIn( 3000 );
    $('.specific_content').css('background-image', 'url('+elem+')');

}

function sliderBefore_x1(){
    $('#alter-link-block').hide();
    $('#link_to_film_sheet').remove();

    contador_posicion0x1++;  
    contador_posicion1x1++;  
    contador_posicion2x1++;  
    contador_posicion3x1++;  
    contador_posicion4x1++;
    contador_posicion5x1++;
    contador_posicion6x1++;   

    if(contador_posicion0x1 == num_total){
        contador_posicion0x1 = num_total;
        contador_posicion1x1 = 0;
        contador_posicion2x1 = 1;
        contador_posicion3x1 = 2;
        contador_posicion4x1 = 3;
        contador_posicion5x1 = 4;
        contador_posicion6x1 = 5;

    }if(contador_posicion1x1 == num_total){
        contador_posicion0x1 = num_total-1;
        contador_posicion1x1 = num_total;
        contador_posicion2x1 = 0;
        contador_posicion3x1 = 1;
        contador_posicion4x1 = 2;
        contador_posicion5x1 = 3;
        contador_posicion6x1 = 4;

    }if(contador_posicion2x1 == num_total){
        contador_posicion0x1 = num_total-2;
        contador_posicion1x1 = num_total-1;
        contador_posicion2x1 = num_total;
        contador_posicion3x1 = 0;
        contador_posicion4x1 = 1;
        contador_posicion5x1 = 2;
        contador_posicion6x1 = 3;
    }if(contador_posicion3x1 == num_total){
        contador_posicion0x1 = num_total-3;
        contador_posicion1x1 = num_total-2;
        contador_posicion2x1 = num_total-1;
        contador_posicion3x1 = num_total;
        contador_posicion4x1 = 0;
        contador_posicion5x1 = 1;
        contador_posicion6x1 = 2;
    }if(contador_posicion4x1 == num_total){
        contador_posicion0x1 = num_total-4;
        contador_posicion1x1 = num_total-3;
        contador_posicion2x1 = num_total-2;
        contador_posicion3x1 = num_total-1;
        contador_posicion4x1 = num_total;
        contador_posicion5x1 = 0;
        contador_posicion6x1 = 1;
    }if(contador_posicion5x1 == num_total){
        contador_posicion0x1 = num_total-5;
        contador_posicion1x1 = num_total-4;
        contador_posicion2x1 = num_total-3;
        contador_posicion3x1 = num_total-2;
        contador_posicion4x1 = num_total-1;
        contador_posicion5x1 = num_total;
        contador_posicion6x1 = 0;
    }if(contador_posicion6x1 == num_total){
        contador_posicion0x1 = num_total-6;
        contador_posicion1x1 = num_total-5;
        contador_posicion2x1 = num_total-4;
        contador_posicion3x1 = num_total-3;
        contador_posicion4x1 = num_total-2;
        contador_posicion5x1 = num_total-1;
        contador_posicion6x1 = num_total;
    }

    $('#box_film_content_img_id0').attr('src', '<?= BASEPATH ?>SourceFiles/resources/images/'+imagesArray[contador_posicion0x1]);
    $('#box_film_content_img_id1').attr('src', '<?= BASEPATH ?>SourceFiles/resources/images/'+imagesArray[contador_posicion1x1]);
    $('#box_film_content_img_id2').attr('src', '<?= BASEPATH ?>SourceFiles/resources/images/'+imagesArray[contador_posicion2x1]);
    $('#box_film_content_img_id3').attr('src', '<?= BASEPATH ?>SourceFiles/resources/images/'+imagesArray[contador_posicion3x1]);
    $('#box_film_content_img_id4').attr('src', '<?= BASEPATH ?>SourceFiles/resources/images/'+imagesArray[contador_posicion4x1]);
    $('#box_film_content_img_id5').attr('src', '<?= BASEPATH ?>SourceFiles/resources/images/'+imagesArray[contador_posicion5x1]);
    $('#box_film_content_img_id6').attr('src', '<?= BASEPATH ?>SourceFiles/resources/images/'+imagesArray[contador_posicion6x1]);


    $('#box_film_content_title_id0').text(titlesArray[contador_posicion0x1]);
    $('#box_film_content_title_id1').text(titlesArray[contador_posicion1x1]);
    $('#box_film_content_title_id2').text(titlesArray[contador_posicion2x1]);
    $('#box_film_content_title_id3').text(titlesArray[contador_posicion3x1]);
    $('#box_film_content_title_id4').text(titlesArray[contador_posicion4x1]);
    $('#box_film_content_title_id5').text(titlesArray[contador_posicion5x1]);
    $('#box_film_content_title_id6').text(titlesArray[contador_posicion6x1]);        

    $('#box_film_content_year_id3').text(anyosArray[contador_posicion3x1]);

    $('#box_film_content_director_id3').text(directorsArray[contador_posicion3x1]);
    $('#box_film_content_reparto_id3').text(repartosArray[contador_posicion3x1]);

    // -------------- ejemplo orden sql (UPDATE peliculas SET texto = NULL WHERE id=247;)   -------------------------- //

    var path_initial = "<?= URLWEB ?>";
    var link_film_sheet = path_initial+"index.php?r=cine/film_sheet&id="+idsArray[contador_posicion3x1];
    if(linksArray[contador_posicion3x1] == 1){
        $('#box_film_content_link_id3').append($("<a href="+link_film_sheet+" id='link_to_film_sheet'>ENLACE ALTERNATIVO</a>"));
    }

    var video_url = videourlsArray[contador_posicion3x1];
    var fotograma_url = fotogramasArray[contador_posicion3x1];
    var plattform_okru_old = video_url.includes("ok.ru/video/");
    var plattform_okru_new = video_url.includes("ok.ru/videoembed/"); 
    var plattform_dailymotion = video_url.includes("dailymotion");    
    var plattform_drive_google = video_url.includes("drive.google")
    var plattform_youtube = video_url.includes("youtube");
    var plattform_archiveorg = video_url.includes("archive.org");
    var plattform_gloria = video_url.includes("gloria.tv");
    var plattform_peertube = video_url.includes("peertube");  
    var plattform_mega = video_url.includes("mega");   
 
    if(plattform_okru_old == true){
        $('#videotube_iframe').hide();
        $('#play_overlay_img').show();
        $('#okru_iframe').hide();
        $('video').hide();
        $('#fotograma_id').show();
        var okru_play = $('#play_overlay_img').attr('src', '<?= BASEPATH ?>SourceFiles/resources/images/play_overlay.png');
        var okru_fotograma = $('#fotograma_id').attr('src', '<?= BASEPATH ?>SourceFiles/resources/images/'+fotograma_url);
        var okru_input_hidden_url = $('#url_okru_old').val(video_url);
    }
    if(plattform_okru_new == true || plattform_dailymotion == true || plattform_gloria == true || plattform_drive_google == true || plattform_mega == true){
        $('#videotube_iframe').hide();
        $('#play_overlay_img').hide();
        $('#fotograma_id').hide();
        $('video').hide();        
        $('#okru_iframe').show();
        var ru_daily = $('#okru_iframe').attr('src', video_url);
    }     
    if(plattform_youtube == true){
        $('#play_overlay_img').hide();
        $('#fotograma_id').hide();
        $('#okru_iframe').hide();   
        $('video').hide();     
        $('#videotube_iframe').show();
        var youtube = $('#videotube_iframe').attr('src', video_url);
    } 
    if(plattform_archiveorg == true || plattform_peertube == true){
        $('#play_overlay_img').hide();
        $('#fotograma_id').hide();
        $('#okru_iframe').hide();        
        $('#videotube_iframe').hide();
        $('video').show();
        var archive_gloria_peertube_poster = $('video').attr('poster', '<?= BASEPATH ?>SourceFiles/resources/images/'+fotograma_url);
        $('video').find('source').attr('src', video_url);       
        $('video')[0].load(); 
    }    
    var fotograma_animation = $('#box_film_content_fot_id3').attr('src', '<?= BASEPATH ?>SourceFiles/resources/images/'+fotograma_url);
    var okru_input_hidden_url = $('#url_okru_old').val(video_url);
    alterLinkManagement(); 
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

function alterLinkManagement(elem=null, elem2=null){
    $('#alter-link-block').show();
    var path_initial = "<?= URLWEB ?>";
    var link_film_sheet = path_initial+"index.php?r=cine/film_sheet&id="+elem2;
    if(elem == 1){
        $('#box_film_content_link_id3').append($("<a href="+link_film_sheet+" id='link_to_film_sheet'>ENLACE ALTERNATIVO</a>"));
    }
}

function goToExternalLink(url){
    window.open(url);
}

function animaScrolling(){
    var totalScrollHeight = $('#scroll_comments_content_id')[0].scrollHeight;
    var scrollHeightFix = totalScrollHeight - 200;
    var scrollHeightFixLess = 200 - totalScrollHeight;

    $('#scroll_comments_content_id').animate({
    scrollTop: scrollHeightFix
    }, 99500);
    $('#scroll_comments_content_id').animate({
    scrollTop: scrollHeightFixLess
    }, 500);
}



</script>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Retroceluloide.com</title>
        <meta name=viewport content="width=device-width, initial-scale=1">      
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
        <script type="text/javascript" src="<?= BASEPATH ?>SourceFiles/functions/js_functions.js"></script>
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
            $films_total = count($display['films']); ?>
            <div class="specific_content" id="specific_film_1" style="display: flex;"> 
              
                <div class="clip-container-left-terciary">   
                    <img src="<?= BASEPATH ?>SourceFiles/resources/images/clip.png" />         
                </div>          
                             
                <div class="box_film_content_left_terciary" id="box_film_content_id0">
                    <div class="film_cover_box">
                        <img src="<?= BASEPATH ?>SourceFiles/resources/images/<?php echo $display['films'][0]['image'] ?>" id="box_film_content_img_id0"/>
                    </div>
                    <div class="film_text_box">
                        <div style="text-align: center; background-color: transparent;"><span class="label-title" id="box_film_content_title_id0"></span>&nbsp(<span class="label-year" id="box_film_content_year_id0"></span>)</div>
                        <div style="margin-left: 10px;margin-top: 10px;"><span class="label-text"></span><span class="label-director">></span></div>
                        <div style="margin-left: 10px;margin-top: 5px;"><span class="label-text"></span><span class="label-reparto"></span></div>
                      
                    </div>
                </div> 
                
                <div class="clip-container-left-secondary">   
                    <img src="<?= BASEPATH ?>SourceFiles/resources/images/clip.png" />         
                </div>   
                                     
                <div class="box_film_content_left_secondary" id="box_film_content_id1" onclick="transitionNext();" style="cursor: pointer;">

                    <div class="film_cover_box">
                        <img src="<?= BASEPATH ?>SourceFiles/resources/images/<?php echo $display['films'][1]['image'] ?>" id="box_film_content_img_id1"/>
                    </div>
                    <div class="film_text_box">
                        <div style="text-align: center; background-color: transparent;"><span class="label-title" id="box_film_content_title_id1"></span>&nbsp(<span class="label-year" id="box_film_content_year_id1"></span>)</div>
                        <div style="margin-left: 10px;margin-top: 10px;"><span class="label-text">Director: </span><span class="label-director"></span></div>
                        <div style="margin-left: 10px;margin-top: 5px;"><span class="label-text">Reparto: </span><span class="label-reparto"></span></div>
                      
                    </div>
                </div>   
              
                <div class="clip-container-left">   
                    <img src="<?= BASEPATH ?>SourceFiles/resources/images/clip.png" />         
                </div>   
                                         
                <div class="box_film_content_left" id="box_film_content_id2" onclick="transitionNext();" style="cursor: pointer;">

                    <div class="film_cover_box">
                        <img src="<?= BASEPATH ?>SourceFiles/resources/images/<?php echo $display['films'][2]['image'] ?>" id="box_film_content_img_id2"/>
                    </div>
                    <div class="film_text_box">
                        <div style="text-align: center; background-color: transparent; margin-top: 6%"><span class="label-title" id="box_film_content_title_id2"></span>&nbsp<span class="label-year" id="box_film_content_year_id2"></span></div>
                        <div style="margin-left: 10px;margin-top: 10px;"><span class="label-text">Director: </span><span class="label-director"></span></div>
                        <div style="margin-left: 10px;margin-top: 5px;"><span class="label-text">Reparto: </span><span class="label-reparto"></span></div>
                       
                    </div>
                </div>  
               
                <div class="clip-container-center">   
                    <img src="<?= BASEPATH ?>SourceFiles/resources/images/clip.png" />         
                </div> 
                                           
                <div class="box_film_content_center" id="box_film_content_id3">

                    <div id="film_cover_box_center">
                        <img src="<?= BASEPATH ?>SourceFiles/resources/images/<?php echo $display['films'][3]['fotograma'] ?>" id="box_film_content_fot_id3" class="bottom"/>
                        <img src="<?= BASEPATH ?>SourceFiles/resources/images/<?php echo $display['films'][3]['image'] ?>" id="box_film_content_img_id3" class="top"/>

                    </div>
                    <div class="film_text_box">
                        <div class="film_text_cuaderno">
                            <div style="text-align: center; background-color: transparent; margin-top: 6% ; margin-bottom: 6%"><span class="label-title" id="box_film_content_title_id3"><?php echo $display['films'][3]['titulo'] ?></span>&nbsp<span class="label-year" id="box_film_content_year_id3"><?php echo $display['films'][3]['anyo'] ?></span></div>
                            <div style="margin-left: 10px;margin-top: 10px;"><span class="label-text">Director: </span><span class="label-director" id="box_film_content_director_id3"><?php echo $display['films'][3]['director'] ?></span></div>
                            <div style="margin-left: 10px;margin-top: 5px;"><span class="label-text">Reparto: </span><span class="label-reparto" id="box_film_content_reparto_id3"><?php echo $display['films'][3]['reparto'] ?></span></div>
                            <div style="margin-left: 10px;margin-top: 5px; display: none;" id="alter-link-block"><span class="label-link" id="box_film_content_link_id3">

                            </div>
                        </div>                         
                        <?php include 'edit_view.php'; ?>
                           
                        <div>
                            <button type="button" class="mod-text admin_actions" onclick="showMod(this);">MODIFICAR</button>
                        </div>
                        <?php include 'video-control.php'; ?>                     
                        
                    </div>
                </div>
             
                <div class="clip-container-right">   
                    <img src="<?= BASEPATH ?>SourceFiles/resources/images/clip.png" />         
                </div>   
                           
                <div class="box_film_content_right" id="box_film_content_id4" onclick="transitionBefore();" style="cursor: pointer;">
                    <div class="film_cover_box">
                        <img src="<?= BASEPATH ?>SourceFiles/resources/images/<?php echo $display['films'][4]['image'] ?>" id="box_film_content_img_id4"/>
                    </div>
                    <div class="film_text_box">
                        <div class="film_text_cuaderno">
                            <div style="text-align: center; background-color: transparent; margin-top: 6%; margin-bottom: 6%"><span class="label-title" id="box_film_content_title_id4"><?php echo $display['films'][4]['titulo'] ?></span>&nbsp<span class="label-year" id="box_film_content_year_id4"></span></div>
                            <div style="margin-left: 10px;margin-top: 10px;"><span class="label-text">Director: </span><span class="label-director"></span></div>
                            <div style="margin-left: 10px;margin-top: 5px;"><span class="label-text">Reparto: </span><span class="label-reparto"></span></div>
                        </div>          
                    </div>
                </div>  
                <div class="box_film_content_right_secondary" id="box_film_content_id5" onclick="transitionBefore();" style="cursor: pointer;">
                    <div class="film_cover_box">
                        <img src="<?= BASEPATH ?>SourceFiles/resources/images/<?php echo $display['films'][5]['image'] ?>" id="box_film_content_img_id5"/>
                    </div>
                    <div class="film_text_box">
                        <div class="film_text_cuaderno">
                        <div style="text-align: center; background-color: transparent; margin-top: 6%; margin-bottom: 6%" ><span class="label-title" id="box_film_content_title_id5"><?php echo $display['films'][5]['titulo'] ?></span>&nbsp<span class="label-year" id="box_film_content_year_id5"></span></div>
                        <div style="margin-left: 10px;margin-top: 10px;"><span class="label-text">Director: </span><span class="label-director"></span></div>
                        <div style="margin-left: 10px;margin-top: 5px;"><span class="label-text">Reparto: </span><span class="label-reparto"></span></div> 
                        </div>               
                    </div>
                </div>
                <div class="box_film_content_right_terciary" id="box_film_content_id6"  onclick="transitionBefore();" style="cursor: pointer;">
                    <div class="film_cover_box">
                        <img src="<?= BASEPATH ?>SourceFiles/resources/images/<?php echo $display['films'][6]['image'] ?>" id="box_film_content_img_id6"/>
                    </div>
                    <div class="film_text_box">
                        <div class="film_text_cuaderno">
                        <div style="text-align: center; background-color: transparent;  margin-top: 6%; margin-bottom: 6%"><span class="label-title" id="box_film_content_title_id6"></span>&nbsp<span class="label-year" id="box_film_content_year_id6"></span></div>
                        <div style="margin-left: 10px;margin-top: 10px;"><span class="label-text">Director: </span><span class="label-director"></span></div>
                        <div style="margin-left: 10px;margin-top: 5px;"><span class="label-text">Reparto: </span><span class="label-reparto"></span></div>  
                        </div>              
                    </div>
                </div> 

            </div>
            <div class="scroll_comments_content" id="scroll_comments_content_id">
                <?php
                $cont2 = 1;
                $film_comments_total = count($display['film_last_comments']);
                foreach ($display['film_last_comments'] as $key2 => $elemento2){ ?>
                <div class="comment_content_scroll" id="specific_comment_<?php echo $elemento2['id_comment']; ?>">
                    <div class="box_comment_content_scroll">
                        <div style="margin-left: 5px;"><span class="label-text-scroll"><?php echo $elemento2['usuario'] ?></span>&nbsp<span class="scroll-text"><?php echo $elemento2['titulo'] ?></span></div>
                                            
                        <div style="margin-left: 10px;margin-top: 5px;"><span class="scroll-text"><?php echo $elemento2['comment'] ?></span></div>
                        <div style="margin-left: 10px;margin-top: 5px;"><span class="scroll-text"><?php echo $elemento2['fecha'] ?></span></div>
                    </div>                  
                </div>
                <?php $cont2++; 
                } ?>      
            </div>
            <div style="background-color: #556b2f; display: <?= $_SESSION['usuario'] == 'NULL' ? 'none' : 'block'?>">
                <table border="1" width="250px" cellpading="5px" cellspacing="5px">
                        <tr>
                            <td>ÚLTIMAS VISITAS</td>
                            <td>HORA</td>
                            <td>IP</td>
                        </tr> 
            <?php        
           foreach($consulta_ultimas_visitas as $key => $elem ){ ?>

                        <tr>
                            <td><?php echo $elem['fecha'] ?></td>
                            <td align="right"><?php echo $elem['hour'] ?></td>
                            <td align="right"><?php echo $elem['ip'] ?></td>
                        </tr>           
             
           <?php }  ?>
                </table>
           </div>   
           <?php    
            $query = mysqli_query( $con, "SELECT DISTINCT(fecha) FROM visitas ORDER BY fecha DESC");
            if (mysqli_num_rows($query) > 0) { ?>
                <div style="background-color: #556b2f; display: <?= $_SESSION['usuario'] == 'NULL' ? 'none' : 'block'?>">
                    <table border="1" width="250px" cellpading="5px" cellspacing="5px">
                        <tr>
                            <td>FECHA</td>
                            <td>VISITAS</td>
                        </tr> 
                        <?php while ($row = mysqli_fetch_array($query)) {
                        $current_date = $row['fecha'];
                        
                        $query_visitas = mysqli_query($con, "SELECT COUNT(*) as num FROM `visitas` WHERE fecha = '$current_date'");
                        $row_visits = mysqli_fetch_array($query_visitas) ?>
                        <tr>
                            <td><?php echo $current_date ?></td>
                            <td align="right"><?php echo $row_visits['num'] ?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            <?php } ?>
            
        </div>
      </body>  
      <div id="footer">
            <div class="center">
                <p>
                    &copy; Retroceluloide.com
                </p>
            </div>
        </div>      
    </body>
</html>