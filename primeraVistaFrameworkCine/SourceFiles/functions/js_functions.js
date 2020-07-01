function prueba(){
	alert('Estamos probando');
}

function redirect_film(elem){

  var hermano = $(elem).next();
  var url = hermano[0].value;
    window.open(url, "_blank");
}

function openCloseBlock(elem){
	var more = $('#icon-plus_'+elem).css('display');
	var less = $('#icon-minus_'+elem).css('display');
	var content = $('#'+elem).css('display');
	if(more == 'block'){
		$('#icon-plus_'+elem).hide();
		$('#icon-minus_'+elem).show();
		$('#'+elem+'_section').css('display', 'flex');
	}
	if(more == 'none'){
		$('#icon-plus_'+elem).show();
		$('#icon-minus_'+elem).hide();
		$('#'+elem+'_section').hide();
	}	

}

function openCloseBlockSection(elem){
	var more = $('#icon-plus_'+elem).css('display');
	var less = $('#icon-minus_'+elem).css('display');
	var content = $('#'+elem).css('display');
	if(more == 'block'){
		$('#icon-plus_'+elem).hide();
		$('#icon-minus_'+elem).show();
		$('#'+elem+'_section').css('display', 'block');
	}
	if(more == 'none'){
		$('#icon-plus_'+elem).show();
		$('#icon-minus_'+elem).hide();
		$('#'+elem+'_section').hide();
	}	

}

function openCloseBlockSectionVideo(elem){
	var more = $('#icon-plus_video_'+elem).css('display');
	var less = $('#icon-minus_video_'+elem).css('display');
	var content = $('#'+elem).css('display');
	if(more == 'block'){
		$('#icon-plus_video_'+elem).hide();
		$('#icon-minus_video_'+elem).show();
		$('#'+elem+'_video').css('display', 'block');
	}
	if(more == 'none'){
		$('#icon-plus_video_'+elem).show();
		$('#icon-minus_video_'+elem).hide();
		$('#'+elem+'_video').hide();
	}	

}

function searchFilterControl(elem){
    $( '.filter_search_control').hide();
    $( '.filter_search_control').val('');
    var padre = $(elem).parent();
    //console.log(padre);
    var field = $(padre).find( '.filter_search_control');
    $(field).show();
  
}

var order_desc = 0;

