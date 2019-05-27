<?php  if(!defined('_source')) die("Error");
	
	if($_SESSION[$login_name]==true)
	{
		transfer(_bandadangnhap, 'http://'.$config_url);
	}
	#Chi tiết bài viết
	$sql = "select ten$lang as ten,noidung$lang as noidung,title,keywords,description from #_about where type='".$type."' and hienthi=1 limit 0,1";
	$d->query($sql);
	$tintuc_detail = $d->fetch_array();
	
    	#Lấy thông tin user nếu đã đăng nhập
	$d->reset();
	$sql_info_user = "select * from #_user where id='".$_SESSION['login']['id']."'";
	$d->query($sql_info_user);
	$info_user = $d->fetch_array();
	
	#Lấy tỉnh thành phố
	$d->reset();
	$sql = "select id,ten from #_place_city where hienthi=1 order by stt,id desc";
	$d->query($sql);
	$place_city = $d->result_array();
    
	#Thông tin seo web
	$title_cat = _dangky;		
	$title = $tintuc_detail['title'];
	$keywords = $tintuc_detail['keywords'];
	$description = $tintuc_detail['description'];
	
?>