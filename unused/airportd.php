<html>
<head>
<title>Airline</title>
<link href="css.css" rel="stylesheet">
<link href="css2.css" rel="stylesheet">

<style type="text/css">
	#backbutton{
	margin-top: 10px;
	padding:10px;
	font-size:25px;
	padding-left:5px;
	padding-right:5px;
	border-radius: 5px;
	margin-left: 30%;
}
</style>

</head>
<body>
<h1>Airline Management System</h1>
<div id=navlist>
<ul>
<li id=active><a href="airport.php">Airports</a></li>
<li><a href="flight_crew.php">Flight Crew</a></li>
<li><a href="crew_master.php">Crew Details</a></li>
<li><a href="flight_master.php">Flight Details</a></li>
<li><a href="flight_schedule.php">Flight Schedule</a></li>
<li><a href="login.php">Log out</a></li>
</ul></div><br><br>


<fieldset><legend>Airport: Delete</legend>
<form action="" method=post>
<br>
<label>Airport id: </label><select name= "airport_id">

<?php
$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
mysql_select_db("airline",$con) or die(mysql_error()+" occurs");
$query="select airport_id from airport";
$data=mysql_query($query);
while($record=mysql_fetch_array($data)){
	echo "<option value=\"".$record["airport_id"]."\">".$record["airport_id"]."</option>";
} 
mysql_close($con) or die(mysql_error()+" occurs");
?>
</select><br><br>


<input type="submit" value="Delete"/>
</form></fieldset>

<h2>Airport</h2>

<?php 
//Opens connection to server
$dbcon = mysql_connect('localhost','root', '');
if (!$dbcon){
	die('Connection Error' .mysql_error());}
//Select database
$dbselect = mysql_select_db('airline', $dbcon);
if(!$dbselect){
	die('Cant connect: ' .mysql_error());
}

if($_POST)
{
	$airport_id=$_POST["airport_id"];
	$query="delete from airport where airport_id='$airport_id'";
	$result=mysql_query($query);
	if ($result){
	echo "<h2>Successfully Deleted</h2>";
	}else{
		echo "<h2>".mysql_error()."</h2>";
	}
}

$query="select * from airport";
$data=mysql_query($query);
echo "
<table border = 1 align=Center>
<tr>
<th>Airport Id</th>
<th>Airport Name</th>
<th>Location</th>
<th>Runways</th>
</tr>";
while($record=mysql_fetch_array($data)){
	echo "<tr>";
	echo "<td>".$record["airport_id"];
	echo "<td>".$record["airport_name"];
	echo "<td>".$record["location"];
	echo "<td>".$record["runways"];
	echo "</tr>";
}
echo "</table><br/><br/>";

mysql_close($dbcon)
?>

<a href="crew_master.php"><button id=backbutton>Back</button></a><br><br>
</body>
</html>