<?php
	include ("../ajax/ajax_config.php");	
	//include_once "class_paging_ajax.php";
	
	/*if(isset($_POST["page"]))
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
    } */
    
    $d->reset();
	$sql ="select id,ten,tenkhongdau,photo,thumb,giacu,gia,spbanchay,masp,mota from table_product where hienthi=1 and id_danhmuc=".$_POST["id_danhmuc"]." and noibat=1 and type='sanpham' order by stt asc";
	$d->query($sql);
	$product = $d->result_array();
    
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
 <script type="text/javascript">
    $(document).ready(function(){
      $('.chay_i<?=$product_danhmuc5['id']?>').slick({
		  	//vertical:true,Chay dọc
			//fade: true,//Hiệu ứng fade của slider
			//slidesPerRow: 2,
			//cssEase: 'linear',//Chạy đều
		  	//lazyLoad: 'progressive',
        	infinite: true,//Lặp lại
			accessibility:true,
		  	slidesToShow: 4,    //Số item hiển thị
		  	slidesToScroll: 4, //Số item cuộn khi chạy
		  	autoplay:true,  //Tự động chạy
			autoplaySpeed:6000,  //Tốc độ chạy
			speed:4000,//Tốc độ chuyển slider
			arrows:false, //Hiển thị mũi tên
			centerMode:false,  //item nằm giữa
			dots:false,  //Hiển thị dấu chấm
			draggable:true,  //Kích hoạt tính năng kéo chuột
			pauseOnHover:true,
			
			responsive: [
				{
				  breakpoint: 1025,
				  settings: {
					slidesToShow: 4,
					slidesToScroll: 1,
					dots: false
				  }
				},
				{
				  breakpoint: 801,
				  settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
					dots: false
				  }
				},
				{
				  breakpoint: 480,
				  settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					dots: false
				  }
				},
				{
				  breakpoint: 361,
				  settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					dots: false
				  }
				}
				,
				{
				  breakpoint: 321,
				  settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					dots: false
				  }
				}
		  ]

      });
    });
</script>   
<ul class="content-item chay_i<?=$product_danhmuc5['id']?>">
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
