<div class="box_container">
<div class="wap_box_new">
 	<?php for($i = 0, $count_tintuc = count($tintuc); $i < $count_tintuc; $i++){ ?>
        <div class="box_news">
            <a href="<?=$com?>/<?=$tintuc[$i]['tenkhongdau']?>-<?=$tintuc[$i]['id']?>.html" title="<?=$tintuc[$i]['ten']?>"><img src="<?php if($tintuc[$i]['thumb']!=NULL)echo _upload_tintuc_l.$tintuc[$i]['thumb'];else echo 'images/noimage.png';?>" alt="<?=$tintuc[$i]['ten']?>" /></a>      
            <h3><a href="<?=$com?>/<?=$tintuc[$i]['tenkhongdau']?>-<?=$tintuc[$i]['id']?>.html" title="<?=$tintuc[$i]['ten']?>"><?=$tintuc[$i]['ten']?></a></h3>
            <div class="mota"><?=$tintuc[$i]['mota']?></div>  
            <div class="clear"></div>         
        </div><!---END .box_new--> 
    <?php } ?>
</div><!---END .wap_box_new-->
<div class="clear"></div>
<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
</div><!---END .box_container-->