<script type="text/javascript">
	$(document).ready(function(e) {
		$('.click_ajax').click(function(){
			if(isEmpty($('#ten_lienhe').val(), "<?=_nhaphoten?>"))
			{
				$('#ten_lienhe').focus();
				return false;
			}
			if(isEmpty($('#diachi_lienhe').val(), "<?=_nhapdiachi?>"))
			{
				$('#diachi_lienhe').focus();
				return false;
			}
			if(isEmpty($('#dienthoai_lienhe').val(), "<?=_nhapsodienthoai?>"))
			{
				$('#dienthoai_lienhe').focus();
				return false;
			}
			if(isPhone($('#dienthoai_lienhe').val(), "<?=_nhapsodienthoai?>"))
			{
				$('#dienthoai_lienhe').focus();
				return false;
			}
			if(isEmpty($('#email_lienhe').val(), "<?=_emailkhonghople?>"))
			{
				$('#email_lienhe').focus();
				return false;
			}
			if(isEmail($('#email_lienhe').val(), "<?=_emailkhonghople?>"))
			{
				$('#email_lienhe').focus();
				return false;
			}
			if(isEmpty($('#tieude_lienhe').val(), "<?=_nhapchude?>"))
			{
				$('#tieude_lienhe').focus();
				return false;
			}
			if(isEmpty($('#noidung_lienhe').val(), "<?=_nhapnoidung?>"))
			{
				$('#noidung_lienhe').focus();
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
				},
				success:function(kq){
					add_popup(kq.thongbao);
					$('#capcha').val('');
					if(kq.nhaplai=='nhaplai')
					{
						$(".frm")[0].reset();
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
   		<div class="tt_lh">
        <?=$company_contact['noidung'];?> 
		<div class="frm_lienhe">
        	<form method="post" name="frm" class="frm" action="ajax/contact.php" enctype="multipart/form-data">
            	<div class="loicapcha thongbao"></div>
            	<div class="item_lienhe"><p><?=_hovaten?>:<span>*</span></p><input name="ten_lienhe" type="text" id="ten_lienhe" /></div>
                
                <div class="item_lienhe"><p><?=_diachi?>:<span>*</span></p><input name="diachi_lienhe" type="text" id="diachi_lienhe" /></div>
                
                <div class="item_lienhe"><p><?=_dienthoai?>:<span>*</span></p><input name="dienthoai_lienhe" type="text" id="dienthoai_lienhe" /></div>
                
                <div class="item_lienhe"><p>Email:<span>*</span></p><input name="email_lienhe" type="text" id="email_lienhe" /></div>
                
                <div class="item_lienhe"><p><?=_chude?>:<span>*</span></p><input name="tieude_lienhe" type="text" id="tieude_lienhe" /></div>
                
                <div class="item_lienhe"><p><?=_noidung?>:<span>*</span></p><textarea name="noidung_lienhe" id="noidung_lienhe" rows="5"></textarea></div>
                
                <div class="item_lienhe"><p><?=_mabaove?>:<span>*</span></p>
                <input style="width: 100px; float:left;" name="capcha" type="text" id="capcha" />
                <img src="sources/captcha.php" id="hinh_captcha">
                       	<a href="#reset_capcha" id="reset_capcha" title="<?=_doimakhac?>"><img src="images/refresh.png" alt="reset_capcha" /></a>         
                           </div>

                
                
                <div class="item_lienhe" >
                	<p>&nbsp;</p>
                	<input type="button" value="<?=_gui?>" class="click_ajax" />
                    <input type="button" value="<?=_nhaplai?>" onclick="document.frm.reset();" />
                </div>
            </form>
        </div><!--.frm_lienhe-->   
        </div>     
      
<div class="bando">        
           <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyD5Mevy_rl8U4ZyBB8i5jmdxfvb9Cg5UoE"></script>
		   <script type="text/javascript">
		   var map;
		   var infowindow;
		   var marker= new Array();
		   var old_id= 0;
		   var infoWindowArray= new Array();
		   var infowindow_array= new Array();
           
           var MY_MAPTYPE_ID = 'demo_custom_style';
		   function initialize2(){
		      var style_maps = [{"featureType":"administrative","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"saturation":-100},{"lightness":"50"},{"visibility":"simplified"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"lightness":"30"}]},{"featureType":"road.local","elementType":"all","stylers":[{"lightness":"40"}]},{"featureType":"transit","elementType":"all","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]},{"featureType":"water","elementType":"labels","stylers":[{"lightness":-25},{"saturation":-100}]}]
			   var defaultLatLng = new google.maps.LatLng(<?=$company['toado']?>);
			   var myOptions= {
				   zoom: 16,
				   center: defaultLatLng,
				   scrollwheel : false,
				   mapTypeControlOptions: {
                        mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
                    },
                    mapTypeId: MY_MAPTYPE_ID
				};
                
                /*var styledMapOptions = {
                    name: 'Custom Style'
                };
                var customMapType = new google.maps.StyledMapType(style_maps, styledMapOptions);
                map.mapTypes.set(MY_MAPTYPE_ID, customMapType);*/
				map = new google.maps.Map(document.getElementById("map_canvas2"), myOptions);map.setCenter(defaultLatLng);
			   var arrLatLng = new google.maps.LatLng(<?=$company['toado']?>);
			   infoWindowArray[7895] = '<div class="map_description"><div class="map_title"><?=$company['ten']?></div><div><?=_diachi?> : <?=$company['diachi']?><?='<br />'?><?=_dienthoai?>: <?=$company['dienthoai']?></div></div>';
			   loadMarker(arrLatLng, infoWindowArray[7895], 7895);
			   var styledMapOptions = {
                    name: 'Custom Style'
                };
                var customMapType = new google.maps.StyledMapType(style_maps, styledMapOptions);
                map.mapTypes.set(MY_MAPTYPE_ID, customMapType);
			   moveToMaker(7895);}function loadMarker(myLocation, myInfoWindow, id){marker[id] = new google.maps.Marker({position: myLocation, map: map, visible:true,icon: 'images/map-marker.gif' });
			   var popup = myInfoWindow;infowindow_array[id] = new google.maps.InfoWindow({ content: popup});google.maps.event.addListener(marker[id], 'mouseover', function() {if (id == old_id) return;if (old_id > 0) infowindow_array[old_id].close();infowindow_array[id].open(map, marker[id]);old_id = id;});google.maps.event.addListener(infowindow_array[id], 'closeclick', function() {old_id = 0;});}function moveToMaker(id){var location = marker[id].position;map.setCenter(location);if (old_id > 0) infowindow_array[old_id].close();infowindow_array[id].open(map, marker[id]);old_id = id;}
               
               </script>
           <div id="map_canvas2" style="height:500px; width: 100%;">
           <script>
           
           
           </script>
            
           </div> 
        </div><!--.bando--> 

<!-- end bản đồ --!>    
   </div><!--.content--> 
</div><!--.box_container--> 