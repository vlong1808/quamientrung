<script type="text/javascript">
    function del(pid, size, mausac) {
        if (confirm('Do you really mean to delete this item')) {
            document.form1.pid.value = pid;
            document.form1.size.value = size;
            document.form1.mausac.value = mausac;
            document.form1.command.value = 'delete';
            document.form1.submit();
        }
    }

    function clear_cart() {
        if (confirm('This will empty your shopping cart, continue?')) {
            document.form1.command.value = 'clear';
            document.form1.submit();
        }
    }

    function update_cart() {
        document.form1.command.value = 'update';
        document.form1.submit();
    }

    function quaylai() {
        history.go(-1);
    }

    function doEnter_update(evt) {
        var key;
        if (evt.keyCode == 13 || evt.which == 13) {
            update_cart(evt);
        }
    }
</script>
<?php
//var_dump($_SESSION['cart']);
//unset($_SESSION['cart']);
?>


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
                        $('#info_cart').html(kq.thongbao);
                        //alert(kq.sl);
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
<link href="css/_product.css" type="text/css" rel="stylesheet"/>
<div class="wap_item">
    <div class="content-seo">
        <?= $mota_seo ?>
    </div>
    <div class="content-product-list">
    <?php for ($i = 0, $count_product = count($product); $i < $count_product; $i++) { ?>
        <div class="item item_custom">
            <a href="<?= $product[$i]['tenkhongdau'] ?>-<?= $product[$i]['id'] ?>.html"
               title="<?= $product[$i]['ten'] ?>" itemprop="name"><img style="width: 100%;"
                                                                       src="<?php if ($product[$i]['thumb'] != NULL) echo _upload_sanpham_l . $product[$i]['thumb']; else echo 'images/noimage.png'; ?>"
                                                                       alt="<?= $product[$i]['ten'] ?>"/></a>
            <div class="tomtat">
                <h3 class="sp_name"><a href="<?= $product[$i]['tenkhongdau'] ?>-<?= $product[$i]['id'] ?>.html"
                                       title="<?= $product[$i]['ten'] ?>" itemprop="name"><?= $product[$i]['ten'] ?></a>
                </h3>
                <?php
                if (!empty($product[$i]['giacu'])) {
                    ?>
                    <h4>
                        <span style="text-decoration: line-through;"><?= number_format($product[$i]['gia']) ?> vnd </span><span
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