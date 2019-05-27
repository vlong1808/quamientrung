<?php
	include ("../ajax/ajax_config.php");	
	include_once "class_paging_ajax.php";
	
	if(isset($_POST["page"]))
    {
		$paging = new paging_ajax();
		$paging->class_pagination = "pagination";
		$paging->class_active = "active";
		$paging->class_inactive = "inactive";
		$paging->class_go_button = "go_button";
		$paging->class_text_total = "total";
		$paging->class_txt_goto = "txt_go_button";
		$paging->per_page = 4; 	
		$paging->page = $_POST["page"];
		$paging->text_sql = "select id,ten,tenkhongdau,photo,thumb,giacu,gia,spbanchay,masp,mota from table_product where hienthi=1 and id_danhmuc=".$_POST["id_danhmuc"]." and noibat=1 and type='sanpham' order by stt asc";
		$product = $paging->GetResult();
		$message = '';
		$paging->data = "".$message."";
    } 
	
	$d->reset();
	$sql = "select id,ten$lang as ten,tenkhongdau,thumb FROM #_product_danhmuc where id='".$_POST['id_danhmuc']."' limit 0,1";		
	$d->query($sql);
	$product_danhmuc5 = $d->fetch_array();
?>
<script type="text/javascript">
	$(document).ready(function(e) {
		$('.size').click(function(){
			$('.size').removeClass('active_size');
			$(this).addClass('active_size');
		});
		$('.mausac').click(function(){
			$('.mausac').removeClass('active_mausac');
			$(this).addClass('active_mausac');
		});
        var id_danhmuc = <?=$_POST['id_danhmuc'] ?>;
		$('button.dathang'+id_danhmuc).click(function(){
				if($('.size').length && $('.active_size').length==false)
				{
					alert('<?=_chonsize?>');
					return false;
				}
				if($('.active_size').length)
				{
					var size = $('.active_size').html();
				}
				else
				{
					var size = '';
				}
				
				if($('.mausac').length && $('.active_mausac').length==false)
				{
					alert('<?=_chonmau?>');
					return false;
				}
				if($('.active_mausac').length)
				{
					var mausac = $('.active_mausac').html();
				}
				else
				{
					var mausac = '';
				}
					var act = "dathang";
					var _seft = $(this);
                    var id = _seft.attr ('name');
                    var nam_sl ='.sl_'+id;
					var soluong = $(nam_sl).val();
                    //alert(soluong);
					if(soluong>0)
					{
						$.ajax({
							type:'post',
							url:'ajax/cart.php',
							dataType:'json',
							data:{id:id,size:size,mausac:mausac,soluong:soluong,act:act},
							beforeSend: function() {
								$('.thongbao').html('<p><img src="images/loader_p.gif"></p>');  
							},
							error: function(){
								add_popup('<?=_hethongloi?>');
							},
							success:function(kq){
								add_popup2(kq.thongbao);
								$('#info_cart').html(kq.thongbao);
                                //alert(kq.sl);
								console.log(kq);
							}
						});
					}
					else
					{
						alert('<?=_nhapsoluong?>');
					}
			return false;
		});
	});
</script>
<!--Mua hàng-->
    <?=$paging->Load2(); ?>
<ul class="content-item">
<?php for($i=0,$count_product=count($product);$i<$count_product;$i++){	?>
    <li class="item">
            <a href="<?=$product[$i]['tenkhongdau']?>-<?=$product[$i]['id']?>.html" title="<?=$product[$i]['ten']?>" itemprop="name"><img style="width: 100%;" src="<?php if($product[$i]['thumb']!=NULL) echo _upload_sanpham_l.$product[$i]['thumb']; else echo 'images/noimage.png';?>" alt="<?=$product[$i]['ten']?>" /></a>
            <div class="tomtat">
                <h3 class="sp_name"><a href="<?=$product[$i]['tenkhongdau']?>-<?=$product[$i]['id']?>.html" title="<?=$product[$i]['ten']?>" itemprop="name"><?=$product[$i]['ten']?></a></h3>
                     <?php
                        if(!empty($product[$i]['giacu']))
                        {
                            ?>
                                <h4><span style="text-decoration: line-through;"><?=number_format($product[$i]['gia'])?> vnd </span><span
                                style="color:red;"><?=number_format($product[$i]['giacu'])?> vnd</span></h4>
                            <?php
                        }
                        else
                        {
                            ?>
                                 <h4><?=number_format($product[$i]['gia'])?> vnd</h4>
                            <?php
                        }
                    ?> 
            </div>
      
    </li><!---END .item-->  
<?php } ?>
</ul>
<div class="clear"></div>
<style>
    .p-actived, .p-active
    {
        border: none!important;
        background: none!important;
        color: #ccc!important;
        
    }
    .pagination-bottom
    {
        border-top: 1px solid #ccc;
        margin: 0px!important;
        padding: 10px 0px;
    }
    .prev-click, .next-click
    {
        border: none!important;
        padding: 5px;
    }
    .page-top
    {
        position: absolute;
        top: -52px;
        right: 5px;
        z-index: 999;
    }
</style>
<?=$paging->Load(); ?>