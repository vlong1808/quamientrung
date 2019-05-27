<?php
	include ("ajax_config.php");
	
	$act = magic_quote(trim(strip_tags($_POST['act'])));
	
	switch($act){
		case "dathang":
			order();
			break;
		case "dangnhap":
			check_user();
			break;
        case "doi_sl":
			doisl();
			break;
		default:
			break;
	}

function order()
{
	global $d;
	$id = intval($_POST['id']);
	$size = trim(strip_tags($_POST['size']));
	$mausac = magic_quote(trim(strip_tags($_POST['mausac'])));
	$soluong = intval($_POST['soluong']);
	
	addtocart($id,$size,$mausac,$soluong);
     $text = _sanphamthemvaogiohang.'.<br /><a class="xemgiohang" href="gio-hang.html">'._xemgiohang.'</a>';
	$return['ok'] = $size;
	$return['sl'] = count($_SESSION['cart']);
    $return['total'] = number_format(get_order_total(),0, ',', '.');
    $return['thongbao'] = $text;
	echo json_encode($return);
}
?>  
