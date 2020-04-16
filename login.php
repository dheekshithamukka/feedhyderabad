<?php
session_start();
if(isset($_SESSION['email'])){
header('Location: donateandreceive.php');
}
else{
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/login.css" />
</head>
<body>
<div class=bimage>
<div class="container">
    <section id="content">
        <form>
            <h1>Login Form</h1>
            <div>
                <input type="email" placeholder="Email-id" required="" id="emailid" />
            </div>
            <div>
                <input type="password" placeholder="Password" required="" id="pw" />
            </div>
            <div>
                <button type = "submit" onclick="login();">Login</button>
           
                <a href="register.php">Register</a>
            </div>
        </form><!-- form -->
<div class="formProcessing"></div>
<div class="formResult"></div>
<script>
function login(){
var emailid = $('#emailid').val();
var pw = $('#pw').val();
$.ajax({
type: "POST",
url: "action/loginaction.php",
data: "emailid="+emailid+"&pw="+pw,
cache: false,
beforeSend: function(){
$('.formProcessing').fadeIn('fast').html("Processing your request");
},
success: function(html){
$('.formProcessing').fadeOut('fast');
$('.formResult').fadeIn('fast').html(html);
},
});
}
</script>
</body>
</html>
<?php
}
?>