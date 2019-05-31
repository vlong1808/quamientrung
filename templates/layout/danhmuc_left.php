<div class="title-danhmuc">
    <h3><i class="fa fa-bars" aria-hidden="true"></i><?=_danhmucsanpham?></h3>
</div>
<ul class="list-danhmuc">
    <?php for($i = 0; $i<count($danhmuc_product);$i++) { ?>
        <li><i class="fa fa-play-circle-o click_show_dm" data="<?=$danhmuc_product[$i]['id']?>" aria-hidden="true"></i><a class="link_list <?php if(($i==0 && $source=='index')||($source=='product' && $danhmuc_product[$i]['id']==$id_danhmuc)){?>actived<?php }?>" id="actived_<?=$danhmuc_product[$i]['id']?>" href="san-pham/<?=$danhmuc_product[$i]['tenkhongdau']?>-<?=$danhmuc_product[$i]['id']?>"><?=$danhmuc_product[$i]['ten']?></a>
            <?php $list_product = get_items_list($danhmuc_product[$i]['id']) ;
                if(count($list_product) > 0) { ?>
                <ul class="list-item <?php if(($i==0 && $source=='index')||($source=='product' && $danhmuc_product[$i]['id']==$id_danhmuc)){?>show<?php }else{?>hide<?php }?>" id="show_<?=$danhmuc_product[$i]['id']?>">
                <?php   for($j=0;$j<count($list_product);$j++) { ?>
                        <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="san-pham/<?=$list_product[$j]['tenkhongdau']?>-<?=$list_product[$j]['id']?>/"><?=$list_product[$j]['ten']?></a></li>       
                <?php } ?>
                </ul>
            <?php } ?>
            
        </li>
    <?php } ?>
</ul>
<script type="text/javascript">
    $(document).ready(function(){
          $('.click_show_dm').click(function(){
                var id = $(this).attr('data');
                var name_id = '#show_'+id;
                var name_actived = '#actived_'+id;
                $('.link_list').removeClass('actived');
                //$('.list-item').removeClass('show');
                $(name_actived).addClass('actived');
                $(name_id).toggle(200);
          });
    });
</script>
<ul class="list-danhmuc">
        <?php for($i=0;$i<count($product_cat);$i++) { ?>
            <li><i class="fa fa-play-circle-o" aria-hidden="true"></i><a href="nha-san-xuat.html&id=<?=$product_cat[$i]['id']?>"><?=$product_cat[$i]['ten']?></a></li>
        <?php } ?>
</ul>