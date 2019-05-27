<?php
	$sql_pupop="select photo,ten,hienthi from #_background where hienthi=1 and type='pupop' limit 0,1";
	$d->query($sql_pupop);
	$pupop=$d->fetch_array();
	
	if($pupop['hienthi']==1 and $_SESSION['pupop']==false){
?>

<link href="css/popup.css" type="text/css" rel="stylesheet" />
<script type="text/javascript">
	$(document).ready(function(e) {      
		var loginbox = '#login-box';

		var laycao = $('.login-popupp').height();
		var layrong = $('.login-popupp').width();
		$('.login-popupp').css({'height':laycao,'width':layrong});	
		
		$(loginbox).fadeIn(300);
		var chieucao = $(loginbox).height() / 2;
		var chieurong = $(loginbox).width() /2;
		$(loginbox).css({'margin-top':-chieucao,'margin-left':-chieurong});
		
		$('body').append('<div id="baophu"></div>');
		$('#baophu').fadeIn(300);
		
		$('#baophu, .close-popup').live('click',function(){
			$('#baophu, .login-popupp').fadeOut(300, function(){
				$('#baophu').remove();
			});			
		});
    });
</script>
<div id="login-box" class="login-popupp">
    <div class="close-popup" title="Đóng quảng cáo">x</div>
    <div class="login">
    	<a href="<?=$pupop['link']?>" title="Xem ngay"><img src="<?=_upload_hinhanh_l.$pupop['photo']?>" /></a>
    </div>
    <div class="clear"></div>
</div>
<?php $_SESSION['pupop']=true;} ?>
