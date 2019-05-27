<!-- slick -->
<script type="text/javascript">
    $(document).ready(function () {
        $('.slick2').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            autoplay: false,  //Tự động chạy
            autoplaySpeed: 5000,  //Tốc độ chạy
            asNavFor: '.slick'
        });
        $('.slick').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.slick2',
            dots: false,
            centerMode: false,
            focusOnSelect: true
        });
        return false;
    });
</script>
<!-- slick -->

<link href="magiczoomplus/magiczoomplus.css" rel="stylesheet" type="text/css" media="screen"/>
<script src="magiczoomplus/magiczoomplus.js" type="text/javascript"></script>
<script type="text/javascript">
    var mzOptions = {
        zoomMode: true,
        onExpandClose: function () {
            MagicZoom.refresh();
        }
    };
</script>


<!--Tags sản phẩm-->
<link href="css/tab.css" type="text/css" rel="stylesheet"/>
<script language="javascript" type="text/javascript">
    $(document).ready(function () {
        $('#content_tabs .tab').hide();
        $('#content_tabs .tab:first').show();
        $('#ultabs li:first').addClass('active');

        $('#ultabs li').click(function () {
            var vitri = $(this).data('vitri');
            $('#ultabs li').removeClass('active');
            $(this).addClass('active');

            $('#content_tabs .tab').hide();
            $('#content_tabs .tab:eq(' + vitri + ')').show();
            return false;
        });
    });
</script>
<!--Tags sản phẩm-->

<!--Mua hàng-->
<script type="text/javascript">
    $(document).ready(function (e) {
        $('.size').click(function () {
            $('.size').removeClass('active_size');
            $(this).addClass('active_size');
        });
        $('.mausac').click(function () {
            $('.mausac').removeClass('active_mausac');
            $(this).addClass('active_mausac');
        });
        $('button.dathang').click(function () {
            if ($('.size').length && $('.active_size').length == false) {
                alert('<?=_chonsize?>');
                return false;
            }
            if ($('.active_size').length) {
                var size = $('.active_size').html();
            } else {
                var size = '';
            }

            if ($('.mausac').length && $('.active_mausac').length == false) {
                alert('<?=_chonmau?>');
                return false;
            }
            if ($('.active_mausac').length) {
                var mausac = $('.active_mausac').html();
            } else {
                var mausac = '';
            }
            var act = "dathang";
            var _seft = $(this);
            var id = _seft.attr('name');
            var nam_sl = '.sl_' + id;
            var soluong = $(nam_sl).val();
            //alert(soluong + '---'+ nam_sl + '---' +id);
            if (soluong > 0) {
                $.ajax({
                    type: 'post',
                    url: 'ajax/cart.php',
                    dataType: 'json',
                    data: {id: id, size: size, mausac: mausac, soluong: soluong, act: act},
                    beforeSend: function () {
                        $('.thongbao').html('<p><img src="images/loader_p.gif"></p>');
                    },
                    error: function () {
                        add_popup('<?=_hethongloi?>');
                    },
                    success: function (kq) {
                        add_popup2(kq.thongbao);
                        $('#info_cart').html(kq.sl);
                        //$('.prace-total').html(kq.total+' Vnđ');
                        //alert(kq.sl);ASFDASFSAFAS
                        console.log(kq);
                    }
                });
            } else {
                alert('<?=_nhapsoluong?>');
            }
            return false;
        });
    });
</script>
<!--Mua hàng-->

<!--Đánh giá sao-->
<script type="text/javascript">
    $(document).ready(function (e) {
        var giatri_default = "<?=$num_danhgiasao?>";
        $('.danhgiasao span:lt(' + giatri_default + ')').addClass('active');
        $('.danhgiasao span').hover(function () {
            var giatri = $(this).data('value');
            $('.danhgiasao span').removeClass('hover');
            $('.danhgiasao span:lt(' + giatri + ')').addClass('hover');
        }, function () {
            $('.danhgiasao span').removeClass('hover');
        });

        $('.danhgiasao span').click(function () {
            var url = $('.danhgiasao').data('url');
            var giatri = $(this).data('value');

            $.ajax({
                type: 'post',
                url: 'ajax/danhgiasao.php',
                data: {giatri: giatri, url: url},
                success: function (kq) {
                    if (kq == 1) {
                        $('.danhgiasao span:lt(' + giatri + ')').addClass('active');
                        alert('<?=_bandanhgia?>: ' + giatri + '/10');
                        $('.num_danhgia').html(+giatri + '/10');
                    } else if (kq == 2) {
                        alert('<?=_danhgiaroi?>');
                    } else {
                        alert('<?=_hethongloi?>');
                    }
                }
            });
        });
    });
</script>
<!--Đánh giá sao-->


