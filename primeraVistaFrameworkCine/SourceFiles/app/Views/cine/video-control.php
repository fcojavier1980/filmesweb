
<iframe style="display: none" class="videotube" id="videotube_iframe" src="" frameborder="0" allow="accelerometer; autoplay;" allowfullscreen rel="noreferrer"></iframe>
<!-- This img is for ok.ru old -->
<img id="play_overlay_img" style="cursor:pointer; display: none" onclick="redirect_film(this);" src="<?= BASEPATH ?>SourceFiles/resources/images/play_overlay.png" />
<input type="hidden" id="url_okru_old" value="<?= $display['films'][3]['videourl']?>"/>
<img src="" id="fotograma_id" style="display: none"/>
<!-- This iframe is for ok.ru embed, dailymotion, drive.google, upstream, gnula y gloria.tv -->
<iframe frameborder="0" width="100%" height="40%" style="display: none;" id="okru_iframe" src="" allowfullscreen></iframe>
<!-- This iframe is for archive.org -->
<video controls="controls" width="100%" height="40%" style="display: none;" preload="none" poster=""><source src="" ></video>
 