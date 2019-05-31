<?php if(!defined('_lib')) die("Error");

	error_reporting(E_ALL & ~E_NOTICE & ~8192);
	$config_url=$_SERVER["SERVER_NAME"].'';
	
	$config['database']['servername'] = 'localhost';
	$config['database']['username'] = 'root';
	$config['database']['password'] = '';
	$config['database']['database'] = 'quamientrung_db';
	$config['database']['refix'] = 'table_';
	
	$ip_host = 'smtp.gmail.com';
    $mail_port ='587';
	$mail_host = 'lienhe.thongbao@gmail.com';
	$pass_mail = 'Nhutrom@123';
    $email_nhan = 'minhnhutc2@gmail.com';

	$config['lang']=array(''=>'Tiếng Việt', 'en' => 'Tiếng Anh');#Danh sách ngôn ngữ hỗ trợ
	
	date_default_timezone_set('Asia/Ho_Chi_Minh');

?>