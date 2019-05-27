<script type="text/javascript">
    $(document).ready(function() {
        $('.mota').hide();
        $('.click_show').click(function()
        {
           var id = $(this).attr('name');
           var name_id = '#mota_'+id;
           $(name_id).toggle(1000);
        });
    });
</script>
<style>
    div.mota
    {
        width: 90%;
        margin-left: 5%;
    }
    div.box_news h3 a i
    {
        padding: 0px 5px;
    }
</style>
<div class="tieude_giua"><div><?=$title_cat?></div><span></span></div>
<div class="box_container">
<div class="wap_box_new">
 	<?php for($i = 0, $count_tintuc = count($tintuc); $i < $count_tintuc; $i++){ ?>
        <div class="box_news">      
            <h3><a class="click_show"  name="<?=$tintuc[$i]['id']?>" title="<?=$tintuc[$i]['ten']?>"><i class="fa fa-plus" aria-hidden="true"></i><?=$tintuc[$i]['ten']?></a></h3>
            <div  class="mota" id="mota_<?=$tintuc[$i]['id']?>"><?=$tintuc[$i]['noidung']?></div>  
            <div class="clear"></div>         
        </div><!---END .box_new--> 
    <?php } ?>
</div><!---END .wap_box_new-->
<div class="clear"></div>
<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
</div><!---END .box_container-->