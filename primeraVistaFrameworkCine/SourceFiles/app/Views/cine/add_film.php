<?php
require '../public_html/config.php';
require BASEPATHPUB.'SourceFiles/app/m/m_login.php';
session_start();
if(isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'Javi'){
  $_SESSION['usuario'] = 'Javi';
}else{
  $_SESSION['usuario'] = 'NULL';
} 
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script type="text/javascript">


function nuevo_upload_file(){
	var contador = 0;
    var file_data = $('.fileway1').prop('files')[0];
    var form_data = new FormData();
    form_data.append('fileway1', file_data);
    alert('Intentando upload con AJAX');
    $.ajax({   	    
        url: '<?= URL ?>SourceFiles/resources/ajaxfile.php', // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {alert("Enviando archivo, espere por favor...");},
        data: form_data,
        type: 'post',
            success: function (response) {  
               	alert ('success - CARTEL subido'); 
                guardaRespuestaAjax(response);
            },
            error: function (response) {
                alert('error no_success');
            }
        });          
}

function nuevo_upload_file_fotograma(){
	var contador = 0;
    var file_data = $('.fileway2').prop('files')[0];
    var form_data = new FormData();
    form_data.append('fileway2', file_data);
    alert('Intentando upload con AJAX');
    $.ajax({   	    
        url: '<?= URL ?>SourceFiles/resources/ajaxfilefotograma.php', // point to server-side PHP script 
        dataType: 'json', // what to expect back from the PHP script
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {alert("Enviando archivo, espere por favor...");},
        data: form_data,
        type: 'post',
            success: function (response) { 
                alert ('success - FOTOGRAMA subido'); 
                guardaRespuestaAjaxFotograma(response);
            },
            error: function (response) {
                alert('error no_success');
            }
        });          
}

function guardaRespuestaAjax(response){

	var respuestaTmp = response['filenametmp'];
	var respuestaNombreReal = response['filename'];

	alert(respuestaTmp);
	alert(respuestaNombreReal);
	
	var rutaDeCarpeta ="<?= URL ?>SourceFiles/resources/images/"+respuestaNombreReal+"";

	$('#imagenSubida').attr("src",rutaDeCarpeta);
	$('#imagenSubidaInput').val(respuestaNombreReal);
	
}

function guardaRespuestaAjaxFotograma(response){

	var respuestaTmp = response['filenametmp'];
	var respuestaNombreReal = response['filename'];

	alert(respuestaTmp);
	alert(respuestaNombreReal);
	
	var rutaDeCarpeta ="<?= URL ?>SourceFiles/resources/images/"+respuestaNombreReal+"";

	$('#fotogramaSubido').attr("src",rutaDeCarpeta);
	$('#fotogramaSubidoInput').val(respuestaNombreReal);
	
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
</script>

<?php 
$desired_dir2= BASEPATHPUB . 'SourceFiles/resources/images';
$ficheros1  = scandir($desired_dir2);
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="retroceluloide" content="">
        <meta name="retroceluloide" content="width=device-width">       
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?= BASEPATH ?>SourceFiles/app/Views/css/new-dessign.css">
    </head>
    <body>
        <div class="main-content">    
            <div class="module-block-default">
                <?php include 'tabs-header.php'; ?> 
                <?php include 'navigation-bar.php'; ?>               
            </div>
            <?php if($_SESSION['usuario'] != 'NULL'){?>        
			<form action="<?= URL ?>SourceFiles/app/m/m_add_film.php" method="get">
				<div style="height: 100%; background-color: #556b2f; display: flex;"> 	
					<div style="margin-left: 80px; padding-top: 20px; width: 20%;">	
						<div class="rotulo_mid_no_mg" style="margin-top: 15px;">TÍTULO</div>
						<div><input type="text" name="title" /></div>				
						<div class="rotulo_mid_no_mg" style="margin-top: 15px;">DIRECTOR</div>
						<div><input type="text" name="director" /></div>
						<div class="rotulo_mid_no_mg" style="margin-top: 15px;">AÑO</div>
						<div><input type="text" name="anyo" /></div>
						<div class="rotulo_mid_no_mg" style="margin-top: 15px;">GÉNERO</div>
						<div><input type="text" name="genero" /></div>
						<div class="rotulo_mid_no_mg" style="margin-top: 15px;">NACIONALIDAD</div>
						<div><input type="text" name="nacionalidad" /></div>
						<div class="rotulo_mid_no_mg" style="margin-top: 15px;">REPARTO</div>
						<div><input type="text" name="reparto" /></div>
						<div class="rotulo_mid_no_mg" style="margin-top: 15px;">DESCRIPCIÓN</div>
						<div><input type="text" name="description" /></div>
						<div class="rotulo_mid_no_mg" style="margin-top: 15px;">VIDEO-URL</div>
						<div><input type="text" name="videourl" /></div>
						<div style="margin-top: 40px; margin-left: 55%;">
							<button type="submit">AÑADIR PELÍCULA</button>
						</div>							
					</div>		
					<div style="width: 30%; margin-top: 35px;">
						<div class="rotulo_mid_no_mg" onclick="funciona();">ADJUNTAR CARTEL</div>
						<input type="file" class="fileway1" onchange="nuevo_upload_file();" name="myfile" />
						<div>
							<img src="" id="imagenSubida" alt="cartel" height="140px;" width="100px;">
						</div>
						<input type="hidden" id="imagenSubidaInput" name="cover" />
						<div class="rotulo_mid_no_mg" style="margin-top: 15px;" onclick="funciona();">ADJUNTAR FOTOGRAMA</div>
						<input type="file" class="fileway2" onchange="nuevo_upload_file_fotograma();" name="myfile2" />
						<div>
							<img src="" id="fotogramaSubido" alt="fotograma" height="100px;" width="140px;">
						</div>
						<input type="hidden" id="fotogramaSubidoInput" name="fotograma" />
					</div>
					<div id="cartel_image_hidden"></div>				
				</div>		
			</form>
			<?php } else{ ?>
			<div style="height: 100%; background-color: #556b2f;"></div> 	
			<?php } ?>
		</div>		
    </body>
</html>


						
	              
				  

         
		



						
	              
				  

         
