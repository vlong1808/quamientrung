<?php
	
	$d->reset();
	$sql="select id,ten$lang as ten,tenkhongdau,thumb from #_news where hienthi=1 and type='duan' and noibat=1 order by stt,id desc";
	$d->query($sql);
	$duan=$d->result_array();

?>
    <!-- tin moi --!>
    <div class="new_list">
        <div class="tieude_giua"><div>TIN TỨC</div><span></span><a href="du-an.html"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></div>
        <div class="box_container">
        <div class="wap_box_new">
         <?php for($i = 0, $count_tintuc = count($tinmoi); $i < $count_tintuc; $i++){ ?>
                <div class="box_news">
                    <a href="<?=$com?>/<?=$tinmoi[$i]['tenkhongdau']?>-<?=$tinmoi[$i]['id']?>.html" title="<?=$tinmoi[$i]['ten']?>"><img src="<?php if($tinmoi[$i]['thumb']!=NULL)echo _upload_tintuc_l.$tinmoi[$i]['thumb'];else echo 'images/noimage.png';?>" alt="<?=$tinmoi[$i]['ten']?>" /></a>      
                    <h3><a href="<?=$com?>/<?=$tinmoi[$i]['tenkhongdau']?>-<?=$tinmoi[$i]['id']?>.html" title="<?=$tinmoi[$i]['ten']?>"><?=$tinmoi[$i]['ten']?></a></h3>
                    <div class="mota"><?=$tinmoi[$i]['mota']?></div>  
                    <div class="clear"></div>         
                </div><!---END .box_new--> 
            <?php } ?>
        </div><!---END .wap_box_new-->
        <div class="clear"></div>
        </div><!---END .box_container-->
    </div>
    <!-- end tin moi --!>
    <div class="hotromuahang">
        <div class="tieude_giua" style="margin-top:20px;"><div>Công trình thi công</div><a href="du-an.html"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></div>
            <div class="wap_item chay_i">
                <?php for($i=0,$count_duan=count($duan);$i<$count_duan;$i++){	?>
                	<div>
                        <div class="item zoom_hinh hover_sang1 item_i" itemscope itemtype="http://schema.org/duan">
                                <p class="sp_img"><a href="du-an/<?=$duan[$i]['tenkhongdau']?>-<?=$duan[$i]['id']?>.html" title="<?=$duan[$i]['ten']?>">
                                <img src="<?php if($duan[$i]['thumb']!=NULL) echo _upload_tintuc_l.$duan[$i]['thumb']; else echo 'images/noimage.png';?>" alt="<?=$duan[$i]['ten']?>" itemprop="image" /></a></p>
                                <h3 class="sp_name"><a href="du-an/<?=$duan[$i]['tenkhongdau']?>-<?=$duan[$i]['id']?>.html" title="<?=$duan[$i]['ten']?>" itemprop="name"><?=$duan[$i]['ten']?></a></h3>
                        </div><!---END .item-->
                    </div>
                <?php } ?>
            </div><!---END .wap_item-->
    </div>
    