<div class="box_container">

    <div class="wap_pro">
        <div class="zoom_slick">
            <div class="slick2">
                <a data-zoom-id="Zoom-detail" id="Zoom-detail" class="MagicZoom"
                   href="<?php if ($row_detail['photo'] != NULL) echo _upload_sanpham_l . $row_detail['photo']; else echo 'images/noimage.gif'; ?>"
                   title="<?= $row_detail['ten'] ?>"><img class='cloudzoom'
                                                          src="<?php if ($row_detail['photo'] != NULL) echo _upload_sanpham_l . $row_detail['photo']; else echo 'images/noimage.gif'; ?>"/></a>

                <?php $count = count($hinhthem);
                if ($count > 0) { ?>
                    <?php for ($j = 0, $count_hinhthem = count($hinhthem); $j < $count_hinhthem; $j++) { ?>
                        <a data-zoom-id="Zoom-detail" id="Zoom-detail" class="MagicZoom"
                           href="<?php if ($hinhthem[$j]['photo'] != NULL) echo _upload_hinhthem_l . $hinhthem[$j]['photo']; else echo 'images/noimage.gif'; ?>"
                           title="<?= $row_detail['ten'] ?>"><img
                                    src="<?php if ($hinhthem[$j]['photo'] != NULL) echo _upload_hinhthem_l . $hinhthem[$j]['photo']; else echo 'images/noimage.gif'; ?>"/></a>
                    <?php }
                } ?>
            </div><!--.slick-->


            <?php $count = count($hinhthem);
            if ($count > 0) { ?>
                <div class="slick">
                    <p>
                        <img src="timthumb.php?src=<?php if ($row_detail['photo'] != NULL) echo _upload_sanpham_l . $row_detail['photo']; else echo 'images/noimage.gif'; ?>&h=80&w=100&zc=1&q=100"/>
                    </p>
                    <?php for ($j = 0, $count_hinhthem = count($hinhthem); $j < $count_hinhthem; $j++) { ?>
                        <p>
                            <img src="<?php if ($hinhthem[$j]['thumb'] != NULL) echo _upload_hinhthem_l . $hinhthem[$j]['thumb']; else echo 'images/noimage.gif'; ?>"/>
                        </p>
                    <?php } ?>
                </div><!--.slick-->
            <?php } ?>
        </div><!--.zoom_slick-->

        <ul class="product_info">
            <li class="ten"><?= $row_detail['ten'] ?></li>
            <?php if ($row_detail['masp'] != '') { ?>
                <li><b><?= _masanpham ?>:</b> <?= $row_detail['masp'] ?></span></li><?php } ?>

            <li class="gia"><?= _gia ?>
                : <?php if ($row_detail['gia'] > 0) echo number_format($row_detail['gia'], 0, ',', '.') . ' <sup>đ</sup>'; else echo _lienhe; ?></li>


            <li class="nha_sx"><span>NSX: </span><?= get_cat_id($row_detail['id_cat']) ?></li>
            <li style="width: 100%;"><input type="number" value="1" class="soluong sl_<?= $row_detail['id'] ?>"/>
                <button class="dathang" name="<?= $row_detail['id'] ?>">Mua</button>
            </li>
            <li><b><?= _luotxem ?>:</b> <span><?= $row_detail['luotxem'] ?></span></li>
            <?php if ($row_detail['mota'] != '') { ?>
                <li><?= $row_detail['mota'] ?></li><?php } ?>

            <li>
                <div class="addthis_native_toolbox"><b><?= _chiase ?>: </b></div>
            </li>
        </ul>
        <div class="clear"></div>
    </div><!--.wap_pro-->

    <div id="tabs">
        <ul id="ultabs">
            <li data-vitri="0"><?= _thongtinsanpham ?></li>
            <li data-vitri="1"><?= _binhluan ?></li>
        </ul>
        <div style="clear:both"></div>

        <div id="content_tabs">
            <div class="tab">

                <?= $row_detail['noidung'] ?>

            </div>

            <div class="tab">


                <div class="fb-comments" data-href="<?= getCurrentPageURL() ?>" data-numposts="5"
                     data-width="100%"></div>
            </div>
        </div><!---END #content_tabs-->
    </div><!---END #tabs-->
    <div class="clear"></div>
</div><!--.box_containerlienhe-->

<?php if (count($product) > 0) { ?>
    <link href="css/_product.css" type="text/css" rel="stylesheet"/>
    <div class="wap_item">
        <div class="content-product-list">
            <?php for ($i = 0, $count_product = count($product); $i < $count_product; $i++) { ?>
                <div class="item item_custom">
                    <a href="<?= $product[$i]['tenkhongdau'] ?>-<?= $product[$i]['id'] ?>.html"
                       title="<?= $product[$i]['ten'] ?>" itemprop="name"><img style="width: 100%;"
                                                                               src="<?php if ($product[$i]['thumb'] != NULL) echo _upload_sanpham_l . $product[$i]['thumb']; else echo 'images/noimage.png'; ?>"
                                                                               alt="<?= $product[$i]['ten'] ?>"/></a>
                    <div class="tomtat">
                        <h3 class="sp_name"><a href="<?= $product[$i]['tenkhongdau'] ?>-<?= $product[$i]['id'] ?>.html"
                                               title="<?= $product[$i]['ten'] ?>"
                                               itemprop="name"><?= $product[$i]['ten'] ?></a></h3>
                        <?php
                        if (!empty($product[$i]['giacu'])) {
                            ?>
                            <h4><span style="text-decoration: line-through;"><?= number_format($product[$i]['gia']) ?> vnd </span><span
                                        style="color:red;"><?= number_format($product[$i]['giacu']) ?> vnd</span></h4>
                            <?php
                        } else {
                            ?>
                            <h4><?= number_format($product[$i]['gia']) ?> vnd</h4>
                            <?php
                        }
                        ?>
                    </div>

                </div><!---END .item-->
            <?php } ?>
        </div>
        <div class="pagination"><?= pagesListLimitadmin($url_link, $totalRows, $pageSize, $offset) ?></div>
    </div><!---END .wap_item-->
<?php } ?>
