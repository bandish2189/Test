<?php
require_once("models/config.php");

//	mypr($_POST);
		
	$order = new Order();
	$mail_details = $order->mailOrder($_POST['order']);
	$order_details = $order->editOrder($_POST['order']);

	//mypr($mail_details);
	$user_session = $_SESSION['userCakeUser'];
	$company_id = $user_session->company['id'];
	
//	mypr($user);
	if($company_id == 1){
			$company_html = '<div class="head-left"><img src="img/hb.svg"/><p class="guj logo" style="margin-bottom:0px;">hotaaq^a ba`aokr</p></div>';
			$from_name = 'Hetarth Brokers';
		}elseif($company_id == 2){
			$company_html = '<div class="head-left"><img src="img/bb.svg"/><p class="guj logo" style="margin-bottom:0px;">BaagyaoSakumaar ba`aokr</p></div>';
			$from_name = 'Bhagyesh Brokers';
		}elseif($company_id == 3){
			$company_html = '<div class="head-left"><img src="img/br_new.svg"/><p class="guj logo" style="margin-bottom:0px;">BaagyaoSakumaar ramaNalaala</p></div>';
			$from_name = 'Bhagyesh Ramanlal Brokers';
		}
//exit;

    require_once('PHPMailer_v5.1/class.phpmailer.php'); //library added in download source.
	$fontstyle = "<style type='text/css'>
@font-face {
  font-family: 'Saumil_guj2';
  src:  url(data:application/x-font-woff;charset=utf-8;base64,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) format('woff');
  font-weight: normal;
  font-style: normal;
}
body {
  font-family: 'Saumil_guj2', Fallback, sans-serif;
}
</style>";
	$abc = $fontstyle.'<style type="text/css">@font-face {	font-family: "Saumil_guj2Normal";	src: url("fonts/riesling.eot");	src: local("Saumil_guj2 Normal"), local("Saumil_guj2"), url("http://swaggerunit.com/external_script/bkrs/Saumil_guj2.ttf") format("truetype");}body {  font-family: "Saumil_guj2Normal", Fallback, sans-serif;}</style><div class="span12 well">    <style>li {   list-style: outside none none;}.box li {    border: 1px solid rgb(22, 49, 91);    float: left;    text-align: center;    width: 24%;}.box h6 {    font-size: 14px;    margin: 0;    padding: 6px 0;}ul {    padding: 0;}	.detail h6 {    font-size: 15px;    line-height: 26px;    margin: 0;			}.box {    margin: 22px 0;   }.detail-left {    float: left;    width: 70%;}.detail span {    color: rgb(17, 53, 116);    font-size: 14px;}.detail-right {    float: right;	margin-right: 60px;}	.row {    margin: auto;    width: 1080px;}.clr{clear:both;}.head-left {    float: left;    width: 29%;}.section1 {    float: left;    margin-top: 85px;    width: 43%;}.head-right {    float: right;    width: 20%;	margin-right: 70px;}.head-right > h5 {    font-size: 15px;    line-height: 23px;    margin: 0;}.section1 .row {    margin: auto;    width: auto;}.name-eng > h1 {    color: rgb(17, 53, 116);    font-size: 39px;    margin-bottom: 13px;    margin-top: 0;    text-align: center;    word-spacing: 22px;}.name-eng > h2 {    color: rgb(17, 53, 116);   font-size: 35px;    margin-bottom: 10px;    margin-top: 0;    text-align: center;    word-spacing: 22px;}.name-guj > h1 {    margin-bottom: 0;    margin-top: 10px;    text-align: center;}.name-eng {    border-bottom: 2px dotted rgb(154, 163, 181);}.name-guj h4 {    margin-top: 13px;    text-align: center;}.stamp {    float: left;    width:600px;}.stamp li {    border: 1px solid rgb(17, 53, 116);    float: left;    height: 55px;    width: 240px;}.stamp  ul{margin:0;}.sign {    float: right;	margin-right:70px;}.stamp span {    font-size: 23px;    left: 7px;    position: relative;    top: 12px;}.guj {    font-family: Saumil_guj2 !important;    font-size: 24px;}.sign > h5 {    font-size: 20px;    position: relative;}td{ border:1px solid;}.guj.logo{	 font-size: 44px;    margin-top: 12px;	}	.noborder{ border:0px !important}img{ width:100%;}td p {	padding:4px;		}	.title td{ background-color:#B6B6B6;}	.title td p { color:#fff;}u{ line-height:36px;}		.datagrid table { border-collapse: collapse; text-align: left; width: 100%; } .datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 1px solid #8C8C8C; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }.datagrid table td, .datagrid table th { padding: 3px 10px; }.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8C8C8C), color-stop(1, #7D7D7D) );background:-moz-linear-gradient( center top, #8C8C8C 5%, #7D7D7D 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8C8C8C", endColorstr="#7D7D7D");background-color:#8C8C8C; color:#FFFFFF; font-size: 13px; font-weight: bold; border-left: 1px solid #A3A3A3; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: #7D7D7D; border-left: 1px solid #DBDBDB;font-size: 12px;font-weight: normal; }.datagrid table tbody .alt td { background: #EBEBEB; color: #7D7D7D; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }	</style>    	<div class="header" style="background:#f0f1a6 !important; padding:20px 0px;">    <div class="row">'.$company_html .'<div class="section1"><div class="row"><div class="name-guj"><h4>૫૩/૧, પહેલા માળે, માર્કેટ યાર્ડ, કલોલ (ઉ . ગુ) ૩૮૨૭૨૧.</h4></div>    </div></div><div class="head-right"><h5>ભાગ્યેશ પટેલ : ૯૮૨૪૦૫૮૨૩૩</h5><h5>રમણભાઇ પટેલ : ૯૩૭૪૨ ૩૫૨૬૦</h5><h5>મોબાઇલ નંબર : ૯૮૨૪૦૫૮૨૩૩</h5></div><div class="clr"></div></div></div><div class="section2"><div class="row"><div class="box guj datagrid" style="margin-right:60px;"><table  class="" width="100%" cellspacing="0" cellpadding="0">    <tr>      <td  width="40%"><p class="guj" style="font-size: 40px;    font-weight: bolder;">baIla naMbar : &nbsp;'. $order_details["t_no"].'</p></td>      <td colspan="2" class="noborder" ><p>&nbsp;</p></td>       <td width="320px;" ><p style="font-size: 40px; font-weight: bolder; width: 320px;  margin: 0px !important; padding: 0px !important; display: inherit;" class="guj">taarIKa : &nbsp;'. date_format(date_create($order_details["date"]),"d–m–Y").'</p></td>    </tr>    <tr>      <td ><p class="guj"><u>laonaarnaMu naama – gaama :</u><strong>    '. $order_details["buyer_name"].' </strong> – '. $order_details["buyer_gaam"].' </p></td>      <td class="noborder" ><p>&nbsp;</p></td>      <td class="noborder" colspan="2" rowspan="2" ><p>&nbsp;</p></td>    </tr>    <tr>      <td ><p class="guj"><u>vaocanaarnaMu naama – gaama :</u><strong> '. $order_details["seller_name"].' </strong> – '. $order_details["seller_gaam"].' </p></td>      <td class="noborder" ><p> </p></td>    </tr>    <tr class="title">      <td ><p align="center"><strong>માલ </strong><strong>ની </strong><strong>જાત</strong></p></td>      <td ><p align="center"><strong>બોરી</strong></p></td>      <td ><p align="center"><strong>ભાવ</strong></p></td>      <td ><p align="center"><strong>ભરતી</strong></p></td>    </tr>    <tr>      <td ><p class="guj">&nbsp; '. $order_details["product_name"].'</p></td>      <td ><p class="guj">&nbsp; '. $order_details["guni"].'</p></td>      <td ><p class="guj">&nbsp; '. $order_details["price"].'</p></td>      <td ><p class="guj">&nbsp; '. $order_details["bharti"].'</p></td>    </tr>      <tr>      <td class="noborder" valign="middle" colspan="4"><p class="guj">&nbsp;<strong> naaoMQa: </strong>  '. $order_details["note"].'</p></td>  </tr>  </table></div>    </div></div><div class="section3"><div class="row">    <div class="stamp"><ul><li><span>STAMPED</span></li><li></li><div class="clr"></div></ul></div><div class="sign"><h5>દલાલ  ની  સહી </h5></div><div class="clr"></div></div></div><h5 class="row note">ઉપરનો સોદો લેનાર વેચનાર બંધનકર્તા છે અને જે પાર્ટી સોદાના કરારનો  ભંગ કરશે તે પાર્ટી સોદાના નફા નુકસાન માટે જવાબદાર છે.</h5>';
    $msg  = $abc;
    $subj = $from_name.' Bill No : '.$_POST['order'];
    $to   = 'bandish2189@gmail.com';
    $from = 'bhagyesh.broker1982@gmail.com';
   
    global $user;
	$user[0]['SMTPSecure'] = 'ssl';
	$user[0]['Host'] = 'smtp.gmail.com';
	$user[0]['Port'] = 465;
	$user[0]['Username'] =  'bhagyesh.broker1982@gmail.com';
	$user[0]['Password'] = '9374235260';
	
