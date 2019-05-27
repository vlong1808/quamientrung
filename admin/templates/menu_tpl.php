<div class="logo"> <a href="#" target="_blank" onclick="return false;"><img src="images/logo.png"  alt="" /> </a></div>
<div class="sidebarSep mt0"></div>
<!-- Left navigation -->
<ul id="menu" class="nav">
  <li class="dash" id="menu1"><a class=" active" title="" href="index.php"><span>Trang chủ</span></a></li>

  <li class="categories_li <?php if($_GET['com']=='product' || $_GET['com']=='order' || $_GET['com']=='excel') echo ' activemenu' ?>" id="menu_"><a href="" title="" class="exp"><span>Sản phẩm</span><strong></strong></a>
    <ul class="sub">
    	<?php phanquyen_menu('Quản lý danh mục 1','product','man_danhmuc','sanpham'); ?>
        <?php phanquyen_menu('Quản lý danh mục 2','product','man_list','sanpham'); ?>
        <?php phanquyen_menu('Quản lý nhà sản xuất','product','man_cat','sanpham'); ?>
        <?php phanquyen_menu('Quản lý sản phẩm','product','man','sanpham'); ?>
        <?php phanquyen_menu('Cập nhật mô tả sản phẩm','about','capnhat','sanpham'); ?>
        <?php phanquyen_menu('Quản lý đơn hàng','order','man',''); ?>
    </ul>
  </li>
  
  <li class="categories_li <?php if($_GET['com']=='news' or $_GET['com']=='vnexpress') echo ' activemenu' ?>" id="menu_tt"><a href="" title="" class="exp"><span>Bài viết</span><strong></strong></a>
    <ul class="sub">
        <?php phanquyen_menu('Quản lý tin tức','news','man','tintuc'); ?>
        <?php phanquyen_menu('Quản lý dự án','news','man','duan'); ?>
        <?php phanquyen_menu('Thông tin công ty','news','man','thongtin'); ?>
        <?php phanquyen_menu('Hỗ trợ khách hàng','news','man','hotro'); ?>
        <?php phanquyen_menu('chính sách mua hàng','news','man','dichvu'); ?>
        <?php phanquyen_menu('Quản lý bảng giá','news','man','bangia'); ?>
        <?php phanquyen_menu('Quản lý khuyến mãi','news','man','khuyenmai'); ?>
         <?php phanquyen_menu('Quản lý tư vấn','news','man','tuvan'); ?>
        <?php phanquyen_menu('Quản lý video','video','man','video'); ?>
    </ul>
  </li>
        <li class="categories_li <?php if($_GET['com']=='newsletter' || $_GET['com']=='lkweb' || $_GET['com']=='yahoo') echo ' activemenu' ?>" id="menu_nt"><a href="" title="" class="exp"><span>Marketing Online</span><strong></strong></a>
      	<ul class="sub">

            <?php phanquyen_menu('Quản lý hỗ trợ trực tuyến','yahoo','man',''); ?>
 	
        </ul>
      </li>
   <li class="categories_li <?php if($_GET['com']=='about' || $_GET['com']=='video') echo ' activemenu' ?>" id="menu_t"><a href="" title="" class="exp"><span>Trang tĩnh</span><strong></strong></a>
    <ul class="sub">
        <?php phanquyen_menu('Cập nhật giới thiệu','about','capnhat','about'); ?>
        <?php phanquyen_menu('Cập nhật tài khoản ngân hàng','about','capnhat','tknganhang'); ?>
        <?php phanquyen_menu('Cập nhật liên hệ','about','capnhat','lienhe'); ?>
        <?php phanquyen_menu('Cập nhật footer','about','capnhat','footer'); ?>
        <?php phanquyen_menu('Cập nhật hồ sơ năng lực','about','capnhat','hoso'); ?>
    </ul>
  </li>

	

   
      <li class="categories_li gallery_li <?php if($_GET['com']=='anhnen' || $_GET['com']=='background' || $_GET['com']=='slider' || $_GET['com']=='letruot') echo ' activemenu' ?>" id="menu_qc"><a href="" title="" class="exp"><span>Banner - Quảng cáo</span><strong></strong></a>
     <ul class="sub">
     		<?php phanquyen_menu('Cập nhật banner','background','capnhat','banner'); ?>
            <?php phanquyen_menu('Quản lý slider','slider','man_photo','slider'); ?>
            <?php phanquyen_menu('Quản lý quảng cáo','slider','man_photo','quangcao'); ?>
            <?php phanquyen_menu('Cập nhật pupop','background','capnhat','pupop'); ?>
            <?php phanquyen_menu('Cập nhật tiêu đề','background','capnhat','tieude'); ?>
            <?php phanquyen_menu('Cập nhật đối tác','slider','man_photo','doitac'); ?>
            <?php //phanquyen_menu('Cập nhật background','anhnen','capnhat','background'); ?>
     </ul>
     </li>

     <li class="categories_li setting_li <?php if($_GET['com']=='company' || $_GET['com']=='meta' || $_GET['com']=='about' || $_GET['com']=='user') echo ' activemenu' ?>" id="menu_cp"><a href="" title="" class="exp"><span>Nội dung khác</span><strong></strong></a>
    <ul class="sub">
    	<?php phanquyen_menu('Cấu hình thông tin Website','company','capnhat',''); ?>
         <li<?php if($_GET['act']=='admin_edit') echo ' class="this"' ?>><a href="index.php?com=user&act=admin_edit">Quản lý Tài Khoản</a></li>
    </ul>
  </li>
</ul>
