<html>

<head>
  <link rel="stylesheet" href="css/donate.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <title>Sign in</title>
</head>

<body>
  <div class="main">
    <p class="sign" align="center">To receive</p>
    <form onsubmit="return false;">
      <input id="name" type="text" align="center" placeholder="Name">
      <input id="phone" type="tel" align="center" placeholder="Phone Number">
      <input id="quantity" type="number" align="center" placeholder="Quantity of food">
      <input id="location" type="text" align="center" placeholder="Location">
      <button onclick="receiveForm()">Submit</button>
<div class="formProcessing"></div>
<div class="formResult"></div>

</div>
<script>
function receiveForm(){
var name = $('#name').val();
var phone = $('#phone').val();
var quantity = $('#quantity').val();
var location = $('#location').val();
if(name != "" && phone != "" && quantity != "" && location != "")
{
$.ajax({
type: "POST",
url: "action/receiveprocess.php",
data: "name="+name+"&phone="+phone+"&quantity="+quantity+"&location="+location ,
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
else
{
$('.formResult').fadeIn('fast').html("Please fill all the details correctly");
}
}

</script>
</body>
</html>