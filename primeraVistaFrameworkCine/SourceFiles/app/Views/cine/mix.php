<?php
require WEB_LOCAL . 'config.php'; 
include WEB_LOCAL . 'primeraVistaFrameworkCine/SourceFiles/app/m/m_mix.php';
include WEB_LOCAL . 'primeraVistaFrameworkCine/SourceFiles/functions/functions.php';
include WEB_LOCAL . 'primeraVistaFrameworkCine/SourceFiles/functions/helpers.php';
require BASEPATHPUB.'SourceFiles/app/m/m_login.php';
//session_start();
if(isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'Javi'){
  $_SESSION['usuario'] = 'Javi';
}else{
  $_SESSION['usuario'] = 'NULL';
}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?= BASEPATH ?>SourceFiles/resources/assets/jquery-1.7.1.js"></script>
        <script type="text/javascript" src="<?= BASEPATH ?>SourceFiles/functions/js_functions.js"></script>
        <link rel="stylesheet" type="text/css" href="<?= BASEPATH ?>SourceFiles/app/Views/css/new-dessign.css">
        <script>
            $( document ).ready(function() { 
                var ancho_inicial = $(window).width();
                if(ancho_inicial < 450){
                    $('#icon_search').hide();
                }else{ 
                    $('#icon_search').show();
                }                
                drawCountries(pais_num, total_films_num);
                drawGenres(generos_num, total_films_num);
                stringSplitAndCount();
                //paintCircleArea(); 


            });

            $(window).resize(function(){
                var ancho_de_ventana = $(this).width();
                if(ancho_de_ventana < 480){
                    $('#icon_search').hide();
                }else{ 
                    $('#icon_search').show();
                }

            }); 

            function submitGenre(elem){
                var inputs_gen = $( "input[name='new_genre']" );  
                $( inputs_gen ).each(function() {
                    $( this ).remove();
                });
                var id_genre = elem.id;
                $("#"+id_genre ).append('<input type="hidden" name="new_genre" value="'+elem.id+'"/>');
                $( "#main-form" ).submit();
            }

            function goBack() {
                window.history.back();
            }

            var total_films_num = '<?php echo $total_results; ?>';
            var pais_num = <?php echo json_encode($paises_y_numero); ?>;
            var generos_num = <?php echo json_encode($generos_y_numero); ?>

            function drawCountries(pais_num, total_films_num){
                
                //console.log(generos_num);
                //console.log(total_films_num);
                var c = document.getElementById("section1");
                var ctx = c.getContext("2d");
                var sumatorio_since = 0;
                var sumatorio_to = 0;

                $.each(pais_num, function(key, value) {
                    
                    //console.log("pais:"+key+" valor:"+value);
                    var tanto_pc = value * 100 / total_films_num;
                    //console.log("Tanto por ciento de "+key+" = "+tanto_pc);
                    var tanto_pc_del_pastel = 2 * tanto_pc / 100;
                    //console.log("Tanto por ciento del círculo de "+key+" = "+tanto_pc_del_pastel);
                    sumatorio_to = tanto_pc_del_pastel + sumatorio_since;
                    //console.log(key);
                    
                    var colorin = '#' + (function co(lor){ 
                        return (lor +=[0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f'][Math.floor(Math.random()*16)]) && (lor.length == 6) ?  lor : co(lor); })('');
                    if(key == 'Estados Unidos'){
                        drawPieSlice(ctx, 150, 120, 100, sumatorio_since * Math.PI, sumatorio_to * Math.PI, '#00B2EE');  
                        $('.text_for_section_section1').append( "<span style='background-color:#00B2EE' class='label-text-data-section'>U.S.A:&nbsp"+value+"&nbsp películas</span></br>" );                      
                    }else if(key == 'Italia'){
                        drawPieSlice(ctx, 150, 120, 100, sumatorio_since * Math.PI, sumatorio_to * Math.PI, '#00ff00'); 
                        $('.text_for_section_section1').append( "<span style='background-color:#00ff00' class='label-text-data-section'>"+key+":&nbsp"+value+"&nbsp películas</span></br>" );                       
                    }else if(key == 'España'){
                        drawPieSlice(ctx, 150, 120, 100, sumatorio_since * Math.PI, sumatorio_to * Math.PI, '#ffff00');   
                        $('.text_for_section_section1').append( "<span style='background-color:#ffff00' class='label-text-data-section'>"+key+":&nbsp"+value+"&nbsp películas</span></br>" );                     
                    }
                    else if(key == 'Reino Unido'){
                        drawPieSlice(ctx, 150, 120, 100, sumatorio_since * Math.PI, sumatorio_to * Math.PI, '#ffa500');
                        $('.text_for_section_section1').append( "<span style='background-color:#ffa500' class='label-text-data-section'>U.K.:&nbsp"+value+"&nbsp películas</span></br>" );                        
                    }  
                    else if(key == 'Japón'){
                        drawPieSlice(ctx, 150, 120, 100, sumatorio_since * Math.PI, sumatorio_to * Math.PI, '#ff0000');   
                        $('.text_for_section_section1').append( "<span style='background-color:#ff0000' class='label-text-data-section'>"+key+":&nbsp"+value+"&nbsp películas</span></br>" );                     
                    }                      
                    else if(key == 'Francia'){
                        drawPieSlice(ctx, 150, 120, 100, sumatorio_since * Math.PI, sumatorio_to * Math.PI, '#f9829b');
                        $('.text_for_section_section1').append( "<span style='background-color:#f9829b' class='label-text-data-section'>"+key+":&nbsp"+value+"&nbsp películas</span></br>" );                        
                    }   
                    else if(key == 'Australia'){
                        drawPieSlice(ctx, 150, 120, 100, sumatorio_since * Math.PI, sumatorio_to * Math.PI, '#cd00cd');
                        $('.text_for_section_section1').append( "<span style='background-color:#cd00cd' class='label-text-data-section'>"+key+":&nbsp"+value+"&nbsp películas</span></br>" );                        
                    }                      
                    else if(key == 'Alemania' || key == 'Suiza' || key == 'Botswana'){
                        drawPieSlice(ctx, 150, 120, 100, sumatorio_since * Math.PI, sumatorio_to * Math.PI, 'gray'); 
                        $('.text_for_section_section1').append( "<span style='background-color:gray' class='label-text-data-section'>"+key+":&nbsp"+value+"&nbsp películas</span></br>" );                       
                    }  

                    else{
                        drawPieSlice(ctx, 150, 100, 100, sumatorio_since * Math.PI, sumatorio_to * Math.PI, colorin);
                        $('.text_for_section_section1').append( "<span style='background-color:"+colorin+"' class='label-text-data-section'>"+key+":&nbsp"+value+"&nbsp películas</span></br>" );
                    }    

                sumatorio_since += tanto_pc_del_pastel;    

                //$('.text_for_section_section1').append( "<span style='background-color:"+colorin+"'>"+key+"</span>" );
                //$('.text_for_section_section1').css('background-color' , colorin);
                });

            }

            function drawGenres(generos_num, total_films_num){
                var c = document.getElementById("section2");
                var ctx = c.getContext("2d");
                var sumatorio_since = 0;
                var sumatorio_to = 0;

                $.each(generos_num, function(key, value) {
                    
                    //console.log("pais:"+key+" valor:"+value);
                    var tanto_pc = value * 100 / total_films_num;
                    //console.log("Tanto por ciento de "+key+" = "+tanto_pc);
                    var tanto_pc_del_pastel = 2 * tanto_pc / 100;
                    //console.log("Tanto por ciento del círculo de "+key+" = "+tanto_pc_del_pastel);
                    sumatorio_to = tanto_pc_del_pastel + sumatorio_since;
                    //console.log(key);
                    
                    /*var colorin = '#' + (function co(lor){ 
                        return (lor +=[0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f'][Math.floor(Math.random()*16)]) && (lor.length == 6) ?  lor : co(lor); })('');                                                     
                   */
                    //drawPieSlice(ctx, 250, 100, 100, sumatorio_since * Math.PI, sumatorio_to * Math.PI, colorin);
    
                    if(key == 'Aventuras'){
                        drawPieSlice(ctx, 150, 120, 100, sumatorio_since * Math.PI, sumatorio_to * Math.PI, '#00FF00');  
                        $('.text_for_section_section2').append( "<span style='background-color:#00FF00' class='label-text-data-section'>"+key+":&nbsp"+value+"&nbsp películas</span></br>" );                      
                    }else if(key == 'Western'){
                        drawPieSlice(ctx, 150, 120, 100, sumatorio_since * Math.PI, sumatorio_to * Math.PI, '#624A2E'); 
                        $('.text_for_section_section2').append( "<span style='background-color:#624A2E' class='label-text-data-section'>"+key+":&nbsp"+value+"&nbsp películas</span></br>" );                       
                    }else if(key == 'Spaguetti Western'){
                        drawPieSlice(ctx, 150, 120, 100, sumatorio_since * Math.PI, sumatorio_to * Math.PI, '#ffa500'); 
                        $('.text_for_section_section2').append( "<span style='background-color:#ffa500' class='label-text-data-section'>Spaguetti:&nbsp"+value+"&nbsp películas</span></br>" );                       
                    }else if(key == 'Drama'){
                        drawPieSlice(ctx, 150, 120, 100, sumatorio_since * Math.PI, sumatorio_to * Math.PI, '#ff0000');   
                        $('.text_for_section_section2').append( "<span style='background-color:#ff0000' class='label-text-data-section'>"+key+":&nbsp"+value+"&nbsp películas</span></br>" );                     
                    }  
                    else if(key == 'Policiaco'){
                        drawPieSlice(ctx, 150, 120, 100, sumatorio_since * Math.PI, sumatorio_to * Math.PI, '#00B2EE');   
                        $('.text_for_section_section2').append( "<span style='background-color:#00B2EE' class='label-text-data-section'>"+key+":&nbsp"+value+"&nbsp películas</span></br>" );                     
                    }                                 
                    else if(key == 'Otros'){
                        drawPieSlice(ctx, 150, 120, 100, sumatorio_since * Math.PI, sumatorio_to * Math.PI, 'pink');   
                        $('.text_for_section_section2').append( "<span style='background-color:pink' class='label-text-data-section'>"+key+":&nbsp"+value+"&nbsp películas</span></br>" );                     
                    } 
                sumatorio_since += tanto_pc_del_pastel;    

                //$('.text_for_section_section1').append( "<span style='background-color:"+colorin+"'>"+key+"</span>" );
                //$('.text_for_section_section1').css('background-color' , colorin);
                });

            }            




            function stringSplitAndCount(){
                var arr_string = [];
                var arr_string_fix = [];
                var string_div = $('.string_to_split');
                $( string_div ).each(function() {
                    var texto = $(this).text();
                    var texto_split = texto.split(',');
                    //console.log(texto_split);
                    //texto_split.trim(); 
                    //console.log(texto_split.length);
                    //console.log(texto_split);
                    for(var k = 0; k<texto_split.length; k++){
                        var texto_trim = texto_split[k];
                        var texto_fix = texto_trim.trim();

                        arr_string.push(texto_fix);
                    }
                    
                });
                counts = {};
                jQuery.each(arr_string, function(key,value) {
                    if (!counts.hasOwnProperty(value)) {
                        counts[value] = 1;
                    } else {
                        counts[value]++;
                    }
                });
                //var unicos = new Set(arr_string);
                var obj_actors = Object.entries(counts);

                var counts_array = [];

                $( arr_string ).each(function(key,value) {
                    if (!counts_array.hasOwnProperty(value)) {
                        counts_array[value] = 1;
                    } else {
                        counts_array[value]++;
                    }
                    
                });              
                //var unicos = new Set(arr_string);
                //$(obj_actors).each(function(key, value) {
                //    $('#section3_section').append('<div class="text-data-list">'+key+' - '+value[0]+' - '+value[1]+'</div></br>')
                //});   
                $(obj_actors.sort()).each(function(key, value) {
                   $('#actors_table_count').append('<div class="alternate_row_list text-data-list"><span style="width: 10%; display: inline-block;">'+key+'</span><span style="width: 59%; display: inline-block;">'+value[0]+'</span><span style="width: 25%; display: inline-block;">'+value[1]+'</span></div>')

                });                
            }
        </script>        
    </head>
    <body>
        <div class="main-content">
            <div class="module-block-default">
                <?php include 'tabs-header.php'; ?> 
                <?php include 'navigation-bar.php'; ?>
                <div class="specific_content_long">
                    <div class="list_content_mix">
                        <div class="label-header-full">ESTADÍSTICAS</div> 
                        <?php 
                            collapsibleRoundGrafic('section1', 'Nacionalidad', 300, 300, 'section2', 'section3');  
                        ?> 
                        <?php 
                            collapsibleRoundGrafic('section2', 'Género', 300, 300, 'section1', 'section3');  
                        ?> 
                        <?php 
                            collapsibleSectionSplitString('section3', 'Actores/actrices', $datos_pasados2, 'section1', 'section2');  
                        ?>
                        <div class="separador"></div> 
                    </div>
                </div>    
            </div> 
            <div id="footer">
                <div class="center">
                    <p>
                        &copy; Retroceluloide.com
                    </p>
                </div>
            </div>
        </div>

    <body>
</html>