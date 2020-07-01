<?php
require WEB_LOCAL.'config.php'; 
require BASEPATHPUB.'SourceFiles/app/m/m_login.php';
include WEB_LOCAL . 'primeraVistaFrameworkCine/SourceFiles/functions/functions.php';

session_start();
if(isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'Javi'){
  $_SESSION['usuario'] = 'Javi';
}else{
  $_SESSION['usuario'] = 'NULL';
}
?>
<script>  
  
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

function showMixWindow(){

  window.location.replace('<?= URLWEB ?>index.php?r=cine/mix_zone', 'MixWindow', 'resizable=yes,top=200,left=400,width=400,height=300');

}
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
        <script>
          $( document ).ready(function() {
              simulaClick();
          });
        </script>          
        <link rel="stylesheet" type="text/css" href="<?= BASEPATH ?>SourceFiles/app/Views/css/new-dessign.css">
    </head>
    <body>
        <div class="main-content">
        <div class="module-block-default">
            <?php include 'tabs-header.php'; ?> 
            <?php include 'navigation-bar.php'; ?>
            <form action="<?= URL ?>SourceFiles/app/m/m_login.php" method="post" style="margin-bottom: 0px;"> 
              <div class="specific_content_login">
                <div class="list_content_fields">
                    <div>
                        <div class="label-header-full">Login</div>                     
                    </div> 
                    <?php collapsibleOneSectionTwoInputs('login', 'Nombre y Password', 'Nombre', 'Password', 'user', 'password', 'text', 'password'); ?> 
                </div>  
                

              </div>
            </form>
            
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

