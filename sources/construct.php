<?php  if(!defined('_source')) die("Error");
    $d->reset();
	$sql_banner = "select photo$lang as photo from #_background where type='banner' limit 0,1";
	$d->query($sql_banner);
	$row_banner = $d->fetch_array();
	
	$d->reset();
	$sql_banner_mobi = "select photo$lang as photo from #_background where type='banner_mobi' limit 0,1";
	$d->query($sql_banner_mobi);
	$banner_mobi = $d->fetch_array();
    
    $d->reset();
	$sql_slider = "select ten$lang as ten,link,photo, mota$lang as mota from #_slider where hienthi=1 and type='slider' order by stt,id desc";
	$d->query($sql_slider);
	$slider=$d->result_array();
    
    $d->reset();
	$sql_quangcao = "select id,ten$lang as ten,link,photo from #_slider where hienthi=1 and type='quangcao' order by stt,id desc";
	$d->query($sql_quangcao);
	$quangcao = $d->result_array();	
    
    $d->reset();
	$sql_hotro = "select ten$lang as ten,dienthoai,email,yahoo,skype from #_yahoo where hienthi=1 order by stt,id desc";
	$d->query($sql_hotro);
	$hotro = $d->result_array();
    
    $d->reset();
	$sql = "select id,ten$lang as ten,tenkhongdau,mota,thumb, mota$lang as mota, ngaytao, luotxem from #_news where type='tintuc' and hienthi=1 and noibat=1 order by stt,id desc";
	$d->query($sql);
	$tintuc_f = $d->result_array();
    
    $d->reset();
	$sql = "select id,ten$lang as ten, link from #_lkweb where hienthi=1 order by stt,id desc";
	$d->query($sql);
	$lk_web = $d->result_array();
    
    $d->reset();
	$sql = "select id,ten$lang as ten,tenkhongdau,thumb,gia,giacu from #_product where type='sanpham' and spmoi=1 order by stt,id desc";		
	$d->query($sql);
	$product_new = $d->result_array();
    
    
    $d->reset();
	$sql = "select id,ten$lang as ten,tenkhongdau,mota$lang as mota from #_product_danhmuc where type='sanpham' and hienthi=1 order by stt,id desc";
	$d->query($sql);
	$danhmuc_product = $d->result_array();

    $d->reset();
	$sql = "select id,ten$lang as ten,tenkhongdau,mota$lang as mota from #_product_cat where type='sanpham' and hienthi=1 order by stt,id desc";
	$d->query($sql);
	$danhmuc_cat = $d->result_array();
    
    $d->reset();
	$sql = "select id,ten$lang as ten,tenkhongdau from #_product_cat where hienthi=1 order by stt,id desc";
	$d->query($sql);
	$product_cat = $d->result_array();
    
    $thongtin = get_news_type('thongtin');
    $hotro_f = get_news_type('hotro');
    $chinhsach = get_news_type('dichvu');
    function get_option_id($id)
    {
   	    global $d;
    	$d->reset();
        $sql_contact = "select ten, icon from table_place_khoihanh where id=$id limit 0,1";
    	$d->query($sql_contact);
    	$option = $d->fetch_array();
        return $option;
    }
    
    function get_item_id($id)
    {
   	    global $d;
    	$d->reset();
        $sql_contact = "select ten from table_product_item where id=$id limit 0,1";
    	$d->query($sql_contact);
    	$item = $d->fetch_array();
        return $item['ten'];
    }
    function get_items_list($id_danhmuc)
    {
   	    global $d;
    	$d->reset();
        $sql_contact = "select ten$lang as ten, id, tenkhongdau from table_product_list where id_danhmuc=$id_danhmuc";
    	$d->query($sql_contact);
    	$item = $d->result_array();
        return $item;
    }
    function get_list_id($id)
    {
   	    global $d;
    	$d->reset();
        $sql_contact = "select ten from table_product_list where id=$id limit 0,1";
    	$d->query($sql_contact);
    	$item = $d->fetch_array();
        return $item['ten'];
    }
    function get_cat_id($id)
    {
   	    global $d;
    	$d->reset();
        $sql_contact = "select ten from table_product_cat where id=$id limit 0,1";
    	$d->query($sql_contact);
    	$item = $d->fetch_array();
        return $item['ten'];
    }
    function get_news_type($type)
    {
   	    global $d;
    	$d->reset();
        $sql_contact = "select ten$lang as ten, id, tenkhongdau, mota$lang as mota, thumb from table_news where type='".$type."' and hienthi = 1 order by stt,id desc";
    	$d->query($sql_contact);
    	$item = $d->result_array();
        return $item;
    }
?>