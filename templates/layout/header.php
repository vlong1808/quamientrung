<link href="css/_header.css" type="text/css" rel="stylesheet"/>
<div id="header">
    <div class="header-content">
        <div class="header-left">
            <div class="logo">
                <a href=""> <img src="<?= _upload_hinhanh_l . $row_banner['photo'] ?>"/> </a>
            </div>
        </div>
        <div class="header-right">
            <div class="help-menu">
                <ul>
<!--                    <li class="cart">-->
<!--                        <a href="gio-hang.html"><i class="fa fa-opencart" aria-hidden="true"></i><span><sup-->
<!--                                        id="info_cart">--><?//= count($_SESSION['cart']) ?><!--</sup></span></a></li>-->
                    <li><a href="ho-tro.html"><?=_hotro?></a></li>
                    <li><a href="khuyen-mai.html"><?=_khuyenmai?></a></li>
                    <li><a class="<?php if($_REQUEST['com'] == 'tin-tuc') echo 'active'; ?>" href="tin-tuc.html"><?=_tintuc?></a></li>
                    <li class="lang" ><a href="index.php?com=ngonngu&lang=en" title="English"><img src="./images/en.png" /></a>

                    <a href="index.php?com=ngonngu&lang=" title="Việt Nam"><img src="./images/vi.png" /><strong></strong></a></li>
                </ul>
            </div>
            <!--<div class="row-header">
                <div class="sreach-pro">
                    <!--<input class="input_keyword" type="text" name="input_keyword" placeholder="Tìm sản phẩm" />
                        <select class="select_cal">
                            <option value="0">Chọn danh mục</option>
                            <?php for ($i = 0; $i < count($danhmuc_product); $i++) { ?>
                                <option value="<?= $danhmuc_product[$i]['id'] ?>"><?= $danhmuc_product[$i]['ten'] ?></option>
                            <?php } ?>
                        </select>
                        <button name="bnt_search" class="bnt_search"><i class="fa fa-search" aria-hidden="true"></i></button>
                        <div class="clear"></div>
                    <h3><?= $company['ten'] ?></h3>
                    <p><?= $company['skype'] ?></p>
                </div>
                <div class="clear"></div>
            </div> -->
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>

</div>
<!--end header-->
<script language="javascript">
    $(document).ready(function () {
        $('.bnt_search').click(function () {
            var keyword = $('.input_keyword').val();
            var id_danhmuc = $('.select_cal').val();
            location.href = "tim-kiem.html&keyword=" + keyword + "&danhmuc=" + id_danhmuc;
            loadPage(document.location);
        });
    });
</script>
<!--Tim kiem-->