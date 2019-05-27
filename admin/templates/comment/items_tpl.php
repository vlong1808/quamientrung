<script language="javascript" type="text/javascript">
	$(document).ready(function() {
		$("#chonhet").click(function(){
			var status=this.checked;
			$("input[name='chon']").each(function(){this.checked=status;})
		});
		
		$("#xoahet").click(function(){
			var listid="";
			$("input[name='chon']").each(function(){
				if (this.checked) listid = listid+","+this.value;
				})
			listid=listid.substr(1);	 //alert(listid);
			if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
			hoi= confirm("Bạn có chắc chắn muốn xóa?");
			if (hoi==true) document.location = "index.php?com=comment&act=delete&type=<?=$_REQUEST['type']?>&listid=" + listid;
		});
	});
	
	function select_onchange()
	{				
		var a=document.getElementById("id_danhmuc");
		window.location ="index.php?com=comment&act=man&type=<?=$_REQUEST['type']?>&id_danhmuc="+a.value;	
		return true;
	}
	function timkiem()
	{	
		var a = $('input.key').val();	
		if(a=='Tên...') a='';		
		window.location ="index.php?com=comment&act=man&type=<?=$_REQUEST['type']?>&key="+a;	
		return true;
	}	
</script>

<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="index.php?com=comment&act=man&type=<?=$_REQUEST['type']?>"><span>Quản lý <?=$title_main ?></span></a></li>
        	<?php if($_GET['key']!=''){ ?>
				<li class="current"><a href="#" onclick="return false;">Kết quả tìm kiếm " <?=$_GET['key']?> " </a></li>
			<?php }  else { ?>
            	<li class="current"><a href="#" onclick="return false;">Tất cả</a></li>
            <?php } ?>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<form name="frm" id="frm" method="post" action="index.php?com=comment&act=save&type=<?=$_REQUEST['type']?>&p=<?=$_REQUEST['p']?>&product_id=<?=$items[$i]['product_id']?>">
<div class="control_frm" style="margin-top:0;">
  	<div style="float:left;">
    	<input type="button" class="blueB" value="Thêm" onclick="location.href='index.php?com=comment&act=add<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>&product_id=<?=$items[$i]['product_id']?>'" />
        <input type="button" class="blueB" value="Xoá Chọn" id="xoahet" />

    </div>  
</div>
<div class="widget">
  <div class="title"><span class="titleIcon">
    <input type="checkbox" id="titleCheck" name="titleCheck" />
    </span>
    <h6>Chọn tất cả</h6>
    <div class="timkiem">
	    <input type="text" value="" name="key" class="key"  placeholder="Nhập từ khóa tìm kiếm ">
	    <button type="button" class="blueB" onclick="timkiem();" value="">Tìm kiếm</button>
    </div>
  </div>
  
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
      <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">Thứ tự</a></td>     
        <td width="150">Họ tên</td>
        <td class="tb_data_small">Email</td>
        <td class="tb_data_small">Ngày bình luận</td>
        <td class="sortCol"><div>Tên sản phẩm<span></span></div></td>
        <td class="tb_data_small">Ẩn/Hiện</td>
        <td width="200">Thao tác</td>
      </tr>
    </thead>
    <tbody>
    	 <?php for($i=0, $count=count($items); $i<$count; $i++){?>
          <tr>
          <td>
            <input type="checkbox" name="chon" value="<?=$items[$i]['id']?>" id="chon" />
        </td>
         <td align="center">
            <input data-val0="<?=$items[$i]['id']?>" data-val2="table_<?=$_GET['com']?>" type="text" value="<?=$items[$i]['stt']?>" name="stt<?=$i?>" data-val3="stt" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" class="tipS smallText update_stt" onblur="stt(this)" original-title="Nhập số thứ tự sản phẩm" rel="<?=$items[$i]['id']?>" />
        </td> 
        <td align="center" class="">
			<?php if($items[$i]['ten']!='')echo $items[$i]['ten'];else echo $items[$i]['tenen']; ?>    
        </td>
		<td align="center" class="">
			<?=$items[$i]['email'] ?>     
        </td>
       <td align="center" class="">
			<?=date("d/m/Y",$items[$i]['ngaytao']) ?>    
        </td>
        <td class="title_name_data">
            <?php if($items[$i]["id_parent"]==0){
					$d->reset();
					$sql="select ten from #_product where id='".$items[$i]['product_id']."'";
					$d->query($sql);
					$rs=$d->fetch_array();
					echo "Bình luận sản phẩm ".$rs["ten"];	
				}else{
					$d->reset();
					$sql="select ten,tenen from #_comment where id='".$items[$i]['parent_id']."'";
					$d->query($sql);
					$rs=$d->fetch_array();
					echo "Trả lời bình luận của ";
					if($rs["ten"]!='')echo $rs["ten"];else echo $rs["tenen"];

				} ?>
        </td>

        <td align="center">
          <a data-val2="table_<?=$_GET['com']?>" rel="<?=$items[$i]['hienthi']?>" data-val3="hienthi" class="diamondToggle <?=($items[$i]['hienthi']==1)?"diamondToggleOff":""?>" data-val0="<?=$items[$i]['id']?>" ></a>   
        </td>
        <td class="actBtns">
            <a href="index.php?com=comment&act=edit&type=<?=$_REQUEST['type']?>&p=<?=$_REQUEST['p']?>&id=<?=$items[$i]['id']?>&product_id=<?=$items[$i]['product_id']?>" title="" class="smallButton tipS" original-title="Sửa sản phẩm"><img src="./images/icons/dark/pencil.png" alt=""></a>

            <a href="index.php?com=comment&act=delete&id=<?=$items[$i]['id']?>&type=<?=$_REQUEST['type']?>&p=<?=$_REQUEST['p']?>&product_id=<?=$items[$i]['product_id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;" title="" class="smallButton tipS" original-title="Xóa tin"><img src="./images/icons/dark/close.png" alt=""></a>
        </td>
          </tr>
         <?php } ?>
    </tbody>
  </table>
</div>
</form>
<div class="pagination">  <?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>