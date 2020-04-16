<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
$name=$_POST["name"];
$phone=$_POST["phone"];
$quantity =$_POST["quantity"];
$location=$_POST["location"];
$host='localhost';
$dbname='registration';
$dbuser='regadmin';
$dbpass='reg';
$dbConnect=new PDO('mysql:host='.$host.';dbname='.$dbname,$dbuser,$dbpass);
$dbConnect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$queryOne = $dbConnect->prepare("SELECT * FROM receive WHERE receiveName=? OR receivePhone =? OR receiveQuantity =? OR receiveLocation =?");
$queryOne->bindValue(1,$name);
$queryOne->bindValue(2,$phone);
$queryOne->bindValue(3,$quantity);
$queryOne->bindValue(4,$location);
try{
$queryOne->execute();
$result = $queryOne->rowCount();
if($result==0){
$query=$dbConnect->prepare("INSERT INTO receive(receiveName, receivePhone, receiveQuantity, receiveLocation) VALUES(?,?,?,?)");
$query->bindValue(1,$name);
$query->bindValue(2,$phone);
$query->bindValue(3,$quantity);
$query->bindValue(4,$location);
try{
	$result=$query->execute();
	if($result==true){
		echo "Your details are successfully entered.";
	}
	else
	{
		echo "failed";
	}
}
catch(PDOException $e)
{
	die($e->getMessage());
}
}
else
{
echo "Same details already exists";
}
}
catch(PDOException $e)
{
	die($e->getMessage());
}
?>