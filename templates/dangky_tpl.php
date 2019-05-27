<link href="css/datepicker.css" type="text/css" rel="stylesheet" />
<script type='text/javascript' src='js/jquery.ui.datepicker.js'></script>
<script type='text/javascript' src='js/jquery-ui.custom.js'></script>
<script language="javascript">	
  $(function() {
	$( ".date" ).datepicker({
		dateFormat: "dd/mm/yy",
		changeMonth: true,
		changeYear: true,
		dayNamesMin: [ "T2", "T3", "T4", "T5", "T6", "T7", "CN" ],
		monthNamesShort: [ "Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12" ],
		yearRange: "1900:now"
	});
  });
</script>

<script type="text/javascript">
	$(document).ready(function(e) {
		$('#tendangnhap').blur(function(){
			if(isSpace($('#tendangnhap').val(), "<?=_tendangnhapkhongduocchuakhoangtrang?>"))
			{
				$('#tendangnhap').focus();
				return false;
			}
			if(isCharacters($('#tendangnhap').val(), "<?=_tendangnhapkhongduocchuakitudatbiethoactiengvietcodau?>"))
			{
				$('#tendangnhap').focus();
				return false;
			}
			if(isCharacterlimit($('#tendangnhap').val(), "<?=_tendangnhaptu6den30kitu?>",3,30))
			{
				$('#tendangnhap').focus();
				return false;
			}
			
		});
		$('#matkhau').blur(function(){
			if(isSpace($('#matkhau').val(), "<?=_matkhaukhongduocchuakhoangtrang?>"))
			{
				$('#matkhau').focus();
				return false;
			}
			if(isCharacterlimit($('#matkhau').val(), "<?=_matkhautu6den30kitu?>",6,30))
			{
				$('#matkhau').focus();
				return false;
			}
		});
		$('#nhaplaimatkhau').blur(function(){
			if(isRepassword($('#matkhau').val(),$('#nhaplaimatkhau').val(), "<?=_matkhaunhaplaikhongdung?>"))
			{
				$('#nhaplaimatkhau').val('');
				$('#nhaplaimatkhau').focus();
				return false;
			}
		});
		$('.click_ajax').click(function(){
			if(isEmpty($('#tendangnhap').val(), "<?=_nhaptendangnhap?>"))
			{
				$('#tendangnhap').focus();
				return false;
			}
			if(isEmpty($('#matkhau').val(), "<?=_nhapmatkhau?>"))
			{
				$('#matkhau').focus();
				return false;
			}
			if(isEmpty($('#nhaplaimatkhau').val(), "<?=_nhapnhaplaimatkhau?>"))
			{
				$('#nhaplaimatkhau').focus();
				return false;
			}
			if(isEmpty($('#ten_lienhe').val(), "<?=_nhaphoten?>"))
			{
				$('#ten_lienhe').focus();
				return false;
			}
			if(isEmpty($('#dienthoai_lienhe').val(), "<?=_nhapsodienthoai?>"))
			{
				$('#dienthoai_lienhe').focus();
				return false;
			}
			if(isPhone($('#dienthoai_lienhe').val(), "<?=_sodienthoaikhongdung?>"))
			{
				$('#dienthoai_lienhe').focus();
				return false;
			}
			if(isEmpty($('#email_lienhe').val(), "<?=_nhapemail?>"))
			{
				$('#email_lienhe').focus();
				return false;
			}
			if(isEmail($('#email_lienhe').val(), "<?=_emailkhonghople?>"))
			{
				$('#email_lienhe').focus();
				return false;
			}
			if(isEmpty($('#capcha').val(), "<?=_nhapmabaove?>"))
			{
				$('#capcha').focus();
				return false;
			}
			$.ajax({
				type:'post',
				url:$(".frm").attr('action'),
				data:$(".frm").serialize(),
				dataType:'json',
				beforeSend: function() {
					$('.thongbao').html('<p><img src="images/loader_p.gif"></p>');  
				},
				error: function(){
					add_popup('<?=_hethongloi?>');
				},
				success:function(kq){
					//add_popup(kq.thongbao);
					$('#capcha').val('');
					if(kq.nhaplai=='tontai')
					{
						$('#tendangnhap').focus();
					}
					if(kq.nhaplai=='nhaplai')
					{
						$(".frm")[0].reset();
					}
                    if(kq.chuyentrang==1)
					{
					  add_popup("Chào mừng bạn trở thành thành viên của winnimart.com!");
					  setTimeout(function(){location.href="index.html"},5000);
					}
				}
			});
		});    
    });
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$("#reset_capcha").click(function() {
			$("#hinh_captcha").attr("src", "sources/captcha.php?"+Math.random());
			return false;
		});
        $('#thanhpho').change(function(){
			var id_city = $(this).val();
			$.ajax({
				type:'post',
				url:'ajax/place.php',
				data:{act:'dist',id_city:id_city},
				success:function(rs){
					$('#quan').html(rs);
				}
			});
		});
	});
