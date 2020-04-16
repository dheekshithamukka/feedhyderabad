<?php
session_start();
if(isset($_SESSION['email'])){
header('Location: donateandreceive.php');
}
else{
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
<script src="https://kit.fontawesome.com/14de6c1eab.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/14de6c1eab.js"></script>
	<script src="js/fh.js"></script>
	
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
	<div class="topBar">
		<div class="logoHolder">
			<img src="http://static1.squarespace.com/static/58b9fd1dcd0f68842cb5c878/t/58ba07caf5e23191657c1f30/1488586705935/Fhfood.png?format=1500w"></img>
		</div>
		<div class="fh">
			<p class="fh">Feed Hyderabad</p>
			
		</div>

		<div class="quote">
			
			<p class="quote"> - Let nothing be wasted...</p>
		</div>
		<div class="hamburger">
		<a onclick="hamburgermenu();"><i class="fa fa-bars" aria-hidden="true"></i></a>
		<div class="hamburgermenu">
		<a><li><span>HOME</span></li></a>
		<a><li><span>ABOUT US</span></li></a>
		<a><li><span>LOGIN<span></li></a>
		<a><li><span>REGISTER</span></li></a>
		</div>
	</div>

		<div class="menuSection">

			<a href="index.php"><li><span class="home">HOME</span></li></a>
			<a href="aboutus.html"><li><span class="aboutUs">ABOUT US</span></li></a>
			<a href="login.php" onclick="login()" id="login"><li><span class="login">LOGIN</span></li></a>
			<a href="register.php"><li><span class="register">REGISTER</span></li></a>
		</div>
	</div>
	<div class="image">
		<div class="bimage">
			<div class="quote1">
				<p class="q1">Feeding hungry one's is not a charity, it is our social responsibility.</p>
			</div>
		</div>
	</div>
	<div class="quote2">
		<p class="q2">Everyone deserves a healthy, fresh food..</p>
	</div>
	<div class="sideImages">
		<a><span class="image1"><img src="http://3.bp.blogspot.com/-_bqsp9ev9G0/VYgAdKFBULI/AAAAAAAAAzk/P2kK26mOXfo/s1600/If-You-Cant-Feed-A-Hundred-People%252C-Then-Feed-Just-One.jpg"></img></span></a>
		<a><span class="image2"><img src="https://i.pinimg.com/236x/48/56/ca/4856caa9c53b94a8424e90dfab6ff036--giving-quotes-charity-philosophy-products.jpg"></img></span></a>
		<a><span class="image3"><img src="https://i.pinimg.com/236x/c2/c8/bc/c2c8bc708a70404e04fa1f9cc1608ed9--food-drive-teacher-resources.jpg"></img></span></a>
				
	</div>
	<div class="image1">
		<div class="bimage1">
			<div class="quote3">
				<p class="q3">Food wasted regularly??</p>
			</div>
			<div class="donateButton">
				<a href="donate.php"><button class="button">DONATE</button></a>
			</div>
		</div>
	</div>
	<div class="contact">
		<p class="contact1">Contact Us</p>
		<div class="input1">
		<form onsubmit="return false;">
			<input type="text" placeHolder="Name*" id="name" required/><br/><br/>
			<input type="tel" placeHolder="Phone*" id="phone" required/><br/><br/>
			<input type="email" placeHolder="Email Id*" id="email" required/><br/><br/>
			<input type="text" placeHolder="City, State*" id="city" required/><br/><br/>
			<textarea id="message" rows="10" cols="30">Message</textarea><br/><br/>
  			<button onclick="send();">Send message</button>
		</form>
<div class="formProcessing"></div>
<div class="formResult"></div>
<script>
function send(){
var name = $('#name').val();
var phone = $('#phone').val();
var email = $('#email').val();
var city = $('#city').val();
var message = $('#message').val();
if(name != "" && phone != "" && email != "" && city != "" && message != ""  ){
$.ajax({
type: "POST",
url: "action/contactprocess.php",
data: "name="+name+"&phone="+phone+"&email="+email+"&city="+city+"&message="+message ,
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
$('.formResult').fadeIn('fast').html("");
}
}
</script>
		<div class="info">
			<p>Email Id: feedhyderabad@gmail.com</p>
			<p>Phone: 9876543210</p>
			
		</div>
	</div>
	


</body>
</html>

<?php
}
?>