function sortList_4col_1action(elem, num){

	var sort_col = elem.id;
	var textos_col_map_original = [];
	var textos_col_map = [];
	//En este bucle estamos creando dinámicamente los arrays que empiezan por 'textos_col_'
	for(var c = 0; c < num; c++){
		eval("textos_col_"+c+"=[]");
	}


	var rows = $("[id^='alternate_row_list']");
	var cont = 0;
	$( rows ).each(function() {
		var content_text_col_0 = $(this).find('.sort_col_list_0');
		var content_text_col_1 = $(this).find( '.sort_col_list_1');
		var content_text_col_2 = $(this).find( '.sort_col_list_2');
		var content_text_col_3 = $(this).find( '.sort_col_list_3');
		var content_text_col_4 = $(this).find( '.sort_col_list_4');

		var texto_col_0 = $(content_text_col_0).text();
		var texto_col_1 = $(content_text_col_1).text();
		var texto_col_2 = $(content_text_col_2).text();
		var texto_col_3 = $(content_text_col_3).text();	
		var texto_col_4 = $(content_text_col_4).text();			

		if(sort_col == 'sort_col_head_0'){
			textos_col_map.push([texto_col_0, texto_col_1, texto_col_2, texto_col_3, texto_col_4]);
		}
		if(sort_col == 'sort_col_head_1'){
			textos_col_map.push([texto_col_1, texto_col_0, texto_col_2, texto_col_3, texto_col_4]);
		}	
		if(sort_col == 'sort_col_head_2'){
			textos_col_map.push([texto_col_2, texto_col_0, texto_col_1, texto_col_3, texto_col_4]);
		}	
		if(sort_col == 'sort_col_head_3'){
			textos_col_map.push([texto_col_3, texto_col_0, texto_col_1, texto_col_2, texto_col_4]);
		}	
		if(sort_col == 'sort_col_head_4'){
			textos_col_map.push([texto_col_3, texto_col_0, texto_col_1, texto_col_2, texto_col_4]);
		}	
		//textos_col_map_original.push([texto_col_0, texto_col_1, texto_col_2, texto_col_3, texto_col_4, ]);					
	});	
	
	if( order_desc == 0){
		var textos_ordenados = textos_col_map.sort();
		order_desc++;
	}else{
		var textos_ordenados = textos_col_map.sort();
		textos_ordenados.reverse();
		order_desc--;
	}
	var num = textos_ordenados.length;

	for(var k = 0; k < num; k++){
		var col_0 = $("#alternate_row_list_"+k).find( '.sort_col_list_0');
		var col_1 = $("#alternate_row_list_"+k).find( '.sort_col_list_1');
		var col_2 = $("#alternate_row_list_"+k).find( '.sort_col_list_2');
		var col_3 = $("#alternate_row_list_"+k).find( '.sort_col_list_3');
		var col_4 = $("#alternate_row_list_"+k).find( '.sort_col_list_4');

		if(sort_col == 'sort_col_head_0'){
			$(col_0).text(textos_ordenados[k][0]);
			$(col_1).text(textos_ordenados[k][1]);
			$(col_2).text(textos_ordenados[k][2]);
			$(col_3).text(textos_ordenados[k][3]);
			$(col_4).text(textos_ordenados[k][4]);
		}	

		if(sort_col == 'sort_col_head_1'){
			$(col_1).text(textos_ordenados[k][0]);
			$(col_0).text(textos_ordenados[k][1]);
			$(col_2).text(textos_ordenados[k][2]);
			$(col_3).text(textos_ordenados[k][3]);
			$(col_4).text(textos_ordenados[k][4]);
		}	
		if(sort_col == 'sort_col_head_2'){
			$(col_2).text(textos_ordenados[k][0]);
			$(col_0).text(textos_ordenados[k][1]);
			$(col_1).text(textos_ordenados[k][2]);
			$(col_3).text(textos_ordenados[k][3]);
			$(col_4).text(textos_ordenados[k][4]);
		}		
		if(sort_col == 'sort_col_head_3'){
			$(col_3).text(textos_ordenados[k][0]);
			$(col_0).text(textos_ordenados[k][1]);
			$(col_1).text(textos_ordenados[k][2]);
			$(col_2).text(textos_ordenados[k][3]);
			$(col_4).text(textos_ordenados[k][4]);
		}
		if(sort_col == 'sort_col_head_4'){
			$(col_4).text(textos_ordenados[k][0]);
			$(col_0).text(textos_ordenados[k][1]);
			$(col_1).text(textos_ordenados[k][2]);
			$(col_2).text(textos_ordenados[k][3]);
			$(col_3).text(textos_ordenados[k][4]);
		}									
	}

	var id_to_action_1 = $(".sort_col_list_4");

	$( id_to_action_1 ).each(function() {
		var id_nueva = $(this).text();
		var next_hermano = $(this).next();		
		var form_action_1 = $(next_hermano).find( '.action_data_list');
		var action_1 = form_action_1[0];
		var text_action_1 = $(action_1).attr("action");
		var pos = text_action_1.lastIndexOf("&id=");
		var pos_fixed = pos + 4;
		var text_action_no_id = text_action_1.slice(0, pos_fixed);
		var full_text_action_1 = text_action_no_id + id_nueva;
		var text_action_fixed_1 = $(action_1).attr("action", full_text_action_1);

	});		

	//textos_ordenados = textos_original;
}

