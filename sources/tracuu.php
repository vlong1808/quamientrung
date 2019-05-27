<?php

	$madonhang = (string) $_GET['madonhang'];
	$dienthoai = (string) $_GET['dienthoai'];
	
	$d->reset();
	$sql = "select * from #_donhang where madonhang='".$madonhang."' and dienthoai='".$dienthoai."' limit 0,1";
	$d->query($sql);
	$donhang = $d->fetch_array();
	if(!empty($donhang)){

		$d->reset();
		$sql = "select * from #_chitietdonhang where madonhang='".$madonhang."'";
		$d->query($sql);
		$chitiet = $d->result_array();
		
		$d->reset();
		$sql = "select * from #_httt where id=".$donhang['httt']."";
		
		$d->query($sql);
		$httt = $d->fetch_array();
	
		$d->reset();
		$sql = "select id,ten from #_place_city where id=".$donhang['thanhpho']."";
		$d->query($sql);
		$place_city = $d->fetch_array();
		
		
		$d->reset();
		$sql = "select id,ten from #_place_dist where id=".$donhang['quan']."";
		$d->query($sql);
		$place_dist = $d->fetch_array();
	}

?>