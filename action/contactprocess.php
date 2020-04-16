<?php
$name=$_POST["name"];
$phone=$_POST["phone"];
$email =$_POST["email"];
$city=$_POST["city"];
$message=$_POST["message"];
$host='localhost';
$dbname='registration';
$dbuser='regadmin';
$dbpass='reg';
$dbConnect=new PDO('mysql:host='.$host.';dbname='.$dbname,$dbuser,$dbpass);
$dbConnect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$query=$dbConnect->prepare("INSERT INTO contact(contactName, contactPhone, contactEmail, contactCity, contactMessage) VALUES(?,?,?,?,?)");
$query->bindValue(1,$name);
$query->bindValue(2,$phone);
$query->bindValue(3,$email);
$query->bindValue(4,$city);
$query->bindValue(5,$message);
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
?>