function sortList_5col_1action(elem, num){

	var sort_col = elem.id;
	var textos_col_map_original = [];
	var textos_col_map = [];
	//En este bucle estamos creando dinámicamente los arrays que empiezan por 'textos_col_'
	for(var c = 0; c < num; c++){
		eval("textos_col_"+c+"=[]");
	}


	var rows = $("[id^='alternate_row_list']");
	var cont = 0;
	$( rows ).each(function() {
		var content_text_col_0 = $(this).find('.sort_col_list_0');
		var content_text_col_1 = $(this).find( '.sort_col_list_1');
		var content_text_col_2 = $(this).find( '.sort_col_list_2');
		var content_text_col_3 = $(this).find( '.sort_col_list_3');
		var content_text_col_4 = $(this).find( '.sort_col_list_4');
		var content_text_col_5 = $(this).find( '.sort_col_list_5');

		var texto_col_0 = $(content_text_col_0).text();
		var texto_col_1 = $(content_text_col_1).text();
		var texto_col_2 = $(content_text_col_2).text();
		var texto_col_3 = $(content_text_col_3).text();	
		var texto_col_4 = $(content_text_col_4).text();			
		var texto_col_5 = $(content_text_col_5).text();

		if(sort_col == 'sort_col_head_0'){
			textos_col_map.push([texto_col_0, texto_col_1, texto_col_2, texto_col_3, texto_col_4, texto_col_5]);
		}
		if(sort_col == 'sort_col_head_1'){
			textos_col_map.push([texto_col_1, texto_col_0, texto_col_2, texto_col_3, texto_col_4, texto_col_5]);
		}	
		if(sort_col == 'sort_col_head_2'){
			textos_col_map.push([texto_col_2, texto_col_0, texto_col_1, texto_col_3, texto_col_4, texto_col_5]);
		}	
		if(sort_col == 'sort_col_head_3'){
			textos_col_map.push([texto_col_3, texto_col_0, texto_col_1, texto_col_2, texto_col_4, texto_col_5]);
		}	
		if(sort_col == 'sort_col_head_4'){
			textos_col_map.push([texto_col_4, texto_col_0, texto_col_1, texto_col_2, texto_col_3, texto_col_5]);
		}	
		if(sort_col == 'sort_col_head_5'){
			textos_col_map.push([texto_col_5, texto_col_0, texto_col_1, texto_col_2, texto_col_3, texto_col_4]);
		}			
		//textos_col_map_original.push([texto_col_0, texto_col_1, texto_col_2, texto_col_3, texto_col_4, ]);					
	});	
	
	if( order_desc == 0){
		var textos_ordenados = textos_col_map.sort();
		order_desc++;
	}else{
		var textos_ordenados = textos_col_map.sort();
		textos_ordenados.reverse();
		order_desc--;
	}
	var num = textos_ordenados.length;

	for(var k = 0; k < num; k++){
		var col_0 = $("#alternate_row_list_"+k).find( '.sort_col_list_0');
		var col_1 = $("#alternate_row_list_"+k).find( '.sort_col_list_1');
		var col_2 = $("#alternate_row_list_"+k).find( '.sort_col_list_2');
		var col_3 = $("#alternate_row_list_"+k).find( '.sort_col_list_3');
		var col_4 = $("#alternate_row_list_"+k).find( '.sort_col_list_4');
		var col_5 = $("#alternate_row_list_"+k).find( '.sort_col_list_5');

		if(sort_col == 'sort_col_head_0'){
			$(col_0).text(textos_ordenados[k][0]);
			$(col_1).text(textos_ordenados[k][1]);
			$(col_2).text(textos_ordenados[k][2]);
			$(col_3).text(textos_ordenados[k][3]);
			$(col_4).text(textos_ordenados[k][4]);
			$(col_5).text(textos_ordenados[k][5]);
		}	

		if(sort_col == 'sort_col_head_1'){
			$(col_1).text(textos_ordenados[k][0]);
			$(col_0).text(textos_ordenados[k][1]);
			$(col_2).text(textos_ordenados[k][2]);
			$(col_3).text(textos_ordenados[k][3]);
			$(col_4).text(textos_ordenados[k][4]);
			$(col_5).text(textos_ordenados[k][5]);
		}	
		if(sort_col == 'sort_col_head_2'){
			$(col_2).text(textos_ordenados[k][0]);
			$(col_0).text(textos_ordenados[k][1]);
			$(col_1).text(textos_ordenados[k][2]);
			$(col_3).text(textos_ordenados[k][3]);
			$(col_4).text(textos_ordenados[k][4]);
			$(col_5).text(textos_ordenados[k][5]);
		}		
		if(sort_col == 'sort_col_head_3'){
			$(col_3).text(textos_ordenados[k][0]);
			$(col_0).text(textos_ordenados[k][1]);
			$(col_1).text(textos_ordenados[k][2]);
			$(col_2).text(textos_ordenados[k][3]);
			$(col_4).text(textos_ordenados[k][4]);
			$(col_5).text(textos_ordenados[k][5]);
		}
		if(sort_col == 'sort_col_head_4'){
			$(col_4).text(textos_ordenados[k][0]);
			$(col_0).text(textos_ordenados[k][1]);
			$(col_1).text(textos_ordenados[k][2]);
			$(col_2).text(textos_ordenados[k][3]);
			$(col_3).text(textos_ordenados[k][4]);
			$(col_5).text(textos_ordenados[k][5]);
		}		
		if(sort_col == 'sort_col_head_5'){
			$(col_5).text(textos_ordenados[k][0]);
			$(col_0).text(textos_ordenados[k][1]);
			$(col_1).text(textos_ordenados[k][2]);
			$(col_2).text(textos_ordenados[k][3]);
			$(col_3).text(textos_ordenados[k][4]);
			$(col_4).text(textos_ordenados[k][5]);
		}									
	}

	var id_to_action_1 = $(".sort_col_list_5");

	$( id_to_action_1 ).each(function() {
		var id_nueva = $(this).text();
		var next_hermano = $(this).next();		
		var form_action_1 = $(next_hermano).find( '.action_data_list');
		var action_1 = form_action_1[0];
		var text_action_1 = $(action_1).attr("action");
		var pos = text_action_1.lastIndexOf("&id=");
		var pos_fixed = pos + 4;
		var text_action_no_id = text_action_1.slice(0, pos_fixed);
		var full_text_action_1 = text_action_no_id + id_nueva;
		var text_action_fixed_1 = $(action_1).attr("action", full_text_action_1);

	});		

	//textos_ordenados = textos_original;
}

