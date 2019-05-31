<link href="css/_left_index.css" type="text/css" rel="stylesheet" />
<script type="text/javascript">
    $(document).ready(function(){
      $('#news-new .content-item-news').slick({
		  	lazyLoad: 'ondemand',
        	infinite: false,//Hiển thì 2 mũi tên
			accessibility:true,
			vertical:true,//Chay dọc
		  	slidesToShow: 1,    //Số item hiển thị
		  	slidesToScroll: 1, //Số item cuộn khi chạy
		  	autoplay:true,  //Tự động chạy
			autoplaySpeed:3000,  //Tốc độ chạy
			arrows:false, //Hiển thị mũi tên
			centerMode:false,  //item nằm giữa
			dots:false,  //Hiển thị dấu chấm
			draggable:true,  //Kích hoạt tính năng kéo chuột
			mobileFirst:true
      });
	});
</script>
<div class="suport left-item">
    <div class="suport-content left-item-content">
        <div class="title"><?=_hotrotructuyen?></div>
        <div class="content-item-news">
            <ul>
                <?php for($i=0;$i<count($hotro);$i++) { ?>
                    <li>
                        <div class="item-info">
                            <p class="name-hl"><?=$hotro[$i]['ten']?></p>
                            <p><b><a href="tel:<?=preg_replace('/[^0-9]/','',$hotro[$i]['dienthoai']);?>">Phone/Zalo: <?=$hotro[$i]['dienthoai']?></a></b></p>
                        </div>
                    </li>
                <?php }?>
                    <li><i class="fa fa-envelope-o icon-hotro" aria-hidden="true"></i></i><div class="item-info"><p>Email liên hệ</p><p><b><?=$company['email']?></b></p></div><div class="clear"></div></li>
            </ul>
        </div>
    </div>
 </div>

 <div id="news-new" class="news-new left-item">
    <div class="news-content left-item-content">
        <div class="title"><?=_tinmoi?></div>
        <div class="content-item-news">
            <?php for($i=0;$i<count($tintuc_f);$i++) { ?>
                <div class="item-news">
                    <p class="img-item"><a href="tin-tuc/<?=$tintuc_f[$i]['tenkhongdau']?>-<?=$tintuc_f[$i]['id']?>.html" title="<?=$tintuc_f[$i]['ten']?>" itemprop="name"><img style="width: 100%;" src="<?php if($tintuc_f[$i]['thumb']!=NULL) echo _upload_tintuc_l.$tintuc_f[$i]['thumb']; else echo 'images/noimage.png';?>" alt="<?=$tintuc_f[$i]['ten']?>" /></a></p>
                    <h4><a href="tin-tuc/<?=$tintuc_f[$i]['tenkhongdau']?>-<?=$tintuc_f[$i]['id']?>.html"><?=$tintuc_f[$i]['ten']?></a></h4>
                    <ul>
                        <li><i class="fa fa-calendar" aria-hidden="true"></i> <?=date('d-m-Y',$tintuc_f[$i]['ngaytao'])?></li>
                        <li><i class="fa fa-bar-chart" aria-hidden="true"></i> <?=$tintuc_f[$i]['luotxem']?> lượt xem</li>
                    </ul>
                    <div class="description-item"><?=$tintuc_f[$i]['mota']?></div>
                </div>
            <?php }?>
        </div>
    </div>
 </div>
 <div id="product-new" class="product-new left-item">
    <div class="product-new-content left-item-content">
        <div class="title">Video</div>
    
        <div class="content-item">
           <div class="load_video">
        	<script type="text/javascript">
        		$(document).ready(function(e) {
        			$(window).scroll(function(){
        				if(!$('.load_video').hasClass('load_video2'))
        				{
        					$('.load_video').addClass('load_video2');
        					$('.load_video').load( "ajax/video.php");
        				}
        			 });
                });
        	</script>
            </div><!---END .load_video-->
        </div>
    </div>
 </div>
  <div class="suport left-item">
    <div class="suport-content">
        <div class="content-item-news">
            <?php for($i=0,$count_quangcao=count($quangcao);$i<$count_quangcao;$i++){	?>  	  
                    <a href="<?=$quangcao[$i]['link']?>"><img style="width: 100%;" src="<?php if($quangcao[$i]['photo']!=NULL) echo _upload_hinhanh_l.$quangcao[$i]['photo']; else echo 'images/noimage.gif';?>" alt="<?php if($quangcao[$i]['ten']!='') echo $quangcao[$i]['ten'];else echo $company['ten']?>" /></a>
            <?php } ?>
        </div>
    </div>
 </div>
 <div class="facebook left-item">
    <div class="facebook-content">
        <div class="title">Facebook</div>
        <div class="fb-like-box" data-href="<?=$company['facebook']?>" data-width="300" data-height="370" data-show-faces="true" data-stream="true" data-show-border="false" data-header="false"></div>
    </div>
 </div>
 <div class="ltc left-item">
    <div class="title-ltc">Lượt truy cập</div>
    <ul>
        <li>Đang online: <?php $count=count_online();echo $tong_xem=$count['dangxem'];?></li>
        <li>Hôm nay: <?=$homnay?></li>
        <li>Tổng lượt: <?php $count=count_online();echo $tong_xem=$count['daxem'];?></li>
    </ul>
 </div>