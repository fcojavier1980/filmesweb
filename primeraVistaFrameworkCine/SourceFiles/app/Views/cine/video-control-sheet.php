<?php 
if(strpos($elemento['videourl'], 'youtube')){?>
    <iframe class="videotube" id="videotube<?php echo $cont ?>" src="" frameborder="0" allow="accelerometer; autoplay;" allowfullscreen rel="noreferrer"></iframe>
<?php } ?>
<?php 
if(strpos($elemento['videourl'], 'ok.ru/video/')){ ?>
    <img id="play_overlay_img" style="cursor:pointer;" onclick="redirect_film(this);" src="<?= BASEPATH ?>SourceFiles/resources/images/play_overlay.png" />
    <input type="hidden" value="<?= $elemento['videourl']?>"/>
    <img src="" id="fotograma_id<?php echo $cont ?>"/>
<?php }
if(strpos($elemento['videourl'], 'ok.ru/videoembed/')){ ?>
    <iframe frameborder="0" width="100%" height="40%" src="<?php echo $elemento['videourl'] ?>" allowfullscreen></iframe>
<?php } 
if(strpos($elemento['videourl'], 'dailymotion') || strpos($elemento['videourl'], 'drive.google') || strpos($elemento['videourl'], 'upstream') || strpos($elemento['videourl'], 'gnula')) {?>
    <iframe frameborder="0" width="100%" height="40%" src="<?php echo $elemento['videourl'] ?>" allowfullscreen></iframe>
<?php } 
if(strpos($elemento['videourl'], 'mega')) {?>
    <iframe width="100%" height="40%" frameborder="0" src="<?php echo $elemento['videourl'] ?>" allowfullscreen ></iframe>  
 <?php } 
if(strpos($elemento['videourl'], 'archive.org')) {?>
    <video controls="controls" width="100%" height="40%" preload="none" poster="<?= BASEPATH ?>SourceFiles/resources/images/<?= $elemento['fotograma']?>"><source src="<?php echo $elemento['videourl'] ?>" ></video>
<?php } 
if(strpos($elemento['videourl'], 'peertube')) {?>
    <video controls="controls" width="100%" height="40%" preload="none" poster="<?= BASEPATH ?>SourceFiles/resources/images/<?= $elemento['fotograma']?>"><source src="<?php echo $elemento['videourl'] ?>"></video>
<?php } 
if(strpos($elemento['videourl'], 'gloria.tv')) {?>
    <iframe width="100%" height="40%" frameborder="0" src="<?php echo $elemento['videourl'] ?>" allowfullscreen ></iframe>  
 <?php }?> 
 