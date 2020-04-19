<?php
/*
 * @Author: Alin Zhang
 * @Date: 2020-02-15 17:26:37
 * @LastEditor: Alin Zhang
 * @LastEditTime: 2020-04-18 22:14:17
 * @Description: file content
 */
// Check for empty fields
// require("smtp.php"); 

if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// $smtpserver = "smtp.qq.com";//SMTP服务器 
// $smtpserverport = "465";//SMTP服务器端口 
// $smtpusermail = "XXX@qq.com";//SMTP服务器的用户邮箱 
// $smtpemailto = "AAA@qq.com";//发送给谁 
// $smtpuser = "XXX@qq.com";//SMTP服务器的用户帐号 
// $smtppass = "666";//SMTP服务器的用户密码 
// $mailsubject = "Website Contact Form:  $name";//邮件主题 
// $mailbody = $message;//邮件内容 
// $mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件 
// $smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证. 
// $smtp->debug = TRUE;//是否显示发送的调试信息 
// $smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype); 

// Create the email and send the message
$to = "alinzhang1001@outlook.com"; // Add your email address inbetween the "" replacing yourname@yourdomain.com - This is where the form will send a message to.
$subject = "Website Contact Form: $name";
$body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email\n\nPhone: $phone\n\nMessage:\n$message";
$header = "From: noreply@Alinxl.io"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$header .= "Reply-To: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
