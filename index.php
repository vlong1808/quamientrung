<?php
	session_start();
	$session=session_id();

	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './admin/lib/');
	
	include_once _lib."Mobile_Detect.php";
	$detect = new Mobile_Detect;
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
	
	$lang_default = array("","en");
	if(!isset($_SESSION['lang']) or !in_array($_SESSION['lang'], $lang_default))
	{
		@$_SESSION['lang'] = $company['lang_default'];
	}
	$lang=$_SESSION['lang'];

	require_once _source."lang$lang.php";	
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";	
	include_once _lib."class.database.php";
	include_once _lib."functions_user.php";
	include_once _lib."functions_giohang.php";
	include_once _lib."file_requick.php";
	include_once _source."counter.php";	
    include_once _source."construct.php";	
?>
<!doctype html>
<html lang="vi">

<head>
	<base href="http://<?=$config_url?>/" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">   
	<?php include _template."layout/seoweb.php";?>
	<?php include _template."layout/js_css.php";?> 
    <?=$company['codethem']?>       
</head>

<body>
<h1 class="vcard fn" style="position:absolute; top:-1000px;"><?php if($title!='')echo $title;else echo $seo['title'];?></h1>
<h2 style="position:absolute; top:-1000px;"><?php if($title!='')echo $title;else echo $seo['title'];?></h2>
<h3 style="position:absolute; top:-1000px;"><?php if($title!='')echo $title;else echo $seo['title'];?></h3>
<!--Mua hàng-->
<div id="wapper">


    <?php //include _template."layout/pupop.php";?>
	<?php include _template."layout/header.php";?>
    <?php include _template."layout/menu_top.php";?>
    
    <?php if($source=='index') {?>
        <?php include _template."layout/slider.php";?>      
    <?php } ?>
    <div id="main_content">
        
        <div class="full_content">
        <?php if($source=='index') {?>
            <div id="right">
                <?php include _template.$template."_tpl.php"; ?> 
            </div>
            <div id="left">
                 <?php include  _template."layout/left.php";?>
            </div>
        <?php } else { ?>
            <div class="full_content_w">
                
                <div id="right" class="content-right">
                   
                     <?php include _template."layout/tieude.php";?>  
                     <?php include _template.$template."_tpl.php"; ?> 
                    
                </div>
                <div id="left">
                    <?php include _template."layout/left.php";?>  
                </div>
                <div class="clear"></div>
            </div>
        <?php } ?>
        	
         
          
        </div><!---END #right-->
        <div class="clear"></div>
    </div><!---END #main_content-->
    <div class="clear"></div>
    <?php include _template."layout/doitac.php";?>
    <?php include _template."layout/footer.php";?>
    
</div><!---END #wapper-->
</body>
</html>