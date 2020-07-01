<?php


function collapsibleRoundGrafic($identifier, $label, $ancho_canvas, $alto_canvas, $colapsable1=null, $colapsable2=null) { ?>
	<div class="collapsible-container" id="collapsible-container_<?= $identifier ?>">
	    <div style="padding-top: 8px; padding-left: 15px;" class="label-collapsible"><?= $label ?></div>		
	    <div class="icon-plus" id="icon-plus_<?= $identifier ?>" onclick="despliegaBlockCanvas('<?= $identifier ?>', '<?= $colapsable1 ?>', '<?= $colapsable2 ?>');">
	        <img src="<?= BASEPATH ?>SourceFiles/resources/images/icon-plus.png" height="16" width="16"/>
	    </div>
	    <div class="icon-minus" id="icon-minus_<?= $identifier ?>" onclick="despliegaBlockCanvas('<?= $identifier ?>', '<?= $colapsable1 ?>', '<?= $colapsable2 ?>');">
	        <img src="<?= BASEPATH ?>SourceFiles/resources/images/icon-minus.png" height="16" width="16"/>
	    </div>
		<div id="<?= $identifier ?>_section" style="display: none;">   
	    	<canvas id="<?= $identifier ?>" width="<?= $ancho_canvas ?>" height="<?= $alto_canvas ?>"></canvas>
	    	<div class="text_for_section_<?= $identifier ?>" style="margin-top: 20px;"></div>
		</div>
    </div>


<?php } 

function collapsibleSectionSplitString($identifier, $label, $datos = array(), $colapsable1=null, $colapsable2=null) { ?>
	<div class="collapsible-container" id="collapsible-container_<?= $identifier ?>">
	    <div style="padding-top: 8px; padding-left: 15px;" class="label-collapsible"><?= $label ?></div>		
	    <div class="icon-plus" id="icon-plus_<?= $identifier ?>" onclick="despliegaBlockLista('<?= $identifier ?>', '<?= $colapsable1 ?>', '<?= $colapsable2 ?>');">
	        <img src="<?= BASEPATH ?>SourceFiles/resources/images/icon-plus.png" height="16" width="16"/>
	    </div>
	    <div class="icon-minus" id="icon-minus_<?= $identifier ?>" onclick="despliegaBlockLista('<?= $identifier ?>', '<?= $colapsable1 ?>', '<?= $colapsable2 ?>');">
	        <img src="<?= BASEPATH ?>SourceFiles/resources/images/icon-minus.png" height="16" width="16"/>
	    </div>
	    <?php foreach($datos as $key => $value){?>
	    	<div class="string_to_split" style="display: none;"><?= $value['reparto'];?></div>
	    <?php } ?>    
	    <div id="<?= $identifier ?>_section" style="display: none;"> 
			<div class="text-data-list section-list-content" 
			style="margin-top: 2%; width: 80%; display: flex; background-color:darkgray; border: 2px solid dashed;">
				<span style="width: 10%;">&nbsp</span>
				<span style="width: 58%; font-weight: bold;">Nombre</span>
				<span style="width: 25%; font-weight: bold; white-space: nowrap;">Nº de Peliculas</span>
			</div>		
			<div id="actors_table_count">
			</div>
	    </div>		    
    </div>


<?php } 

function collapsibleSectionVideoInfo($identifier, $label, $id_video_option, $idioma, $peso, $calidad, $tipo, $videourl){ ?>
	<div class="collapsible-container-video">
	    <div style="padding-top: 8px; padding-left: 15px;" class="label-collapsible-link"><?= $label ?></div>		
	    <div class="icon-plus_video" id="icon-plus_video_<?= $identifier ?>" onclick="openCloseBlockSectionVideo('<?= $identifier ?>');">
	        <img src="<?= BASEPATH ?>SourceFiles/resources/images/icon-plus.png" height="16" width="16"/>
	    </div>
	    <div class="icon-minus_video" id="icon-minus_video_<?= $identifier ?>" onclick="openCloseBlockSectionVideo('<?= $identifier ?>');">
	        <img src="<?= BASEPATH ?>SourceFiles/resources/images/icon-minus.png" height="16" width="16"/>
	    </div>
    </div>
    
    <div id="<?= $identifier ?>_video" style="display: none;"> 
                        <div class="box_video_content" id="specific_video_option_<?php echo $id_video_option ?>">
                            <div>
                                <span class="label-text-scroll"><span>Audio: </span>
                                <span class="label-info-video"><span><?php echo $idioma ?></span>
                            </div> 
                            <div>
                                <span class="label-text-scroll"><span>Calidad de video: </span>
                                <span class="label-info-video"><span><?php echo $calidad ?></span>
                            </div>                             
                            <div>
                                <span class="label-text-scroll"><span>Peso: </span>
                                <span class="label-info-video"><span><?php echo $peso ?></span>
                            </div>                                                           
                            <div>
                                <span class="label-link"><span id="alter-link" onclick="goToExternalLink('<?php echo $videourl ?>')"><?php echo $tipo ?></span>
                            </div>                                        
                        </div>
    </div>	    
    	
    <?php } 




