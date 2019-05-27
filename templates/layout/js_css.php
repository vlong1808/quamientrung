<link type="text/css" rel="stylesheet" href="css/jquery.mmenu.all.css" />
<link href="css/popup.css" type="text/css" rel="stylesheet" />
<link href="css/default.css" type="text/css" rel="stylesheet" />
<link href="style.css" type="text/css" rel="stylesheet" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js" ></script>
<script type="text/javascript" src="js/my_script.js"></script>
<script src="js/plugins-scroll.js" type="text/javascript" ></script>
<link href="fontawesome/css/font-awesome.css" type="text/css" rel="stylesheet" />

<!--Menu mobile-->
<script type="text/javascript" src="js/jquery.mmenu.min.all.js"></script>
<script type="text/javascript">
	$(function() {
		$m = $('nav#menu').html();
		$('nav#menu_mobi').append($m);
		
		$('nav#menu_mobi .search').addClass('search_mobi').removeClass('search');
		//$('.search').remove();
		//$('nav#menu_mobi .search_mobi').remove();
		$('.hien_menu').click(function(){
			$('nav#menu_mobi').css({height: "auto"});
		});
		$('.user .fa-user-plus').toggle(function(){
			$('.user ul').slideDown(300);
		},function(){
			$('.user ul').slideUp(300);
		});
		
		$('nav#menu_mobi').mmenu({
				extensions	: [ 'effect-slide-menu', 'pageshadow' ],
				searchfield	: true,
				counters	: true,
				navbar 		: {
					title		: 'Menu'
				},
				navbars		: [
					{
						position	: 'top',
						content		: [ 'searchfield' ]
					}, {
						position	: 'top',
						content		: [
							'prev',
							'title',
							'close'
						]
					}, {
						position	: 'bottom',
						content		: [
							'<a>Online : <?php $count=count_online();echo $tong_xem=$count['dangxem'];?></a>',
							'<a><?=_tong?> : <?php $count=count_online();echo $tong_xem=$count['daxem'];?></a>'
						]
					}
				]
			});
	});
</script>
<!--Menu mobile-->

<link rel="stylesheet" type="text/css" href="css/slick.css"/>
<link rel="stylesheet" type="text/css" href="css/slick-theme.css"/>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $('.chay_i').slick({
		  	//vertical:true,Chay dọc
			//fade: true,//Hiệu ứng fade của slider
			//slidesPerRow: 2,
			//cssEase: 'linear',//Chạy đều
		  	//lazyLoad: 'progressive',
        	infinite: true,//Lặp lại
			accessibility:true,
		  	slidesToShow: 6,    //Số item hiển thị
		  	slidesToScroll: 1, //Số item cuộn khi chạy
		  	autoplay:true,  //Tự động chạy
			autoplaySpeed:3000,  //Tốc độ chạy
			speed:1000,//Tốc độ chuyển slider
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

<script type="text/javascript" src="js/ImageScroller.js"></script>

<!--Thêm alt cho hình ảnh-->
<script type="text/javascript">
	$(document).ready(function(e) {
        $('img').each(function(index, element) {
			if(!$(this).attr('alt') || $(this).attr('alt')=='')
			{
				$(this).attr('alt','<?=$company['ten']?>');
			}
        });
    });
</script>
<!--Thêm alt cho hình ảnh-->

<!--Tim kiem-->
<script language="javascript"> 
    function doEnter(evt){
		var key;
		if(evt.keyCode == 13 || evt.which == 13){
			onSearch(evt);
		}
	}
	function onSearch(evt) {	
			var keyword1 = $('.keyword:eq(0)').val();
			var keyword2 = $('.keyword:eq(1)').val();
			
			if(keyword1=='<?=_nhaptukhoatimkiem?>...')
			{
				keyword = keyword2;
			}
			else
			{
				keyword = keyword1;
			}
			if(keyword=='' || keyword=='<?=_nhaptukhoatimkiem?>...')
			{
				alert('<?=_chuanhaptukhoa?>');
			}
			else{
				location.href = "tim-kiem.html&keyword="+keyword;
				loadPage(document.location);			
			}
		}		
</script>   
<!--Tim kiem-->

<!--Code gữ thanh menu trên cùng-->
<script type="text/javascript">
	$(document).ready(function(){
		$(window).scroll(function(){
			var cach_top = $(window).scrollTop();
			var heaigt_header = $('#header').height();
            var heaigt_slider = $('#slider').height();
			if(cach_top >= (heaigt_header + heaigt_slider)){
				$('.wap_menu').css({position: 'fixed', top: '0px', zIndex:99});
			}else{
				$('.wap_menu').css({position: 'relative'});
			}
		});
	});
 </script>
<?php if($source=='index' or $source=='product' or $source=='search'){?>
	<script type="text/javascript">
	$(document).ready(function(e) {
		$(document).on('change','.soluong_gh',function(){
		   $.ajax({
				type:'post',
				url:'ajax/update_cart.php',
				data:$(".frm").serialize(),
				beforeSend: function() {
					$('.thongbao').html('<p><img src="images/loader_p.gif"></p>');  
				},
				success:function(kq){
					$('.frm').html(kq);
				}
			});
	   });
    });
</script>
<?php } ?>
