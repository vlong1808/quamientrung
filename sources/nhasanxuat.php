<?php  if(!defined('_source')) die("Error");
	
	if(isset($_GET['id'])){
		$id_cat =  intval($_GET['id']);
        //var_dump($id_cat);
        $where ="";								
        if($id_cat !=0)
        {
            $where .= "id_cat=".$id_cat." and ";
            $d->reset();
            $sql_contact = "select ten from table_product_cat where id=$id_cat limit 0,1";
        	$d->query($sql_contact);
        	$item_cat = $d->fetch_array();
            $title_cat = $item_cat['ten'];
        }
		$where .= "type='".$type."' and hienthi=1 order by stt,id desc";
		
		#L?y s?n ph?m và phân trang
		$d->reset();
		$sql = "SELECT count(id) AS numrows FROM #_product where $where";
		$d->query($sql);	
		$dem = $d->fetch_array();
		
		$totalRows = $dem['numrows'];
		$page = $_GET['p'];
		$pageSize = 12;//S? item cho 1 trang
		$offset = 5;//S? trang hi?n th?				
		if ($page == "")$page = 1;
		else $page = $_GET['p'];
		$page--;
		$bg = $pageSize*$page;		
		
		$d->reset();
		$sql = "select id,ten$lang as ten,tenkhongdau,thumb,photo,masp,gia,giacu from #_product where $where limit $bg,$pageSize";		
		//var_dump($sql);exit();
        $d->query($sql);
		$product = $d->result_array();	
		$url_link = getCurrentPageURL();
	}	
?>