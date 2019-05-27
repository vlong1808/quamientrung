
<div class="box_container">
    <div class="content">   
        <?=$tintuc_detail['noidung']?>   
        <?php if($type=='hoso') { ?>
            <p class="taifile"><a target="_bank" href="<?=_upload_files_l.$tintuc_detail['file']?>"><i class="fa fa-download" aria-hidden="true"></i> Tải file hồ sơ năng lực</a> <span>(<?=$tintuc_detail['file']?>)</span></p>
        <?php }?>
        <div class="addthis_native_toolbox"><b><?=_chiase?></b></div>
    </div><!--.content-->
</div><!--.box_container-->
         