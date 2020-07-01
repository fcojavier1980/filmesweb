<?php
require WEB_LOCAL.'config.php'; 
?>
<form id="search-form-film" action="<?= URLWEB ?>index.php?r=cine/search_list" method="post" style="margin-bottom: 0px; display: initial;">
   	<div id="icon_search" style="margin-top: 20px; margin-right: 20px; cursor: pointer; display: flex; float: right;">
        <input type="text" id="search_input_id" placeholder="Título" name="title" style="border-radius: 4px; height: 22px; width: 200px;">
        <input type="image" id="search_input_image" src="<?= BASEPATH ?>SourceFiles/resources/images/lupa.png" alt="Buscar" style="height: 22px; width: 22px; cursor: pointer; background-color: darkgray; border-radius: 4px; margin-left: 1px;">    	
    </div>
</form>