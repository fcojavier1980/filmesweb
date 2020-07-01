            <form id="main-form" action="<?= INDEXPATH ?>index.php?r=cine/index" method="post" style="margin-bottom: 0px;">
                <div class="cine-sub-header bm_header">
                    <div id="genre_espa" class="genre_tab <?= $current_tab == 'Spaguetti Western' ? 'tab_genre_focus' : 'tab_genre_normal' ?>" onclick="submitGenre(this)">
                    Spaguetti W.
                    </div>           
                    <div id="genre_west" class="genre_tab <?= $current_tab == 'Western' ? 'tab_genre_focus' : 'tab_genre_normal' ?>" onclick="submitGenre(this)">
                        Western
                    </div>
                    <div id="genre_poli" class="genre_tab <?= $current_tab == 'Policiaco' ? 'tab_genre_focus' : 'tab_genre_normal' ?>" onclick="submitGenre(this)">
                        Policiaco/Thriller
                    </div>
                    <div id="genre_aven" class="genre_tab <?= $current_tab == 'Aventuras' ? 'tab_genre_focus' : 'tab_genre_normal' ?>" onclick="submitGenre(this)">
                        Acción/Aventura/Sci-fi
                    </div>
                    <div id="genre_drama" class="genre_tab <?= $current_tab == 'Drama' ? 'tab_genre_focus' : 'tab_genre_normal' ?>" onclick="submitGenre(this)">
                        Drama
                    </div>   
                    <div id="genre_otros" class="genre_tab <?= $current_tab == 'Otros' ? 'tab_genre_focus' : 'tab_genre_normal' ?>" onclick="submitGenre(this)">Comedia/Musical/Otros
                    </div>                                
                </div>
            </form>