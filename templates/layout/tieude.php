<?php
    $d->reset();
	$sql_banner = "select photo as photo from #_background where type='tieude' limit 0,1";
	$d->query($sql_banner);
	$row_tieude = $d->fetch_array();
?>
<link href="css/_tieude.css" type="text/css" rel="stylesheet" />
<div class="title">
    <div class="title-content">
        <div class="title-img">
            <img src="<?=_upload_hinhanh_l.$row_tieude['photo']?>" />
        </div>
        <div class="title-info">
            <h3><?=$title_cat?></h3>
        </div>
        <div class="site-maps">
            <?=$site_map?>
        
        </div>
    </div>
</div>