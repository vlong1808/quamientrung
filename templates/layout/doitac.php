<?php
	
	$d->reset();
	$sql="select id,ten$lang as ten,link,photo from #_slider where hienthi=1 and type='doitac' order by stt,id desc";
	$d->query($sql);
	$doitac=$d->result_array();

?>
<link href="css/_doitac.css" type="text/css" rel="stylesheet" />
<div class="doitac">
    <div class="content-doitac chay_i">
	<?php for($i=0,$count_doitac=count($doitac);$i<$count_doitac;$i++){ ?>
        <div>
            <div class="item-doitac">
        	   <a href="<?=$doitac[$i]['link']?>" title="<?=$doitac[$i]['link']?>" target="_blank"><img src="<?=_upload_hinhanh_l.$doitac[$i]['photo']?>" alt="<?php if($doitac[$i]['ten']!='') echo $doitac[$i]['ten'];else echo $company['ten']?>" /></a>
            </div>
        </div>
    <?php } ?>
    </div>
</div>
