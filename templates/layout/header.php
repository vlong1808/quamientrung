<link href="css/_header.css" type="text/css" rel="stylesheet" />
<div id="header">
     <div class="header-content">
            <div class="header-left">
                <div class="logo">
                    <a href=""> <img src="<?=_upload_hinhanh_l.$row_banner['photo']?>" /> </a>
                </div>
            </div>
            <div class="header-right">
                <div class="help-menu">
                    <ul>
                        <li><a href="ho-tro.html">Hổ trợ</a></li>
                        <li><a href="theo-doi-don-hang.html">Theo dỏi đơn hàng</a></li>
                        <li><a href="khuyen-mai.html">Khuyến mãi</a></li>
                    </ul>
                </div>
                <div class="row-header">
                    <div class="sreach-pro">
                        <!--<input class="input_keyword" type="text" name="input_keyword" placeholder="Tìm sản phẩm" />
                        <select class="select_cal">
                            <option value="0">Chọn danh mục</option>
                            <?php for($i=0;$i<count($danhmuc_product);$i++) {?>
                                <option value="<?=$danhmuc_product[$i]['id']?>"><?=$danhmuc_product[$i]['ten']?></option>
                            <?php } ?>
                        </select>
                        <button name="bnt_search" class="bnt_search"><i class="fa fa-search" aria-hidden="true"></i></button>
                        <div class="clear"></div>--!>
                        <h3><?=$company['ten']?></h3>
                        <p><?=$company['skype']?></p>
                    </div>
                    <div class="cart-user">
                        <ul>
                            <li class="cart"><a href="gio-hang.html"><i class="fa fa-opencart" aria-hidden="true"></i><span><sup id="info_cart"><?=count($_SESSION['cart'])?></sup></span></a></li>
                            <li class="users"><a><i class="fa fa-user" aria-hidden="true"></i><i class="fa fa-sort-desc" aria-hidden="true"></i></a>
                                <ul>
                                    <?php if((!isset($_SESSION[$login_name]) || $_SESSION[$login_name]==false)){?>
                                        <li id="top-item item-tk"><a class="top-item item-dn" href="dang-ky.html">Đăng ký</a></li>
                                    <?php } else {?>
                                        <li><a class="top-item item-tk" href="tai-khoan.html">Tài Khoản</a></li>
                                    <?php } ?>
                    
            
                                    <?php if((!isset($_SESSION[$login_name]) || $_SESSION[$login_name]==false)){?>
                                    <li id="item-dntop"><a class="top-item item-dn" href="dang-nhap.html">Đăng Nhập</a></li>
                                    <?php } else {?>
                                    <li><a href="dang-xuat.html">Xin chào <span style="color:#d25114; font-weight: normal;">(
                    	               <?php $info_user=info_user($_SESSION['login']['id']);echo $info_user['username']?>)</span></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <div class="clear"></div>
                        </ul>
                        
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
     </div>
    <div class="clear"></div> 
            
</div>
<!--end header-->
<script language="javascript"> 
    $(document).ready(function(){
        $('.bnt_search').click(function(){
             var keyword = $('.input_keyword').val();
             var id_danhmuc = $('.select_cal').val();
             location.href = "tim-kiem.html&keyword="+keyword+"&danhmuc="+id_danhmuc;
             loadPage(document.location);
        });
    });		
</script>   
<!--Tim kiem-->