//exit;	

	if(isset($mail_details)){
		if(isset($mail_details['buyer_mail'])){
			echo 'buyermail';
			 echo smtpmailer($mail_details['buyer_mail'],$from, $from_name ,$subj, $msg );
			}
		if(isset($mail_details['seller_mail'])){
			echo 'seller mail';
			 echo smtpmailer($mail_details['seller_mail'],$from, $from_name ,$subj, $msg);
			}
		mypr($mail_details);
		}
//exit;
   
    
    function smtpmailer($to, $from, $from_name = 'Bhagyeshkumar Ramanlal Brokers', $subject, $body, $is_gmail = true)
    {
        global $error,$user;
        $mail = new PHPMailer();
        
        $mail->IsSMTP();
        $mail->SMTPAuth = true; 
        
        $mail->SMTPSecure = $user[0]['SMTPSecure']; 
        $mail->Host = $user[0]['Host'];
        $mail->Port = $user[0]['Port'];  
        $mail->Username = $user[0]['Username'];  
        $mail->Password = $user[0]['Password'];   
        
        
        $mail->IsHTML(true);
        $mail->From=$from;
        $mail->FromName=$from_name;
        $mail->Sender=$from; // indicates ReturnPath header
        $mail->AddReplyTo($from, $from_name); // indicates ReplyTo headers
//        $mail->AddCC('cc@phpgang.com.com', 'CC: to phpgang.com');
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($to);
     //   $mail->AddAttachment("reload.png"); // $path: is your file path which you want to attach like $path = "reload.png";
        if(!$mail->Send())
        {
            $error = 'Mail error: '.$mail->ErrorInfo;
            return $error;
        }
        else
        {
            $error = 'Message sent!';
            return $error;
        }
    }
?>