function sortList_2col_1action(elem, num){

	var sort_col = elem.id;
	var textos_col_map_original = [];
	var textos_col_map = [];
	//En este bucle estamos creando dinámicamente los arrays que empiezan por 'textos_col_'
	for(var c = 0; c < num; c++){
		eval("textos_col_"+c+"=[]");
	}


	var rows = $("[id^='alternate_row_list']");
	var cont = 0;
	$( rows ).each(function() {
		var content_text_col_0 = $(this).find('.sort_col_list_0');
		var content_text_col_1 = $(this).find( '.sort_col_list_1');
		var content_text_col_2 = $(this).find( '.sort_col_list_2');

		var texto_col_0 = $(content_text_col_0).text();
		var texto_col_1 = $(content_text_col_1).text();
		var texto_col_2 = $(content_text_col_2).text();	

		if(sort_col == 'sort_col_head_0'){
			textos_col_map.push([texto_col_0, texto_col_1, texto_col_2]);
		}
		if(sort_col == 'sort_col_head_1'){
			textos_col_map.push([texto_col_1, texto_col_0, texto_col_2]);
		}	

		//textos_col_map_original.push([texto_col_0, texto_col_1, texto_col_2, texto_col_3, texto_col_4, ]);					
	});	
	
	if( order_desc == 0){
		var textos_ordenados = textos_col_map.sort();
		order_desc++;
	}else{
		var textos_ordenados = textos_col_map.sort();
		textos_ordenados.reverse();
		order_desc--;
	}
	var num = textos_ordenados.length;

	for(var k = 0; k < num; k++){
		var col_0 = $("#alternate_row_list_"+k).find( '.sort_col_list_0');
		var col_1 = $("#alternate_row_list_"+k).find( '.sort_col_list_1');
		var col_2 = $("#alternate_row_list_"+k).find( '.sort_col_list_2');

		if(sort_col == 'sort_col_head_0'){
			$(col_0).text(textos_ordenados[k][0]);
			$(col_1).text(textos_ordenados[k][1]);
			$(col_2).text(textos_ordenados[k][2]);

		}	

		if(sort_col == 'sort_col_head_1'){
			$(col_1).text(textos_ordenados[k][0]);
			$(col_0).text(textos_ordenados[k][1]);
			$(col_2).text(textos_ordenados[k][2]);

		}	
		if(sort_col == 'sort_col_head_2'){
			$(col_2).text(textos_ordenados[k][0]);
			$(col_0).text(textos_ordenados[k][1]);
			$(col_1).text(textos_ordenados[k][2]);

		}		
									
	}

	var id_to_action_1 = $(".sort_col_list_2");

	$( id_to_action_1 ).each(function() {
		var id_nueva = $(this).text();
		var next_hermano = $(this).next();		
		var form_action_1 = $(next_hermano).find( '.action_data_list');
		var action_1 = form_action_1[0];
		var text_action_1 = $(action_1).attr("action");
		var pos = text_action_1.lastIndexOf("&id=");
		var pos_fixed = pos + 4;
		var text_action_no_id = text_action_1.slice(0, pos_fixed);
		var full_text_action_1 = text_action_no_id + id_nueva;
		var text_action_fixed_1 = $(action_1).attr("action", full_text_action_1);

	});		

	//textos_ordenados = textos_original;
}

