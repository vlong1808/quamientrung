<?php  if(!defined('_source')) die("Error");
    
    $d->reset();
	$sql = "select id,ten$lang as ten,tenkhongdau,thumb,gia,giacu from #_product where type='sanpham' and noibat=1 and tieubieu=1 order by stt,id desc";		
	$d->query($sql);
	$product = $d->result_array();	
    
    $d->reset();
	$sql = "select id,ten$lang as ten,tenkhongdau,thumb,gia,giacu, spbanchay from #_product where type='sanpham' and hienthi=1 and spmoi=1 order by stt,id desc";		
	$d->query($sql);
	$product_huuco = $d->result_array();	
 
    $d->reset();
	$sql = "select id,ten$lang as ten,tenkhongdau from #_news where type='chinhsach' and hienthi=1 order by stt,id desc";
	$d->query($sql);
	$chinhsach = $d->result_array();
 
    $d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id from #_product_danhmuc where hienthi=1 and type='sanpham' and noibat=1 order by stt,id desc";
	$d->query($sql);
	$product_danhmuc2=$d->result_array(); 
    

    
	$url_link = getCurrentPageURL();

?>