</script>
<div class="box_container">
   <div class="content">
   		 <div class="dangnhap">      
                <div class="tieude_dangnhap">Hướng dẫn đăng ký</div>
                <?=$tintuc_detail['noidung']?>
                <div class="item_lienhe">
                    <a href="dang-nhap.html" class="btn_dangnhap"><?=_dangnhap?></a>
                </div>
                <div class="clear"></div>
        </div><!--.dangnhap-->
        
   		<div class="dangky">
        	<div class="dangky_frm">
        	<div class="tieude_dangky"><?=_thongtindangky?></div>
            <div class="frm_lienhe">       	
                <form method="post" name="frm" class="frm" action="ajax/user.php" enctype="multipart/form-data">
                	<input name="act" type="hidden" id="act" value="dangky" />
                    <div class="loicapcha thongbao"></div>
                    <div class="item_lienhe"><p><?=_tendangnhap?>:<span>*</span></p><input name="tendangnhap" type="text" id="tendangnhap" /></div>
                    
                    <div class="item_lienhe"><p><?=_matkhau?>:<span>*</span></p><input name="matkhau" type="password" id="matkhau" /></div>
                    
                    <div class="item_lienhe"><p><?=_nhaplaimatkhau?>:<span>*</span></p><input name="nhaplaimatkhau" type="password" id="nhaplaimatkhau" /></div>
                    
                    <div class="item_lienhe"><p><?=_hovaten?>:<span>*</span></p><input name="ten_lienhe" type="text" id="ten_lienhe" /></div>

                    <div class="item_lienhe"><p><?=_dienthoai?>:<span>*</span></p>
                    <input name="dienthoai_lienhe" type="text" id="dienthoai_lienhe" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" /></div>
                    
                    <div class="item_lienhe"><p>Email:<span>*</span></p><input name="email_lienhe" type="text" id="email_lienhe" /></div>
                    <div class="item_lienhe"><p class="no"><?=_tinhthanhpho?>:<span>*</span></p>
                        <select name="thanhpho" id="thanhpho">
                            <option value=""><?=_chontinhthanhpho?></option>
                            <?php for($i = 0, $count_place_city = count($place_city); $i < $count_place_city; $i++){ ?>
                                <option value="<?=$place_city[$i]['id']?>"><?=$place_city[$i]['ten']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="item_lienhe"><p class="no"><?=_quanhuyen?>:<span>*</span></p>
                        <select name="quan" id="quan">
                        	<option><?=_chonquanhuyen?></option>
                        </select>
                    </div>
                    <div class="item_lienhe"><p><?=_diachi?>:</p><input name="diachi_lienhe" type="text" id="diachi_lienhe" /></div>
                    
                    <div class="item_lienhe"><p><?=_gioitinh?>:</p>
                    <select name="gioitinh_lienhe" id="gioitinh_lienhe">
                    	<option value=""><?=_luachon?></option>
                        <option value="Nam"><?=_nam2?></option>
                        <option value="Nữ"><?=_nu?></option>
                    </select>
                    </div>
                    <div class="item_lienhe"><p><?=_ngaysinh?>:</p><input name="ngaysinh_lienhe" type="text" id="ngaysinh_lienhe" class="date" readonly="readonly" /></div>
                    <div class="item_lienhe"><p class="baove"><?=_mabaove?>:<span>*</span></p>
                    <input style="width:100px;" name="capcha" type="text" id="capcha" /><img src="sources/captcha.php" id="hinh_captcha" style="float:right;">
                            <a style="float: right;" href="#reset_capcha" id="reset_capcha" title="<?=_doimakhac?>"><img src="images/refresh.png" alt="reset_capcha" /></a></div>
    
                 
                    <div class="item_lienhe">
                        <input type="button" value="<?=_dangky?>" class="click_ajax" />
                        <input type="button" value="Nhập lại" onclick="document.frm.reset();" />
                    </div>
                </form>
            </div><!--.frm_lienhe--> 
            </div><!--.dangky_frm--> 
        </div>  <!--.dangky-->               
   </div><!--.content--> 
</div><!--.box_container--> 