function transitionNext(){
  $( ".box_film_content_left_terciary" ).animate({
        opacity: 0.1,
        marginTop: "5%",
        marginLeft: "10%",     
        height: "35%",
        width: "30%", 
    }, 400, function() {
    // Animation complete.
    $( ".box_film_content_left_terciary" ).animate({
        opacity: 0.0,
        marginTop: "7.5%",
        marginLeft: "10%",     
        height: "25%",
        width: "20%",                
        }, 1, function() {
        // Animation complete.
        sliderNext_x1();
      }); 
  });     
  $( ".box_film_content_left_secondary" ).animate({
        opacity: 0.7,
        marginTop: "2.5%",
        marginLeft: "15%",     
        height: "45%",
        width: "40%",
    }, 400, function() {
    // Animation complete.
    $( ".box_film_content_left_secondary" ).animate({
        opacity: 0.1,
        marginTop: "5%",
        marginLeft: "10%",     
        height: "35%",
        width: "30%",        
        }, 1, function() {
        // Animation complete.

      }); 
  });      
  $( ".box_film_content_left" ).animate({
        opacity: 1,
        marginTop: "0%",
        marginLeft: "25%",     
        height: "55%",
        width: "50%",
    }, 400, function() {
    // Animation complete.
    $( ".box_film_content_left" ).animate({
        opacity: 0.7,
        marginTop: "2.5%",
        marginLeft: "15%",     
        height: "45%",
        width: "40%",        
        }, 1, function() {
        // Animation complete.

      }); 
  });      
  $( ".box_film_content_center" ).animate({
        opacity: 0.7,
        marginTop: "2.5%",
        marginLeft: "45%",     
        height: "45%",
        width: "40%",
    }, 400, function() {
    // Animation complete.
    $( ".box_film_content_center" ).animate({
        opacity: 1,
        marginTop: "0%",
        marginLeft: "25%",     
        height: "55%",
        width: "50%",
        }, 1, function() {
        // Animation complete.

      }); 
  });     
  $( ".box_film_content_right" ).animate({
    opacity: 0.1,
    marginTop: "5%",
    marginLeft: "60%",     
    height: "35%",
    width: "30%",
    }, 400, function() {
    // Animation complete.
    $( ".box_film_content_right" ).animate({
        opacity: 0.7,
        marginTop: "2.5%",
        marginLeft: "45%",     
        height: "45%",
        width: "40%",
        }, 1, function() {
        // Animation complete.

      }); 
  });  

  $( ".box_film_content_right_secondary" ).animate({
    opacity: 0.0,
    marginTop: "10%",     
    height: "25%",
    width: "30%",
  }, 400, function() {
    $( ".box_film_content_right_secondary" ).animate({
        opacity: 0.1,
        marginTop: "5%",
        marginLeft: "60%",     
        height: "35%",
        width: "30%",
        }, 1, function() {
        // Animation complete.

      }); 
    
  });

  $( ".clip-container-left-terciary > img" ).animate({
        opacity: 0.5,
	    height: "5.9%",
	    width: "1.8%",    
	    marginLeft: "10.5%",
	    marginTop: "4.4%",
    }, 400, function() {
    // Animation complete.
    $( ".clip-container-left-terciary > img" ).animate({
        opacity: 0,
	    height: "4%",
	    width: "1.8%",    
	    marginLeft: "10.5%",
	    marginTop: "6.8%",
        }, 1, function() {
        // Animation complete.

      }); 
  });   
  $( ".clip-container-left-secondary > img" ).animate({
        opacity: 1,
	    height: "7.9%",
	    width: "2.4%",    
	    marginLeft: "15.4%",
	    marginTop: "1.9%",
    }, 400, function() {
    // Animation complete.
    $( ".clip-container-left-secondary > img" ).animate({
        opacity: 0.5,
	    height: "5.9%",
	    width: "1.8%",    
	    marginLeft: "10.5%",
	    marginTop: "4.4%",
        }, 1, function() {
        // Animation complete.

      }); 
  });    
  $( ".clip-container-left > img" ).animate({
        opacity: 1,
	    height: "11%",
	    width: "3%",    
	    marginLeft: "25.4%",
	    marginTop: "-1%",
    }, 400, function() {
    // Animation complete.
    $( ".clip-container-left > img" ).animate({
        opacity: 1,
	    height: "7.9%",
	    width: "2.4%",    
	    marginLeft: "15.4%",
	    marginTop: "1.9%",
        }, 1, function() {
        // Animation complete.

      }); 
  });  
  $( ".clip-container-center > img" ).animate({
        opacity: 0.5,
	    height: "9%",
	    width: "2%",    
	    marginLeft: "45.4%",
	    zIndex: 10,
	    marginTop: "2.3%",
    }, 400, function() {
    // Animation complete.
    $( ".clip-container-center > img" ).animate({
        opacity: 1,
	    height: "11%",
	    width: "3%",    
	    marginLeft: "25.4%",
	    zIndex: 11,
	    marginTop: "-1%",
        }, 1, function() {
        // Animation complete.

      }); 
  });  


}


