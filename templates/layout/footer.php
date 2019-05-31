<link href="css/_footer.css" type="text/css" rel="stylesheet" xmlns="http://www.w3.org/1999/html"/>

<div class="footer">
    <div class="footer-content">
        <div class="footer-item">
            <div class="title-item"><?=_thongtincongty?></div>
            <div class="content-items">
                <ul>
                    <?php for($i=0;$i<count($thongtin);$i++) { ?>
                        <li><a href="thong-tin/<?=$thongtin[$i]['tenkhongdau']?>-<?=$thongtin[$i]['id']?>.html"><?=$thongtin[$i]['ten']?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="footer-item">
            <div class="title-item"><?=_hotro?></div>
            <div class="content-items">
                <ul>
                    <?php for($i=0;$i<count($hotro_f);$i++) { ?>
                        <li><a href="ho-tro/<?=$hotro_f[$i]['tenkhongdau']?>-<?=$hotro_f[$i]['id']?>.html"><?=$hotro_f[$i]['ten']?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="footer-item">
            <div class="title-item"><?=_chinhsachmuahang?></div>
            <div class="content-items">
                <ul>
                    <?php for($i=0;$i<count($chinhsach);$i++) { ?>
                        <li><a href="chinh-sach/<?=$chinhsach[$i]['tenkhongdau']?>-<?=$chinhsach[$i]['id']?>.html"><?=$chinhsach[$i]['ten']?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
         <div class="footer-item">
            <div class="title-item"><?=_kenhthongtinchungtoi?></div>
            <div class="content-items">
                <ul>
                    <li><?=_diachi?>: <?=$company['diachi']?></li>
                    <li><?=_dienthoai?>: <?=$company['dienthoai']?></li>
                    <li>Email: <?=$company['email']?></li>
                </ul>
                <ul class="lienkent">
                    <li class="facebook"><a href="<?=$company['facebook']?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li class="twitter"><a href="<?=$company['twitter']?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li class="youtube"><a href="<?=$company['youtube']?>"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                    <li class="google"><a href="<?=$company['google']?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="copy-write">
        <div class="content-copy-write">
            <div class="creat-by">
                © Product by <span>quamientrung.com.vn</span>  Design by <a href="http://zinzinmedia.com/">ZinZin Media</a>
            </div>
            <div class="bank">
                <ul>
                    <li><img src="./images/pay.png" /></li>
                    <li><img src="./images/mester.png" /></li>
                    <li><img src="./images/visa.png" /></li>
                    <li><img src="./images/disco.png" /></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>