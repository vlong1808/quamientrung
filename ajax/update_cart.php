<?php 

	include ("ajax_config.php");
	
	$max=count($_SESSION['cart']);
	for($i=0;$i<$max;$i++){
		$pid=$_SESSION['cart'][$i]['productid'];
		$size=$_SESSION['cart'][$i]['size'];
		$mausac=$_SESSION['cart'][$i]['mausac'];
		$q=intval($_REQUEST['product'.$pid.$size.$mausac]);
		
		$_SESSION['cart'][$i]['qty']=$q;

	}
?>

		
			<input type="hidden" name="pid" />
            <input type="hidden" name="size" />
            <input type="hidden" name="mausac" />
			<input type="hidden" name="command" /> 
				<table id="giohang" border="0" cellpadding="5px" cellspacing="1px" style="color:#000; background:#dadada; width:100%; font-size:13px;">
    	   <?php
			if(is_array($_SESSION['cart'])){
            	echo '<tr bgcolor="#F0F0F0" style="font-weight: bold;" height="55px"><td align="center">'._xoa.'</td><td style="text-align:center;">'._hinhanh.'</td><td style="text-align:center;" class="gh_an">'._ten.'</td> <td align="center">'._dongia.'</td><td align="center">'._soluong.'</td> <td align="center">'._thanhtien.'</td></tr>';
				$max=count($_SESSION['cart']);
				for($i=0;$i<$max;$i++){
					$pid=$_SESSION['cart'][$i]['productid'];
					$size=$_SESSION['cart'][$i]['size'];
					$mausac=$_SESSION['cart'][$i]['mausac'];
					$q=$_SESSION['cart'][$i]['qty'];
					$pmasp=get_code($pid);					
					$pname=get_product_name($pid);
					$pphoto=get_product_photo($pid);
					if($q==0)
                    {
                      continue;  
                    } 
			?>
            		<tr bgcolor="#FFFFFF" style="color:#000000;">
                    <td width="10%" align="center"><a style="text-decoration: none;color: #5F7ABB;" href="javascript:del(<?=$pid?>,'<?=$size?>','<?=$mausac?>')"><?=_xoa?></a></td>
            		<td width="15%" align="center"><img src="<?=_upload_sanpham_l.$pphoto?>" style="max-height:50px; margin:0px 0;" /></td>
                    <td width="25%" style="padding:0px 10px; box-sizing:border-box;"><?=$pname?></td>
                    <td width="15%" align="center"><?=number_format(get_price($pid),0, ',', '.')?> <sup>đ</sup></td>
                    <td width="10%" align="center"><input max="100" min="0" class="soluong_gh" style="width:50px; padding:2px;"  type="number" data="<?=$pid?>" soluong="<?=$q?>" name="product<?=$pid?><?=$size?><?=$mausac?>" value="<?=$q?>" maxlength="5" size="2" style="text-align:center; border:1px solid #d2d2d2; padding:3px 0;" /> </td>                    
                    <td width="15%" align="center" class="gh_an"><?=number_format(get_price($pid)*$q,0, ',', '.') ?> <sup>đ</sup></td>
            		</tr>
            <?php					
				}
			?>
				<tr>
                	<td colspan="5" style="background:#F0F0F0; font-weight: bold; height:55px; text-align:right; padding-right:10px;"><?=_tongtien?></td>
                	<td style="background: #fff;text-align: center; font-weight: bold;"><?=number_format(get_order_total(),0, ',', '.')?> <sup>đ</sup></td>
                </tr>
			<?php
            }
			else{
				echo "<tr><td>"._khongcosanphamtronggiohang."</td>";
			}
		?>
        </table>	
        <div class="clear" style="height:40px;"></div>

<script type="text/javascript">
	$(document).ready(function(e) {
	   $('.soluong_gh').change(function(){
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