function transitionBefore(){   
  $( ".box_film_content_left_secondary" ).animate({
        opacity: 0.0,
        marginTop: "7.5%",
        marginLeft: "10%",     
        height: "25%",
        width: "20%",
    }, 400, function() {
    // Animation complete.
    $( ".box_film_content_left_secondary" ).animate({
        opacity: 0.1,
        marginTop: "5%",
        marginLeft: "10%",     
        height: "35%",
        width: "30%",        
        }, 1, function() {
        // Animation complete.
        sliderBefore_x1();

      }); 
  });      
  $( ".box_film_content_left" ).animate({
        opacity: 0.1,
        marginTop: "5%",
        marginLeft: "10%",     
        height: "35%",
        width: "30%",
    }, 400, function() {
    // Animation complete.
    $( ".box_film_content_left" ).animate({
        opacity: 0.7,
        marginTop: "2.5%",
        marginLeft: "15%",     
        height: "45%",
        width: "40%",        
        }, 1, function() {
        // Animation complete.

      }); 
  });      
  $( ".box_film_content_center" ).animate({
        opacity: 0.7,
        marginTop: "2.5%",
        marginLeft: "15%",     
        height: "45%",
        width: "40%",
    }, 400, function() {
    // Animation complete.
    $( ".box_film_content_center" ).animate({
        opacity: 1,
        marginTop: "0%",
        marginLeft: "25%",     
        height: "55%",
        width: "50%",
        }, 1, function() {
        // Animation complete.

      }); 
  });     
  $( ".box_film_content_right" ).animate({
    opacity: 1,
    marginTop: "0%",
    marginLeft: "25%",     
    height: "55%",
    width: "50%",
    }, 400, function() {
    // Animation complete.
    $( ".box_film_content_right" ).animate({
        opacity: 0.7,
        marginTop: "2.5%",
        marginLeft: "45%",     
        height: "45%",
        width: "40%",
        }, 1, function() {
        // Animation complete.

      }); 
  });  

  $( ".box_film_content_right_secondary" ).animate({
    opacity: 0.7,
    marginTop: "2.5%",
    marginLeft: "45%",      
    height: "45%",
    width: "40%",
  }, 400, function() {
    $( ".box_film_content_right_secondary" ).animate({
        opacity: 0.1,
        marginTop: "5%",
        marginLeft: "60%",     
        height: "35%",
        width: "30%",
        }, 1, function() {
        // Animation complete.

      }); 
    
  });

  $( ".box_film_content_right_terciary" ).animate({
        opacity: 0.1,
        marginTop: "5%",
        marginLeft: "60%",     
        height: "35%",
        width: "30%", 
    }, 400, function() {
    // Animation complete.
    $( ".box_film_content_right_terciary" ).animate({
        opacity: 0.0,
        marginTop: "7.5%",
        marginLeft: "70%",     
        height: "25%",
        width: "20%",                
        }, 1, function() {
        // Animation complete.

      });
 
  });
   

  $( ".clip-container-left-secondary > img" ).animate({

        opacity: 0,
	    height: "4%",
	    width: "1.8%",    
	    marginLeft: "9.5%",
	    marginTop: "6.8%", 	    	
    }, 400, function() {
    // Animation complete.
    $( ".clip-container-left-secondary > img" ).animate({
        opacity: 0.5,
	    height: "5.9%",
	    width: "1.8%",    
	    marginLeft: "10.5%",
	    marginTop: "4.4%", 
             
        }, 1, function() {
        // Animation complete.
       
      }); 
  });     
  $( ".clip-container-left > img" ).animate({
        opacity: 0.5,
	    height: "5.9%",
	    width: "1.8%",    
	    marginLeft: "10.5%",
	    marginTop: "4.4%",
    }, 400, function() {
    // Animation complete.
    $( ".clip-container-left > img" ).animate({
        opacity: 1,
	    height: "7.9%",
	    width: "2.4%",    
	    marginLeft: "15.4%",
	    marginTop: "1.9%",
        }, 1, function() {
        // Animation complete.

      }); 
  });  
  $( ".clip-container-center > img" ).animate({
        opacity: 1,
	    height: "7.9%",
	    width: "2.4%",    
	    marginLeft: "15.4%",
	    marginTop: "1.9%",
    }, 400, function() {
    // Animation complete.
    $( ".clip-container-center > img" ).animate({
        opacity: 1,
	    height: "11%",
	    width: "3%",    
	    marginLeft: "25.4%",
	    marginTop: "-1%",
        }, 1, function() {
        // Animation complete.

      }); 
  });  
  $( ".clip-container-right > img" ).animate({
        opacity: 1,
	    height: "11%",
	    width: "3%",    
	    marginLeft: "25.4%",
	    marginTop: "-1%",
    }, 400, function() {
    // Animation complete.
    $( ".clip-container-right > img" ).animate({
        opacity: 0.0,
	    height: "7.9%",
	    width: "2.4%",    
	    marginLeft: "42.4%",
	    marginTop: "1.9%",

        }, 1, function() {
        // Animation complete.

      }); 
  });      

}


