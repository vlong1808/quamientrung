<?php
	if(!empty($donhang)){
?>
<div class="box_container"> 
	<div class="tieude_giua"><div>Đơn hàng của bạn</div></div>
	<div class="content">
    	<div id="card_sl" class="left_gh">
        	<div class="td_gh"><?=_thongtingiohang?></div>
				<table id="giohang" border="0" cellpadding="5px" cellspacing="1px" style="color:#000; background:#dadada; width:100%; font-size:13px;">
    	   <?php
            	echo '<tr bgcolor="#F0F0F0" style="font-weight: bold;" height="55px"><td style="text-align:center;">'._hinhanh.'</td><td style="text-align:center;" class="gh_an">'._ten.'</td> <td align="center">'._dongia.'</td><td align="center">'._soluong.'</td> <td align="center">'._thanhtien.'</td></tr>';
				
			for($i=0;$i<count($chitiet);$i++) { ?>
            		<tr bgcolor="#FFFFFF" style="color:#000000;">
            		<td width="15%" align="center"><img src="<?=_upload_sanpham_l.$chitiet[$i]['photo']?>" style="max-height:50px; margin:0px 0;" /></td>
                    <td width="25%" style="padding:0px 10px; box-sizing:border-box;"><?=$chitiet[$i]['ten']?></td>
                    <td width="15%" align="center"><?=number_format($chitiet[$i]['gia'],0, ',', '.')?> <sup>đ</sup></td>
                    <td width="10%" align="center"><?=$chitiet[$i]['soluong']?></td>                    
                    <td width="15%" align="center" class="gh_an"><?=number_format($chitiet[$i]['gia']*$chitiet[$i]['soluong'],0, ',', '.')?> <sup>đ</sup></td>
            		</tr>
            <?php } ?>
				<tr>
                	<td colspan="4" style="background:#F0F0F0; font-weight: bold; height:55px; text-align:right; padding-right:10px;"><?=_tongtien?></td>
                	<td style="background: #fff;text-align: center; font-weight: bold;"><?=number_format($donhang['tonggia'],0, ',', '.')?> <sup>đ</sup></td>
                </tr>

        </table>	
        <div class="clear" style="height:40px;"></div>
  </form>
  </div><!--.left_gh-->
  
  
  <div class="right_gh">
	<div class="td_gh"><?=_thongtinkhachhang?></div>
     <div class="frm_lienhe" style="font-size: 14px;">
    <form method="post" name="frm_order" id="frm_order" action="" enctype="multipart/form-data" onsubmit="return check();">
    	<div class="item_lienhe"><p>Mã đơn hàng:</p><?=$donhang['madonhang']?></div>
    	<div class="item_lienhe"><p><?=_htthanhtoan?>:</p><?=$httt['ten']?></div>
        <div class="item_lienhe"><p><?=_dienthoai?>:</p><?=$donhang['dienthoai']?></div>
    	<div class="item_lienhe"><p><?=_hovaten?>:</p><?=$donhang['hoten']?></div>

        <div class="item_lienhe"><p><?=_tinhthanhpho?>:</p><?=$place_city['ten']?></div>

        <div class="item_lienhe"><p><?=_quanhuyen?>:</p><?=$place_dist['ten']?></div>
        
        <div class="item_lienhe"><p><?=_diachi?>:</p><?=$donhang['diachi']?></div>

        <div class="item_lienhe"><p>E-mail:</p><?=$donhang['email']?></div>
        
        <div class="item_lienhe"><p><?=_ghichu2?>:</p><?=$donhang['noidung']?></div>
      </form>
   </div>
   </div>
</div>
</div>
<style>
	div.frm_lienhe .item_lienhe{ min-height:25px; font-weight:bold;}
	div.frm_lienhe .item_lienhe p{ font-weight:normal;}
</style>
<?php } else { ?>
	<p style="font-size:18px; color:red; text-align:center; margin-top:50px;">Thông tin bạn nhập không chính xác,vui lòng liên hệ Hotline: <?=$company['dienthoai']?></p>
<?php } ?>