function collapsibleOneSectionTwoInputs($identifier, $label, $label_input1, $label_input2=null, $name_input1, $name_input2=null , $input_type1, $input_type2=null) { ?>
    <div class="collapsible-container" id="collapsible-container_input_<?php echo $identifier ?>">                      
        <div style="padding-top: 8px; padding-left: 15px;" class="label-collapsible"><?php echo $label ?></div>        
        <div class="icon-plus" id="icon-plus_input_<?php echo $identifier ?>" onclick="despliegaInputOneSection('<?php echo $identifier ?>');">
            <img src="<?= BASEPATH ?>SourceFiles/resources/images/icon-plus.png" height="16" width="16"/>
        </div>
        <div class="icon-minus" id="icon-minus_input_<?php echo $identifier ?>" onclick="despliegaInputOneSection('<?php echo $identifier ?>');">
            <img src="<?= BASEPATH ?>SourceFiles/resources/images/icon-minus.png" height="16" width="16"/>
        </div>
        <div id="<?php echo $identifier ?>_input" style="display:none; margin-left: 15%; margin-top: 25px;">
            <div style="margin-bottom: 25px;">
                <input type="<?php echo $input_type1 ?>" class="filter_'<?php echo $identifier ?>'_control" id="<?php echo $identifier ?>_input_id" placeholder="<?php echo $label_input1 ?>" name="<?php echo $name_input1 ?>" style="border-radius: 4px; height: 22px; width: 200px; ">
            </div>
            <?php if($label_input2 != null){?>
            <div style="margin-bottom: 25px;">
                <input type="<?php echo $input_type2 ?>" class="filter_'<?php echo $identifier ?>'_control" id="<?php echo $identifier ?>_input_id" placeholder="<?php echo $label_input2 ?>" name="<?php echo $name_input2 ?>" style="border-radius: 4px; height: 22px; width: 200px; ">
            </div>
            <?php } ?>
                      <div style="margin-bottom: 25px;">
                      <button type="submit" class="btn_accept_a">OK</button>
                    </div>
        </div> 
        <div class="separador"></div> 
    </div>
    <div class="separador"></div>   
    <div class="separador"></div> 
<?php }      

function collapsibleOneSectionInputAndTextarea($identifier, $label, $label_input1, $label_input2=null, $name_input1, $name_input2=null , $input_type1, $input_type2=null) { ?>
    <div class="collapsible-container" id="collapsible-container_input_<?php echo $identifier ?>">                      
        <div style="padding-top: 8px; padding-left: 15px;" class="label-collapsible"><?php echo $label ?></div>        
        <div class="icon-plus" id="icon-plus_input_<?php echo $identifier ?>" onclick="despliegaInputOneSection('<?php echo $identifier ?>');">
            <img src="<?= BASEPATH ?>SourceFiles/resources/images/icon-plus.png" height="16" width="16"/>
        </div>
        <div class="icon-minus" id="icon-minus_input_<?php echo $identifier ?>" onclick="despliegaInputOneSection('<?php echo $identifier ?>');">
            <img src="<?= BASEPATH ?>SourceFiles/resources/images/icon-minus.png" height="16" width="16"/>
        </div>
        <div id="<?php echo $identifier ?>_input" style="display:none; margin-left: 15%; margin-top: 25px;">
            <div style="margin-bottom: 25px;">
                <input type="<?php echo $input_type1 ?>" class="filter_'<?php echo $identifier ?>'_control scroll-text" id="<?php echo $name_input1 ?>_input_id" placeholder="<?php echo $label_input1 ?>" name="<?php echo $name_input1 ?>" style="border-radius: 4px; height: 22px; width: 200px; ">
            </div>
            <?php if($label_input2 != null){?>
            <div style="margin-bottom: 25px;">
                <textarea name="<?php echo $name_input2 ?>" rows="4" cols="50" id="<?php echo $name_input1 ?>_input_id" class="scroll-text" placeholder="<?php echo $label_input2 ?>" style="border-radius: 4px;"></textarea>
            </div>
            <?php } ?>
            <div style="margin-bottom: 25px;">
                <input type="button" class="btn_accept_a" onclick="validateForm();" value="OK" />
            </div>
        </div> 
        <div class="separador"></div> 
    </div>
    <div class="separador"></div>   
    <div class="separador"></div> 
<?php }   

function collapsibleSectionReadComments($identifier, $label, $datos = array()) { ?>
    <div class="collapsible-container" id="collapsible-container_input_<?php echo $identifier ?>">                      
        <div style="padding-top: 8px; padding-left: 15px;" class="label-collapsible"><?php echo $label ?></div>        
        <div class="icon-plus" id="icon-plus_input_<?php echo $identifier ?>" onclick="despliegaInputOneSection('<?php echo $identifier ?>');">
            <img src="<?= BASEPATH ?>SourceFiles/resources/images/icon-plus.png" height="16" width="16"/>
        </div>
        <div class="icon-minus" id="icon-minus_input_<?php echo $identifier ?>" onclick="despliegaInputOneSection('<?php echo $identifier ?>');">
            <img src="<?= BASEPATH ?>SourceFiles/resources/images/icon-minus.png" height="16" width="16"/>
        </div>
        	<div id="<?php echo $identifier ?>_top_input" style="height: 200px; width: 50%; overflow-x: hidden; overflow-y: auto; margin-top: 25px;">
              <?php foreach ($datos as $key2 => $elemento2){ ?>
                <div id="specific_comment_<?php echo $elemento2['id_comment']; ?>">
                    <div class="box_comment_content">
                        <div style="margin-left: 10px;margin-top: 5px;"><span class="label-text">Nombre: </span><span class="scroll-text"><?php echo $elemento2['usuario'] ?></span></div>
                        <div style="margin-left: 10px;margin-top: 5px;"><span class="label-text">Fecha: </span><span class="scroll-text"><?php echo $elemento2['fecha'] ?></span></div>                    
                        <div style="margin-left: 10px;margin-top: 5px;"><span class="label-text">Comentario: </span><span class="scroll-text"><?php echo $elemento2['comment'] ?></span></div>                                            
                    </div>
                </div>
			<?php  } ?>
			</div>	    
    </div>

<?php }?>



    