function moveSubmitGenre(elem){
	var urlTo = '/tapetegris.jpg';

	$(elem).css("background-image", "url("+ urlTo +")"); 
/*
    var inputs_gen = $( "input[name='new_genre']" );  
    $( inputs_gen ).each(function() {
        $( this ).remove();
    });
    var id_genre = elem.id;
    $("#"+id_genre ).append('<input type="hidden" name="new_genre" value="'+elem.id+'"/>');
    $( "#main-form" ).submit();
  
*/
}

function drawPieSlice(ctx,centerX, centerY, radius, startAngle, endAngle, color ){

    ctx.fillStyle = color;
 
    ctx.beginPath();
 
    ctx.moveTo(centerX,centerY);
 
    ctx.arc(centerX, centerY, radius, startAngle, endAngle);
 
    ctx.closePath();
 
    ctx.fill();
}

function paintCircleArea(num){
    var c = document.getElementById("grafico1");
    var ctx = c.getContext("2d");
    ctx.beginPath();
    ctx.arc(250, 140, 120, 0, 2 * Math.PI);
    //ctx.moveTo(250, 140);
    //ctx.lineTo(370, 140);
    ctx.stroke();
}

function despliegaBlockCanvas(nombre, colapsable1=null, colapsable2=null){
	var more = $('#icon-plus_'+nombre).css('display');

	if(more == 'block'){
		$('#icon-plus_'+nombre).hide();
		$('#icon-minus_'+nombre).show();

	$('#'+nombre+'_section').css('display', 'flex');
		
		$('#collapsible-container_'+nombre).animate({
		        opacity: 1,    
		        height: "400px",
		        width: "70%",
		    }, 800, function() {
		    // Animation complete.
		  }); 
		if(colapsable1 != null){
			$('#collapsible-container_'+colapsable1).animate({
		        opacity: 0.6,    
		        height: "35px",
		    }, 800, function() {
		    // Animation complete.
		 	$('#'+colapsable1+'_section').hide();
		 	$('#icon-plus_'+colapsable1).show();
		 	$('#icon-minus_'+colapsable1).hide();
		  });			
		}
		if(colapsable2 != null){
			$('#collapsible-container_'+colapsable2).animate({
		        opacity: 0.6,    
		        height: "35px",
		    }, 800, function() {
		    // Animation complete.
		 	$('#'+colapsable2+'_section').hide();
		 	$('#icon-plus_'+colapsable2).show();
		 	$('#icon-minus_'+colapsable2).hide();
		  });			
		} 		
	}
	if(more == 'none'){
		$('#icon-plus_'+nombre).show();
		$('#icon-minus_'+nombre).hide();
		$('#collapsible-container_'+nombre).animate({
		        opacity: 0.6,    
		        height: "35px",
		    }, 800, function() {
		    // Animation complete.
		 	$('#'+nombre+'_section').hide();
		  }); 

	}		
}

function despliegaBlockLista(nombre, colapsable1=null, colapsable2=null){
	var more = $('#icon-plus_'+nombre).css('display');
	var less = $('#icon-minus_'+nombre).css('display');
	var content = $('#'+nombre).css('display');
	$('#'+nombre+'_section').css('margin-left' , '30px');
	if(more == 'block'){
		$('#icon-plus_'+nombre).hide();
		$('#icon-minus_'+nombre).show();
		$('#'+nombre+'_section').css('display', 'block');
		$('#collapsible-container_'+nombre).animate({
		        opacity: 1,    
		        height: "400px",
		        width: "70%",
		    }, 800, function() {
		    // Animation complete.
		  }); 
		if(colapsable1 != null){
			$('#collapsible-container_'+colapsable1).animate({
		        opacity: 0.6,    
		        height: "35px",
		    }, 800, function() {
		    // Animation complete.
		 	$('#'+colapsable1+'_section').hide();
		 	$('#icon-plus_'+colapsable1).show();
		 	$('#icon-minus_'+colapsable1).hide();
		  });			
		}
		if(colapsable2 != null){
			$('#collapsible-container_'+colapsable2).animate({
		        opacity: 0.6,    
		        height: "35px",
		    }, 800, function() {
		    // Animation complete.
		 	$('#'+colapsable2+'_section').hide();
		 	$('#icon-plus_'+colapsable2).show();
		 	$('#icon-minus_'+colapsable2).hide();
		  });			
		} 		  		
	}
	if(more == 'none'){
		$('#icon-plus_'+nombre).show();
		$('#icon-minus_'+nombre).hide();
		$('#collapsible-container_'+nombre).animate({
		        opacity: 0.6,    
		        height: "35px",
		    }, 800, function() {
		    // Animation complete.
		 	$('#'+nombre+'_section').hide();
		  }); 	
			
	}		
}

