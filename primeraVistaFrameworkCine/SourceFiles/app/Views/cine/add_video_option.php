<?php
//LOCAL
//require '../retroceluloide/config.php';

//WEB
require '../public_html/config.php'; 
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script type="text/javascript">

function closeOptionForm(){
	$('.floating_options').hide();
}
</script>
<div class="floating_options" style="display: none;">
	<form class="add-video-option" action="<?= URL ?>SourceFiles/app/m/m_add_video_option.php"  method="post">
		<div class="cierre_mod" style="cursor:pointer;" onclick="closeOptionForm()">X</div>
		<div class="mod-text" >ID FILM
			<input type="text" class="mod-text" name="id" value="<?php echo $elemento['id'] ?>" readonly/>
		</div>
		<div class="mod-text" >ETIQUETA
			<input type="text" class="mod-text" name="etiqueta" value=""/>
		</div>
		<div class="mod-text" >DESCRIPCIÓN
			<input type="text" class="mod-text" name="description" value=""/>
		</div>
		<div class="mod-text" >IDIOMA
			<input type="text" class="mod-text" name="idioma" value=""/>
		</div>				
		<div class="mod-text" >PESO
			<input type="text" class="mod-text" name="peso" value=""/>
		</div>	
		<div class="mod-text" >CALIDAD
			<input type="text" class="mod-text" name="calidad" value=""/>
		</div>	
		<div class="mod-text" >TIPO
			<input type="text" class="mod-text" name="tipo" value=""/>
		</div>					
		<div class="mod-text" style="width: 100%">VIDEO-URL
			<input type="text" style="width: 100%" class="mod-text" name="videourl" value=""/>
		</div>				
		<button class="mod-text" style="margin-top: 20px;" type="submit">ACEPTAR</button>
	</form>	
</div>
			

