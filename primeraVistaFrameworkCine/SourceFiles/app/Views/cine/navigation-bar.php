<script type="text/javascript">

  

function showLoginWindow(){

  window.location.replace('<?= URLWEB ?>index.php?r=cine/login_window', 'MsgWindow', 'resizable=yes,top=200,left=400,width=400,height=300');

}
function showAddFilm(){
  window.location.replace('<?= URLWEB ?>index.php?r=cine/add_film', 'MsgWindow', 'resizable=yes,top=200,left=400,width=400,height=300');

}
function showMixWindow(){

  window.location.replace('<?= URLWEB ?>index.php?r=cine/mix_zone', 'MixWindow', 'resizable=yes,top=200,left=400,width=400,height=300');

}
function showGameWindow(){

  window.location.replace('<?= URLWEB ?>index.php?r=cine/game_zone', 'GameWindow', 'resizable=yes,top=200,left=400,width=400,height=300');

}
function showAdvancedSearch(){

  window.location.replace('<?= URLWEB ?>index.php?r=cine/advanced_search', 'MixWindow', 'resizable=yes,top=200,left=400,width=400,height=300');

}

function showInfo(){
    $('#overlay-info').show();
    $('#overlay-bg').show();
}
function closeInfo(){
    $('#overlay-info').hide();
    $('#overlay-bg').hide();
}
</script>
<div id="overlay-bg"></div>
<div id="overlay-info">
    <div id="overlay-content">
    <div id="icon-close">
        <img src="<?= BASEPATH ?>SourceFiles/resources/images/icon-close.png" height="60" width="60" style="float: right;" onclick="closeInfo();"/>
    </div>
        <p>Retroceluloide.com es una plataforma sin ánimo de lucro que enlaza contenido audiovisual libre de publicidad  y spams. Con el único fin de facilitar al usuario el acceso a dichos contenidos de una manera rápida y fácil.</p></br>                
        <p>Retroceluloide.com no almacena ningún video en sus servidores, publicamos contenido de otros sitios web que son de dominio libre. Cualquier reclamo hacerlo llegar a dichos servidores ajenos a este sitio.</p></br>
        <p>El Administrador de esta web no se hace responsable de los comentarios u otras acciones de los usuarios. Usted no puede utilizar este sitio para distribuir o descargar cualquier archivo del que usted no tenga los derechos legales. Es su responsabilidad adherirse o no a estos términos.</p>
    </div>
</div> 
<div class="home_block">
    <!--
    <div id="icon-home">
        <img src="<?= BASEPATH ?>SourceFiles/resources/images/icon-home.png" height="24" width="24"/>
    </div>
    -->
    <?php include 'search_simple.php'; ?>   
    <div class="icon-rtcld" id="icon-target" onclick="showAdvancedSearch()">
        <img src="<?= BASEPATH ?>SourceFiles/resources/images/icon-target.png"/>
    </div>    
    <div class="icon-rtcld" id="icon-stats" onclick="showMixWindow()">
        <img src="<?= BASEPATH ?>SourceFiles/resources/images/icon-stats.png"/>
    </div>  
    <div class="icon-rtcld" id="icon-game" onclick="showGameWindow()">
        <img src="<?= BASEPATH ?>SourceFiles/resources/images/icon-game.png"/>
    </div>           
    <div class="icon-rtcld" id="icon-info" onclick="showInfo()">
        <img src="<?= BASEPATH ?>SourceFiles/resources/images/icon-info.png"/>
    </div>      
    <div class="icon-rtcld" id="icon-candado" style="display: <?= $_SESSION['usuario'] == 'NULL' ? 'block' : 'none'?>;" onclick="showLoginWindow()">
        <img src="<?= BASEPATH ?>SourceFiles/resources/images/icon-candado.png"/>
    </div>     
    <div class="icon-rtcld" id="icon-admin" style="display: <?= $_SESSION['usuario'] == 'NULL' ? 'none' : 'block'?>" onclick="checkPass()">
        <img src="<?= BASEPATH ?>SourceFiles/resources/images/icon-admin.png"/>
    </div>
    <div class="icon-rtcld" id="icon-add-film" style="display: <?= $_SESSION['usuario'] == 'NULL' ? 'none' : 'block'?>" onclick="showAddFilm()">
        <img src="<?= BASEPATH ?>SourceFiles/resources/images/add-film.png"/>
    </div>
                                              
</div>
<div class="search_film_header">
  <?php include 'search_film_header.php'; ?>   
</div>
