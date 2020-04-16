<?php
session_start();
$emailid = $_POST['emailid'];
$pw = $_POST['pw'];
$host = 'localhost';
// MySQL Database Name
$dbname = 'registration';
// MySQL Database User
$dbuser = 'regadmin';
// MySQL Database Password
$dbpass = 'reg';
$dbConnect = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $dbuser, $dbpass);
$dbConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = $dbConnect->prepare("SELECT * FROM registrationForm WHERE regEmail = ? AND regPassword = ?");
$query->bindValue(1, $emailid);
$query->bindValue(2, $pw);
try{
$query->execute();
$result=$query->fetch();
if($result['regEmail'] == $emailid && $result['regPassword'] == $pw){
$_SESSION['email'] = $emailid;
?>
<script>
window.location = "donateandreceive.php";
</script>
<?php
}
else{
echo "Email and password does not match";
}
}
catch(PDOException $e){
$e->getMessage();
}
?>