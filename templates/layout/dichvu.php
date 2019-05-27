<?php
    $d->reset();
	$sql_slider = "select ten$lang as ten, noidung$lang as noidung, thumb from #_news where hienthi=1 and type='dichvu' order by stt,id desc limit 0,3";
	$d->query($sql_slider);
	$dichvu=$d->result_array();
?>

<link href="css/_dichvu.css" type="text/css" rel="stylesheet" />
<div class="hotro">
     <ul>
            <?php for($i = 0;$i<count($dichvu);$i++) {?>
            <li class="item-hotro item-hotro-<?=$i+1?>">
                <div class="item-content">
                    <p class="img_hotro"><img src="<?=_upload_tintuc_l.$dichvu[$i]['thumb']?>" /></p>
                    <div class="info-hotro">
                         <h3><?=$dichvu[$i]['ten']?></h3>
                         <p><?=$dichvu[$i]['noidung']?></p>
                    </div>
                    <div class="clear"></div>
                </div>
                
             </li>
        <?php } ?>
        
         
         <div class="clear"></div>
     </ul>
</div>