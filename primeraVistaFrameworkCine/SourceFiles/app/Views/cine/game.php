<?php
require WEB_LOCAL . 'config.php'; 
include WEB_LOCAL . 'primeraVistaFrameworkCine/SourceFiles/app/m/m_game.php';
include WEB_LOCAL . 'primeraVistaFrameworkCine/SourceFiles/functions/functions.php';
include WEB_LOCAL . 'primeraVistaFrameworkCine/SourceFiles/functions/helpers.php';
require BASEPATHPUB.'SourceFiles/app/m/m_login.php';
//session_start();
if(isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'Javi'){
  $_SESSION['usuario'] = 'Javi';
}else{
  $_SESSION['usuario'] = 'NULL';
}
//p_($display['films']);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Game</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?= BASEPATH ?>SourceFiles/resources/assets/jquery-1.7.1.js"></script>
        <script type="text/javascript" src="<?= BASEPATH ?>SourceFiles/functions/js_functions.js"></script>
        <link rel="stylesheet" type="text/css" href="<?= BASEPATH ?>SourceFiles/app/Views/css/new-dessign.css">
        <script>
        $( document ).ready(function() {
            $('#preloader').css('display', 'none');
            
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
            function generateInterrogantes(){
 
        


            }

            function startGame(){
                let arr = [];
                do {
                  let num = Math.floor(Math.random() * 40);
                  arr.push(num);
                  arr = arr.filter((item, index) => {
                    return arr.indexOf(item) === index
                  });
                } while (arr.length < 40);
                console.log(arr); 
                $('.overlap-container').css('zIndex', '1');
                $('#fotograma_33').show();

                 /*
                 for(var k=0; k < 40; k++){
                    //setTimeout(function(){ alert('alertabogota'); }, 2000);
                    //$('#overlap-small-img-id_'+arr[k]).show();

                 }
                 
                
                $('.overlap-small-img').each(function(){
                    setInterval(function() {
                    // in here perform an action on the current element in 'arts'
                    console.log('alertabogota');
                    }, 2000);   
                });
                */

                let interval = 40;
                arr.forEach((mode, index) => {

                  setTimeout(() => {
                    console.log(mode)
                    $('#overlap-small-img-id_'+mode).css('opacity', '0');
                  }, index * interval)
                })

                
            }            
        </script>        
    </head>
    <body>

        <div id="preloader">
            <img src="<?= BASEPATH ?>SourceFiles/resources/images/preloader.gif" alt="Preloader"/>
        </div>
        <div class="main-content">

            <div class="module-block-default">
                <?php include 'tabs-header.php'; ?> 
                <?php include 'navigation-bar.php'; ?>
                <div class="specific_content_long">
                    <div style="position: absolute;" class="overlap-container">
                        <img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_0"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_1"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_2"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_3"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_4"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_5"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_6"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_7"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_8"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_9"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_10"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_11"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_12"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_13"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_14"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_15"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_16"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_17"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_18"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_19"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_20"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_21"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_22"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_23"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_24"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_25"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_26"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_27"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_28"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_29"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_30"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_31"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_32"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_33"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_34"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_35"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_36"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_37"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_38"/><img src="<?= BASEPATH ?>SourceFiles/resources/images/tapetesmall.jpg" class="overlap-small-img" id="overlap-small-img-id_39"/>
                    </div>
                        <?php 
                        $cont = 0;
                        foreach($display['films'] as $key => $elemento){?>
                        
                                <div id="film_cover_box_game">
                                <img src="<?= BASEPATH ?>SourceFiles/resources/images/<?= $elemento['fotograma'] ?>" id="fotograma_<?= $cont ?>" style="display: none;" class="bg-overlapped-film"></img>
                                
                                </div>
                            
                        <?php 
                        $cont++;
                        } ?>
                    
                    
                </div>    
                <button type="button" class="btn_accept_a" onclick="startGame();">EMPEZAR</button>
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
 