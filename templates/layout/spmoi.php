<?php
	
	$d->reset();
	$sql="select id,ten$lang as ten,tenkhongdau,thumb from #_product where hienthi=1 and type='sanpham' and spmoi=1 order by stt,id desc";
	$d->query($sql);
	$product2=$d->result_array();

?>
<div class="tieude_giua2"><div>Sản phẩm mới</div><span></span></div>
<div class="wap_item chay_i">
<?php for($i=0,$count_product2=count($product2);$i<$count_product2;$i++){	?>
	<div>
        <div class="item zoom_hinh hover_sang1 item_i" itemscope itemtype="http://schema.org/product2">
                <p class="sp_img"><a href="<?=$product2[$i]['tenkhongdau']?>-<?=$product2[$i]['id']?>.html" title="<?=$product2[$i]['ten']?>">
                <img src="<?php if($product2[$i]['thumb']!=NULL) echo _upload_sanpham_l.$product2[$i]['thumb']; else echo 'images/noimage.png';?>" alt="<?=$product2[$i]['ten']?>" itemprop="image" /></a></p>
                <h3 class="sp_name"><a href="<?=$product2[$i]['tenkhongdau']?>-<?=$product2[$i]['id']?>.html" title="<?=$product2[$i]['ten']?>" itemprop="name"><?=$product2[$i]['ten']?></a></h3>
        </div><!---END .item-->
    </div>
<?php } ?>
</div><!---END .wap_item-->
