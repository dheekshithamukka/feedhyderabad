<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/register.css" />
</head>
<body>
<div class=bimage>
<div class="container">
    <section id="content">
        <form onsubmit="return false;">
            <h1>Register Form</h1>
            <div>
                <input type="text" placeholder="Enter your Name" required id="name" />
            </div>
            <div>
                <input type="tel" placeholder="Enter your phone number" required id="phone" />
            </div>
	    <div>
                <input type="email" placeholder="Enter your email-id" required id="email" />
            </div>
	    
	    <div>
                <input type="password" placeholder="Enter password" required id="password" />
            </div>
	    <div>
                <input type="password" placeholder="Repeat password" required id="pswrepeat" />
            </div>
	    <div>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    
    
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a></p>
	    </div>
            <div>
                <button onclick="registrationForm()">Register</button>
		<a href="index.php"><input type="submit1" value="Cancel" /></a>
              	
            </div>
        </form><!-- form -->
<div class="formProcessing"></div>
<div class="formResult"></div>
<script>
function registrationForm(){
var name = $('#name').val();
var phone = $('#phone').val();
var email = $('#email').val();
var password = $('#password').val();
var pswrepeat = $('#pswrepeat').val();
if(name != "" && phone != "" && email != "" && password != "" && pswrepeat != ""  ){
$.ajax({
type: "POST",
url: "action/regprocess.php",
data: "name="+name+"&phone="+phone+"&email="+email+"&password="+password+"&pswrepeat="+pswrepeat ,
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
else{
$('.formResult').fadeIn('fast').html("Please fill all the details correctly");
}
}
</script>
</body>
</html>