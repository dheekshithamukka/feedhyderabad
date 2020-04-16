<head>
<link rel="stylesheet" href="../css/tablestyle.css">
</head>
<?php
$host='localhost';
$dbname='registration';
$dbuser='regadmin';
$dbpass='reg';
$dbConnect=new PDO('mysql:host='.$host.';dbname='.$dbname,$dbuser,$dbpass);
$dbConnect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$query=$dbConnect->prepare("SELECT * FROM donate");
try{
	$query->execute();
	$result=$query->fetchAll();
?>
<table id="get">
<thead>
<center><tr><th> Name </th></center>
<center><th> Phone </th></center>
<center><th> Quantity of food </th></center>
<center><th> Location </th></tr></center>
</thead>
<tbody>
<?php
foreach($result as $res)
{
?>
<tr>
<center><td><?php echo $res['donateName']; ?></td></center>
<center><td><?php echo $res['donatePhone']; ?></td></center>
<center><td><?php echo $res['donateQuantity']; ?></td></center>
<center><td><?php echo $res['donateLocation']; ?></td></center>
</tr>
<?php
}
?>
</tbody>
</table>
<br/>
<center><a href="../receive.php" class="button">Receive</a></center>
<?php
}
catch(PDOException $e)
{
	die($e->getMessage());
}
?>