
<script type="text/javascript">
	$(document).ready(function(e) {
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
					$(".frm")[0].reset();
				},
				success:function(kq){
					add_popup(kq.thongbao);
					$('#capcha').val('');
					if(kq.nhaplai=='nhaplai')
					{
						$(".frm")[0].reset();
					}
					if(kq.chuyentrang==1)
					{
						
                       location.href="index.html";
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
	});
</script>
<div class="box_container">
   <div class="content">
   		<div class="dangnhap">      
                <div class="tieude_dangnhap">Hướng dẫn đăng nhập</div>
                <?=$tintuc_detail['noidung']?>
                <div class="item_lienhe">
                    <a href="dang-ky.html" class="btn_dangnhap"><?=_dangky?></a>
                </div>
                <div class="clear"></div>
        </div><!--.dangnhap-->
        
   		<div class="dangky">
        	<div class="dangky_frm">
        	<div class="tieude_dangky"><?=_thongtindangnhap?></div>
            <div class="frm_lienhe">    	
                <form method="post" name="frm" class="frm" action="ajax/user.php" enctype="multipart/form-data">
                	<input name="act" type="hidden" id="act" value="dangnhap" />
                    <div class="loicapcha thongbao"></div>
                    <div class="item_lienhe"><p><?=_tendangnhap?>:<span>*</span></p><input name="tendangnhap" type="text" id="tendangnhap" /></div>
                    
                    <div class="item_lienhe"><p><?=_matkhau?>:<span>*</span></p><input name="matkhau" type="password" id="matkhau" /></div>
                    
                   
                    <div class="item_lienhe"><p class="baove"><?=_mabaove?>:<span>*</span></p>
                    <input style="width:100px;" name="capcha" type="text" id="capcha" /><img src="sources/captcha.php" id="hinh_captcha" style="float:right;">
                            <a style="float: right;" href="#reset_capcha" id="reset_capcha" title="<?=_doimakhac?>"><img src="images/refresh.png" alt="reset_capcha" /></a></div>
    
                 
                    <div class="item_lienhe">
                        <input type="button" value="<?=_dangnhap?>" class="click_ajax" />
                        <input type="button" value="Nhập lại" onclick="document.frm.reset();" />
                    </div>
                </form>
            </div><!--.frm_lienhe--> 
            </div><!--.dangky_frm--> 
        </div>  <!--.dangky-->               
   </div><!--.content--> 
</div><!--.box_container--> 