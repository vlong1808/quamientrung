<link href="css/_product.css" type="text/css" rel="stylesheet" />
<script type="text/javascript">
    function loadData(page,id_tab,id_danhmuc){
        $.ajax({
            type: "POST",
            url: "paging_ajax/ajax_paging.php",
            data: {page:page,id_danhmuc:id_danhmuc},
            success: function(msg)
            {
                    $("#loadbody").fadeOut("fast");
                    $(id_tab).html(msg);
                      $(id_tab+" .pagination li.active").click(function(){
                        var pager = $(this).attr("p");
                        var id_danhmucr = $(this).parents().parents().parents().attr("data-rel");
                        
                        loadData(pager,".load_page_"+id_danhmucr,id_danhmucr);
                    });  
            }
        });
    }
</script>
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
		$('button.dathangkm').click(function(){
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
                    var nam_sl ='.sl_km'+id;
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

<?php for ($i=0; $i < count($product_danhmuc2); $i++) { ?>
<div class="content-category">
    <div class="tieude_giua"><div><?=$product_danhmuc2[$i]['ten']?></div><a href="san-pham/<?=$product_danhmuc2[$i]['tenkhongdau']?>-<?=$product_danhmuc2[$i]['id']?>">Xem tất cả</i></a></div>
    <div class="wap_item">
        <div class="load_page_<?=$product_danhmuc2[$i]['id']?>" data-rel="<?=$product_danhmuc2[$i]['id']?>">
            <script type="text/javascript">        	
                $(document).ready(function() {
                    loadData(1,".load_page_<?=$product_danhmuc2[$i]['id']?>","<?=$product_danhmuc2[$i]['id']?>"); 
                });
            </script>
        </div>
    </div>
</div>
<?php } ?>

