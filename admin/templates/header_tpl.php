<div class="wrapper">
        <div class="welcome"><a href="#" title=""><img src="images/userPic.png" alt="" /></a><span>Xin chào, <?=$_SESSION['login_admin']['username']?>!</span></div>
        <div class="userNav">
            <ul>
                <li><a href="http://<?=$config_url?>" title="" target="_blank"><img src="./images/icons/topnav/mainWebsite.png" alt="" /><span>Vào trang web</span></a></li>
                
                 <li class="ddnew2"><a title="" class="hien_menu"><img src="images/icons/topnav/profile.png" alt="" /><span>Thành viên</span><span class="numberTop"></span></a>
                    <ul class="menu_header">                   	
                        <?php phanquyen_menu('Đăng ký','about','capnhat','dangky'); ?>
                        <?php phanquyen_menu('Đăng nhập','about','capnhat','dangnhap'); ?>
                        <?php phanquyen_menu('Quên mật khẩu','about','capnhat','quenmatkhau'); ?>
                        <?php phanquyen_menu('Thay đổi thông tin','about','capnhat','thaydoithongtin'); ?>
                        <?php phanquyen_menu('Quản lý thành viên','user','man',''); ?>
                    </ul>
                </li>
                

                <li><a href="index.php?com=user&act=logout" title=""><img src="images/icons/topnav/logout.png" alt="" /><span>Đăng xuất</span></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
<?php echo $_SESSION['login']['role']; ?>