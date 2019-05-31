<?php  if(!defined('_source')) die("Error");	
	
	
	if(count($_SESSION['cart'])>0)
	{

	#Lấy thông tin user nếu đã đăng nhập
	$d->reset();
	$sql_info_user = "select * from #_user where id='".$_SESSION['login']['id']."'";
	$d->query($sql_info_user);
	$info_user = $d->fetch_array();
	
	#Lấy tỉnh thành phố
	$d->reset();
	$sql = "select id,ten from #_place_city where hienthi=1 order by stt,id desc";
	$d->query($sql);
	$place_city = $d->result_array();
	
	#Lấy httt
	$d->reset();
	$sql = "select id,ten$lang as ten from #_httt where hienthi=1 order by stt,id desc";
	$d->query($sql);
	$get_httt = $d->result_array();
	
	$d->reset();
	$sql_banner = "select photo$lang as photo from #_background where type='banner' limit 0,1";
	$d->query($sql_banner);
	$row_banner = $d->fetch_array();
	
    //var_dump($get_httt);
	#Nếu click thanh toán thành công
    if(isset($_POST['ck_dienthoai'])){
        echo ( $_POST['dienthoai']);
    }
	if(isset($_POST['hoten'])){	
	
		#Lấy thông tin đơn hàng
		$httt = $_POST['httt'];
		$hoten = $_POST['hoten'];
		$dienthoai = $_POST['dienthoai'];
		$thanhpho = (int)$_POST['thanhpho'];
		$quan = (int)$_POST['quan'];
		$diachi = $_POST['diachi'];
		$email = $_POST['email'];
		$noidung = $_POST['noidung'];
		$ip = getRealIPAddress();
		$id_user = $_SESSION['login']['id'];
		
		//validate dữ liệu
		$httt = (int)$httt;
		$hoten = trim(strip_tags($hoten));
		$dienthoai = trim(strip_tags($dienthoai));	
		$diachi = trim(strip_tags($diachi));	
		$email = trim(strip_tags($email));	
		$noidung = trim(strip_tags($noidung));

		$hoten = mysql_real_escape_string($hoten);
		$dienthoai = mysql_real_escape_string($dienthoai);
		$diachi = mysql_real_escape_string($diachi);
		$email = mysql_real_escape_string($email);
		$noidung = mysql_real_escape_string($noidung);	
		$tonggia = get_order_total();				

		$ngaydangky = time();
		$ngaycapnhat = time();	
		
		$coloi = false;		
		if ($hoten == NULL) { 
			$coloi=true; $error = _nhaphoten;
		} 
		if ($dienthoai == NULL) { 
			$coloi=true; $error = _nhapsodienthoai;
		}
		if ($thanhpho == NULL) { 
			$coloi=true; $error = _nhaptinhthanhpho;
		}
		if ($quan == NULL) { 
			$coloi=true; $error = _nhapquanhuyen;
		}
		if ($diachi == NULL) { 
			$coloi=true; $error = _nhapdiachi;
		}
		#Nếu không điền đầy đủ thông tin cần thiết
		if($coloi==true)
		{
			transfer(_vuilongdiendayduthongtin, "gio-hang.html");
		}
		
		#Nếu điền đầy đủ thông tin cần thiết
		if ($coloi==false) 
		{	
		
			#Mẫu mã đơn hàng VD:160503NN101
			$donhangmau = date('Ydm').'NP';
			
			#Kiểm tra mã đơn hàng lớn nhất trong ngày
			$d->reset();
			$sql = "select id,madonhang from #_donhang where madonhang like '$donhangmau%' order by id desc limit 0,1";
			$d->query($sql);
			$max_order = $d->fetch_array();
			//var_dump($max_order);exit(); 
			#Nếu không tồn tại đơn hàng nào trong ngày hôm nay
			if(empty($max_order['id']))
			{
				$songaunhien = 101;
			}
			else
			{
			     //$leng = strlen((string)$max_order);
				(int)$songaunhien =  substr($max_order['madonhang'],10)+1;
			}
			#Mã đơn hàng của đơn hàng hiện tại là
            //echo 
			$madonhang = date('Ydm').'NP'.$songaunhien;
			//dump($tonggia);
			$sql = "INSERT INTO  table_donhang (httt,madonhang,hoten,dienthoai,thanhpho,quan,diachi,email,tonggia,noidung,ngaytao,tinhtrang,ngaycapnhat,ip,id_user) 
			  VALUES ('$httt','$madonhang','$hoten','$dienthoai','$thanhpho','$quan','$diachi','$email','$tonggia','$noidung','$ngaydangky','1','$ngaycapnhat','$ip','$id_user')";	

		
		#Nếu insert bảng đơn hàng thành công thì tiếp tự insert vào bảng chi tiết đơn hàng
		if(mysql_query($sql))
		{
			if(is_array($_SESSION['cart']))
			{
				$max = count($_SESSION['cart']);
				$coloi = false;
				for($i=0;$i<$max;$i++){
					$pid = $_SESSION['cart'][$i]['productid'];
					$q = $_SESSION['cart'][$i]['qty'];
					$size = $_SESSION['cart'][$i]['size'];
					$mausac = $_SESSION['cart'][$i]['mausac'];
					$pmasp = get_code($pid);					
					$pname = get_product_name($pid);
					$pphoto = get_product_photo($pid);
					$pgia = get_price($pid);
					$ptonggia = get_price($pid)*$q;
					$d->reset();
                	$sql = "select id,ten$lang as ten from #_httt where id='".$httt."' and hienthi=1 order by stt,id desc";
                	$d->query($sql);
                	$get_httt2 = $d->fetch_array();
					#Nếu số lượng bàng ko thì bỏ qua
					if($q == 0) continue;
					$sql = "INSERT INTO table_chitietdonhang (madonhang,masp,ten,size,mausac,gia,soluong,tonggia,ngaytao,photo,id_sanpham) VALUES ('$madonhang','$pmasp','$pname','$size','$mausac','$pgia','$q','$ptonggia','$ngaydangky','$pphoto','$pid')";

					if(mysql_query($sql) == true)
					{
						$coloi = true;
					}	
					else
					{
						transfer("Đơn hàng của bạn chưa được gửi<br>Vui lòng điền đầy đủ thông tin lại<br>Cảm ơn", "gio-hang.html");
					}
				}
				
				#Nếu insert bảng chitietdonhang thành công thì bắt đầu gửi mail
				if($coloi == true)
				{		
					include_once "phpMailer/class.phpmailer.php";	
					$mail = new PHPMailer();
					$mail->IsSMTP(); 				// Gọi đến class xử lý SMTP
					$mail->Host       = $ip_host;   // tên SMTP server
                    $mail->Port       = $mail_port;   //prot mail
        			$mail->SMTPAuth   = true; 
                    $mail->SMTPSecure = "tls";      // Sử dụng đăng nhập vào account
        			$mail->Username   = $mail_host; // SMTP account username
        			$mail->Password   = $pass_mail;   
			
					//Thiết lập thông tin người gửi và email người gửi
					$mail->SetFrom($mail_host,$_POST['ten_lienhe']);
					
					$mail->AddAddress($company['email'], 'Đơn hàng từ website '.$_SERVER["SERVER_NAME"]);
					
					$mail->AddAddress($email, 'Đơn hàng từ website '.$_SERVER["SERVER_NAME"]);
					//Thiết lập email nhận email hồi đáp
					
					//nếu người nhận nhấn nút Reply
					$mail->AddReplyTo($email,'Đơn hàng từ website: '.$_SERVER["SERVER_NAME"]);
					/*=====================================
					 * THIET LAP NOI DUNG EMAIL
					*=====================================*/
					//Thiết lập tiêu đề
					$mail->Subject    = "Đơn hàng từ website".$_SERVER["SERVER_NAME"];
					$mail->IsHTML(true);
					//Thiết lập định dạng font chữ
					$mail->CharSet = "utf-8";
					
						$body = '<table style="width: 600px;margin: auto;text-align: center;font-size: 14px;line-height: 1.5;color: #272727; background: #f3f3f3;padding: 10px;border: 1px solid #d2d2d2; font-family:Arial, Helvetica, sans-serif;">';
					    $body .= '<tr>
								<td colspan="2"><img widh="80%" src="http://'.$config_url.'/'._upload_hinhanh_l.$row_banner['photo'].'" /></td>
								</tr>';
						$body .= '<tr style="font-weight: bold;font-size: 20px;">
									<td colspan="2">QUÀ MIỀN TRUNG</td>
								</tr>';
						$body .= '<tr>
									<td colspan="2">ĐC: '.$company['diachi'].'</td>
								</tr>';
						$body .= '<tr>
									<td colspan="2">ĐT: '.$company['dienthoai'].''.'</td>
								</tr>';
						$body .= '<tr style="font-weight: bold;font-size: 30px;">
									<td colspan="2">HÓA ĐƠN BÁN HÀNG</td>
								</tr>';
						$body .= '<tr style="text-align: left;">
									<td>Ngày: '.make_date(time()).'</td>
									<td>Số phiếu thu: '.$madonhang.'</td>
								</tr>';
						$body .= '<tr style="text-align: left;">
									<td>Khách hàng: '.$hoten.'</td>
									<td>Địa chỉ: '.$diachi.'</td>
								</tr>';
						$body .= '<tr style="text-align: left;">
									<td>Điện thoại: '.$dienthoai.'</td>
									<td>Email: '.$email.'</td>
								</tr>';
								
						
						#------------Chi tiết đơn hàng---------------------
						$body.='<tr>
								<td colspan="2">
								<table style="border: 1px dashed #6b6b6b;border-collapse: collapse; width: 100%; line-height: 2; margin:6px 0; background:#fdfdfd;">
									<tr>
										<th style="border: 1px dashed #6b6b6b;">STT</th>
										<th style="border: 1px dashed #6b6b6b;">Mặt hàng</th>
										<th style="border: 1px dashed #6b6b6b;">Số lượng</th>
										<th style="border: 1px dashed #6b6b6b;">Đơn giá</th>
										<th style="border: 1px dashed #6b6b6b;">T.Tiền</th>
									</tr>';
									
							$max=count($_SESSION['cart']);
							for($i=0;$i<$max;$i++){
								$pid=$_SESSION['cart'][$i]['productid'];
								$size=$_SESSION['cart'][$i]['size'];
								$mausac=$_SESSION['cart'][$i]['mausac'];
								$q=$_SESSION['cart'][$i]['qty'];
								$pmasp=get_code($pid);					
								$pname=get_product_name($pid);
								$pphoto=get_product_photo($pid);
												
								if($q==0) continue;
								
								$body.= '<tr>';
								$body.='<td style="border: 1px dashed #6b6b6b;">'.($i+1).'</td>';
								$body.='<td style="border: 1px dashed #6b6b6b;">'.$pname.'</td>';	
								$body.='<td style="border: 1px dashed #6b6b6b;">'.$q.'</td>';
								$body.='<td style="border: 1px dashed #6b6b6b;">'.number_format(get_price($pid),0, ',', '.').' đ</td>';
								$body.='<td style="border: 1px dashed #6b6b6b;">'.number_format(get_price($pid)*$q,0, ',', '.').' đ</td>';
								$body.='</tr>';
								
								
							}
							$body.='<tr>
									<th  colspan="4" style="border: 1px dashed #6b6b6b;">Tổng tiền</th>
									<th style="border: 1px dashed #6b6b6b;">'.number_format(get_order_total(),0, ',', '.').' đ</th>
									
								</tr>';
							
							$body.='</table></td></tr>';
						}
						$body .= '<tr style="color:#000; text-align:left; font-style:bold;"><td colspan="2">Ghi chú: '.$noidung.'</td></tr>';
						$body.='<tr style="color:red; text-align:left; font-style:italic;">
        	<td colspan="2">*  Cảm ơn Quí khách đã mua hàng tại website, chúng tôi sẽ liên hệ và gởi hàng trong thời gian sớm nhất!</td>
        </tr>';
				   $body.='</table>';
				   #------------Chi tiết đơn hàng---------------------
				   

		
						$mail->Body = $body;
						$_SESSION['cart']=0;
						unset($_SESSION['cart']);
						if($mail->Send())
						{
							
							transfer("Bạn đã đặt hàng thành công.<br> Chúng tôi sẽ liên hệ với bạn sớm nhất.<br>Mã đơn hàng là: ".$madonhang, "http://".$config_url);
						}
						else
							transfer("Bạn đã đặt hàng thành công.<br> Chúng tôi sẽ liên hệ với bạn sớm nhất.<br>Mã đơn hàng là: ".$madonhang, "http://".$config_url);
						}
            }
			else{
				transfer("Đơn hàng của bạn chưa có sản phẩm<br>Vui lòng chọn sản phẩm để đặt hàng<br>Cảm ơn", "http://".$config_url);
			}
		}
		else
			transfer("Xin lỗi quý khách.<br>Hệ thống bị lỗi, xin quý khách thử lại.", "http://".$config_url);	
		}
	}
	else
	{
		transfer("Bạn chưa mua sản phẩm nào.Vui lòng chọn mua sản phẩm.<br/>Cảm Ơn!!!.", "index.html");
	}
?>

