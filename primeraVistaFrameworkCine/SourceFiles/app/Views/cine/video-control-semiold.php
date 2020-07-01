<?php 
if(strpos($display['films'][3]['videourl'], 'youtube')){?>
    <iframe class="videotube" id="videotube<?php echo $cont ?>" src="" frameborder="0" allow="accelerometer; autoplay;" allowfullscreen rel="noreferrer"></iframe>
<?php } ?>
<?php 
if(strpos($display['films'][3]['videourl'], 'ok.ru')){ ?>
    <img id="play_overlay_img" style="cursor:pointer;" onclick="redirect_film(this);" src="<?= BASEPATH ?>SourceFiles/resources/images/play_overlay.png" />
    <input type="hidden" value="<?= $display['films'][3]['videourl']?>"/>
    <img src="" id="fotograma_id<?php echo $cont ?>"/>
<?php } 
if(strpos($display['films'][3]['videourl'], 'dailymotion') || strpos($display['films'][3]['videourl'], 'drive.google') || strpos($display['films'][3]['videourl'], 'upstream') || strpos($display['films'][3]['videourl'], 'gnula')) {?>
    <iframe frameborder="0" width="100%" height="40%" src="<?php echo $display['films'][3]['videourl'] ?>" allowfullscreen></iframe>
<?php } 
if(strpos($display['films'][3]['videourl'], 'mega')) {?>
    <iframe width="100%" height="40%" frameborder="0" src="<?php echo $display['films'][3]['videourl'] ?>" allowfullscreen ></iframe>  
 <?php } 
if(strpos($display['films'][3]['videourl'], 'archive.org')) {?>
    <video controls="controls" width="100%" height="40%" preload="none" poster="<?= BASEPATH ?>SourceFiles/resources/images/<?= $display['films'][3]['fotograma']?>"><source src="<?php echo $display['films'][3]['videourl'] ?>" ></video>
<?php } 
if(strpos($display['films'][3]['videourl'], 'peertube')) {?>
    <video controls="controls" width="100%" height="40%" preload="none" poster="<?= BASEPATH ?>SourceFiles/resources/images/<?= $display['films'][3]['fotograma']?>"><source src="<?php echo $display['films'][3]['videourl'] ?>"></video>
<?php } 
if(strpos($display['films'][3]['videourl'], 'gloria.tv')) {?>
    <video controls="controls" width="100%" height="40%" preload="none" poster="<?= BASEPATH ?>SourceFiles/resources/images/<?= $display['films'][3]['fotograma']?>"><source src="<?php echo $display['films'][3]['videourl'] ?>"></video>
 <?php } 
 if(strpos($display['films'][3]['videourl'], 'peliculasgolden')) {?>
        <iframe width="100%" height="40%" frameborder="0" src="<?php echo $display['films'][3]['videourl'] ?>" allowfullscreen ></iframe>  
 <?php }?> 