function despliegaRadioSearch(){
	var more = $('#icon-plus_adv_search').css('display');
	var less = $('#icon-minus_adv_search').css('display');

	if(more == 'block'){
		$('#icon-plus_adv_search').hide();
		$('#icon-minus_adv_search').show();
		
		$('#advanced_search_radio').css('display', 'block');
		$('#collapsible-container_radio').animate({
		        opacity: 1,    
		        height: "450px",
		        width: "70%",
		    }, 800, function() {
		    
		  });
		$('#collapsible-container_input_search').animate({
		        opacity: 0.6,    
		        height: "35px",
		    }, 400, function() {
		    // Animation complete.
		    $('#advanced_search_input').css('display', 'none');
		    $('#icon-plus_input_search').show();
			$('#icon-minus_input_search').hide();
			$('#search_actor_input_id').val('');


			
		  });		
		 
	}
	if(more == 'none'){
		$('#icon-plus_adv_search').show();
		$('#icon-minus_adv_search').hide();
		$('#collapsible-container_radio').animate({
		        opacity: 0.6,    
		        height: "35px",
		        
		    }, 800, function() {
		    // Animation complete.
		    $('#advanced_search_radio').css('display', 'none');
		    $('#advanced_search_input').css('display', 'none');
		    $('.country_filter_search').removeAttr('checked')
		    

		  });	
	}		
}

function despliegaInput(elem){
	var more = $('#icon-plus_input_'+elem).css('display');
	var less = $('#icon-minus_input_'+elem).css('display');

	if(more == 'block'){
		$('#icon-plus_input_'+elem).hide();
		$('#icon-minus_input_'+elem).show();
		
		$('#advanced_'+elem+'_input').css('display', 'block');

		$('#collapsible-container_input_'+elem).animate({
		        opacity: 1,    
		        height: "150px",
		        width: "70%",
		    }, 400, function() {
		    // Animation complete.
		  });
		$('#collapsible-container_radio').animate({
		        opacity: 0.6,    
		        height: "35px",
		    }, 800, function() {
		    // Animation complete.
		    $('#advanced_'+elem+'_radio').css('display', 'none');
		    $('#icon-plus_adv_'+elem).show();
			$('#icon-minus_adv_'+elem).hide();
			$('.country_filter_'+elem).removeAttr('checked');
		  });		
		 
	}
	if(more == 'none'){
		$('#icon-plus_input_'+elem).show();
		$('#icon-minus_input_'+elem).hide();
		$('#collapsible-container_input_'+elem).animate({
		        opacity: 0.6,    
		        height: "35px",
		        
		    }, 400, function() {
		    // Animation complete.
		    $('#advanced_'+elem+'_input').css('display', 'none');
		    $('#'+elem+'_actor_input_id').val('');

		  });	
	}		
}

function despliegaInputOneSection(elem){
	var more = $('#icon-plus_input_'+elem).css('display');
	var less = $('#icon-minus_input_'+elem).css('display');

	if(more == 'block'){
		$('#icon-plus_input_'+elem).hide();
		$('#icon-minus_input_'+elem).show();
		
		$('#'+elem+'_input').css('display', 'block');
		$('#'+elem+'_top_input').css('display', 'block');

		$('#collapsible-container_input_'+elem).animate({
		        opacity: 1,    
		        height: "300px",
		        width: "70%",
		    }, 400, function() {
		    // Animation complete.
		  });	
		 
	}
	if(more == 'none'){
		$('#icon-plus_input_'+elem).show();
		$('#icon-minus_input_'+elem).hide();
		$('#collapsible-container_input_'+elem).animate({
		        opacity: 0.6,    
		        height: "35px",
		        
		    }, 400, function() {
		    // Animation complete.
		    $('#'+elem+'_top_input').css('display', 'none');
		    $('#'+elem+'_input').css('display', 'none');
		    $('#'+elem+'_input_id').val('');

		  });	
	}		
}

function simulaClick(){
	$('.icon-plus').click();
}