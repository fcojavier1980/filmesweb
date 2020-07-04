            <form id="main-form" action="<?= INDEXPATH ?>index.php?r=cine/index" method="post" style="margin-bottom: 0px;">
                <div class="cine-sub-header bm_header">
                    <div id="genre_espa" class="genre_tab <?= $current_tab == 'Spaguetti Western' ? 'tab_genre_focus' : 'tab_genre_normal' ?>" onclick="slideTabs(this)">
                    Spaguetti W.
                    </div>           
                    <div id="genre_west" class="genre_tab <?= $current_tab == 'Western' ? 'tab_genre_focus' : 'tab_genre_normal' ?>" onclick="slideTabs(this)">
                        Western
                    </div>
                    <div id="genre_poli" class="genre_tab <?= $current_tab == 'Policiaco' ? 'tab_genre_focus' : 'tab_genre_normal' ?>" onclick="slideTabs(this)">
                        Policiaco/Thriller
                    </div>
                    <div id="genre_aven" class="genre_tab <?= $current_tab == 'Aventuras' ? 'tab_genre_focus' : 'tab_genre_normal' ?>" onclick="slideTabs(this)">
                        Acción/Aventura/Sci-fi
                    </div>
                    <div id="genre_drama" class="genre_tab <?= $current_tab == 'Drama' ? 'tab_genre_focus' : 'tab_genre_normal' ?>" onclick="slideTabs(this)">
                        Drama
                    </div>   
                    <div id="genre_otros" class="genre_tab <?= $current_tab == 'Otros' ? 'tab_genre_focus' : 'tab_genre_normal' ?>" onclick="slideTabs(this)">Comedia/Musical/Otros
                    </div>                                
                </div>
            </form>
<script>
    function slideTabs(elem){
    console.log(elem);
    //var activa = $(elem).addClass( "tab_genre_disfocus" );
    //$('.tab_genre_focus')
  
  $( ".tab_genre_focus" ).animate({
        opacity: 0.7,
    }, 600, function() {
    // Animation complete.
    $(elem).removeClass( "tab_genre_focus" );
    $(elem).addClass( "tab_genre_normal" );

  });   

  $( elem ).animate({
        opacity: 1,
    }, 600, function() {
    // Animation complete.
    $(elem).removeClass( "tab_genre_normal" );
    $(elem).addClass( "tab_genre_focus" );
    submitGenre(elem)
  });    
  ;
}

</script>            