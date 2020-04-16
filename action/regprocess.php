<?php
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$password = $_POST["password"];
$pswrepeat = $_POST["pswrepeat"];
$host='localhost';
$dbname='registration';
$dbuser='regadmin';
$dbpass='reg';
$dbConnect=new PDO('mysql:host='.$host.';dbname='.$dbname,$dbuser,$dbpass);
$dbConnect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$queryOne = $dbConnect->prepare("SELECT * FROM registrationForm WHERE regPhone = ? OR regEmail = ?");
$queryOne->bindValue(1,$phone);
$queryOne->bindValue(2,$email);
try{
$queryOne->execute();
$result = $queryOne->rowCount();
if($result == 0){
$query = $dbConnect->prepare("INSERT INTO registrationForm(regName, regPhone, regEmail, regPassword, regPswrepeat) VALUES(?,?,?,?,?)");
$query->bindValue(1,$name);
$query->bindValue(2,$phone);
$query->bindValue(3,$email);
$query->bindValue(4,$password);
$query->bindValue(5,$pswrepeat);
try{
$result = $query->execute();
if($result == true){
echo "Your details are successfully registered";
?>
<a href="donateandreceive.php"></a>
<?php
}
else{
echo "failed";
}
}
catch(PDOException $e){
die($e->getMessage());
}
}
else{
echo "Mobile number or email already exists";
}
}
catch(PDOException $e){
die($e->getMessage());
}
?>