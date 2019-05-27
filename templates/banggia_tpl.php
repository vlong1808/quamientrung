 <link href="css/_banggia.css" type="text/css" rel="stylesheet" />
<div class="banggia_content">
<p>Download Catalogue, Bảng giá và Tài liệu hướng dẫn tại đây.</p>
<table>
    <tr class="tieude">
        <td>STT</td>
        <td>Nội dung – Bảng giá</td>
        <td>Download</td>
    </tr>
    
    <?php for($i=0;$i<count($tintuc);$i++) { ?>
        <tr class="tieude">
        <td class="stt_item"><?=$i+1?></td>
        <td><?=$tintuc[$i]['ten']?></td>
        <td class="download_item"><a target="_bank" href="<?=_upload_files_l.$tintuc[$i]['file']?>"><i class="fa fa-download" aria-hidden="true"></i> Tải về</a></td>
    </tr>
    <?php }?>
</table>
<div class="clear"></div>
<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
</div>