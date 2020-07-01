<?php
//LOCAL
//require '../retroceluloide/config.php';

//WEB
require '../public_html/config.php'; 
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script type="text/javascript">

function closeMod(){
	$('.floating_acciones').hide();
}
</script>
<div class="floating_acciones" style="display: none;">
	<form class="edit-form" action="<?= URL ?>SourceFiles/app/m/m_edit.php" method="post">
		<div class="cierre_mod" style="cursor:pointer;" onclick="closeMod()">X</div>
		<div class="mod-text" >ID
			<input type="text" class="mod-text" name="id_film" value="<?php echo $elemento['id'] ?>" readonly/>
		</div>
		
		<div class="mod-text" >TÍTULO
			<input type="text" class="mod-text" name="title" value="<?php echo $elemento['titulo'] ?>"/>
		</div>
		
		<div class="mod-text" >DIRECTOR
			<input type="text" class="mod-text" name="director" value="<?php echo $elemento['director'] ?>"/>
		</div>
		
		<div class="mod-text" >AÑO
			<input type="text" class="mod-text" name="anyo" value="<?php echo $elemento['anyo'] ?>"/>
		</div>
		
		<div class="mod-text" >GÉNERO
			<input type="text" class="mod-text" name="genero" value="<?php echo $elemento['genero'] ?>"/>
		</div>
		
		<div class="mod-text">NACIONALIDAD
			<input type="text" class="mod-text" name="nacionalidad" value="<?php echo $elemento['nacionalidad'] ?>"/>
		</div>
		
		<div class="mod-text">REPARTO
			<input type="text" class="mod-text" name="reparto" value="<?php echo $elemento['reparto'] ?>"/>
		</div>
		
		<div class="mod-text">LINK
			<input type="text" class="mod-text" id="film-link" name="texto" value="<?php echo $elemento['texto'] ?>"/>
		</div>
		
		<div class="mod-text" style="width: 100%">VIDEO-URL
			<input type="text" style="width: 100%" class="mod-text" name="videourl" value="<?php echo $elemento['videourl'] ?>"/>
		</div>				
		<button class="mod-text" style="margin-top: 20px;" type="submit">MODIFICAR PELÍCULA</button>
	</form>	
	<div style="display: block;">
		<form class="delete-form" action="<?= URL ?>SourceFiles/app/m/m_delete.php" method="post">
			<input type="hidden" name="id_film" value="<?php echo $elemento['id'] ?>"/>

			<button class="mod-text" style="margin-top: 20px;" type="submit">ELIMINAR PELÍCULA</button>
		</form>
	</div>
</div>
			

