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
<li><a href="airport.php">Airports</a></li>
<li id=active><a href="flight_crew.php">Flight Crew</a></li>
<li><a href="crew_master.php">Crew Details</a></li>
<li><a href="flight_master.php">Flight Details</a></li>
<li><a href="flight_schedule.php">Flight Schedule</a></li>
<li><a href="login.php">Log out</a></li>
</ul></div><br><br>


<fieldset><legend>Flight_Crew: Delete</legend>
<form action="" method=post>
<br>
<label>Flight Number: </label><select name= "flight_id">
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
mysql_select_db("airline",$con) or die(mysql_error()+" occurs");
$query="select flight_id from flight_crew;";
$data=mysql_query($query);
while($record=mysql_fetch_array($data)){
	echo "<option value=\"".$record["flight_id"]."\">".$record["flight_id"]."</option>";
} 
mysql_close($con) or die(mysql_error()+" occurs");
?></select><br><br><br>

<label>Crew Id: </label><select name= "member_id">
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
mysql_select_db("airline",$con) or die(mysql_error()+" occurs");
$query="select member_id from flight_crew;";
$data=mysql_query($query);
while($record=mysql_fetch_array($data)){
	echo "<option value=\"".$record["member_id"]."\">".$record["member_id"]."</option>";
} 
mysql_close($con) or die(mysql_error()+" occurs");
?></select><br><br><br>

<label>Airport Id: </label><select name= "dep_airport_id">
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
mysql_select_db("airline",$con) or die(mysql_error()+" occurs");
$query="select dep_airport_id from flight_crew;";
$data=mysql_query($query);
while($record=mysql_fetch_array($data)){
	echo "<option value=\"".$record["dep_airport_id"]."\">".$record["dep_airport_id"]."</option>";
} 
mysql_close($con) or die(mysql_error()+" occurs");
?></select><br><br>
<input type="submit" value="Delete"/>
</form></fieldset>

<h2>Flight Crew</h2>

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
	$flight_id=$_POST["flight_id"];
	$member_id=$_POST["member_id"];
	$airport_id=$_POST["dep_airport_id"];
	$query="delete from flight_crew where flight_id=\"".$flight_id."\"and member_id=\"".$member_id."\"and dep_airport_id=\"".$airport_id."\";";
	$result=mysql_query($query);
	if ($result){
	echo '<h2>Deletion Successful.</h2>';
	}else{
		echo "<h2>".mysql_error()."</h2>";
}
}

$query="select * from flight_crew";
$data=mysql_query($query);
echo "
<table border = 1 align=Center>
<tr>
<th>Flight Id</th>
<th>Member Id</th>
<th>Designation</th>
<th>Source Airport</th>
<th>Date of departure</th>
</tr>";
while($record=mysql_fetch_array($data))
{
	echo "<tr>";
	echo "<td>".$record["flight_id"];
	echo "<td>".$record["member_id"];
	$query1="select designation from crew_master where member_id=\"".$record["member_id"]."\"";
	$data1=mysql_query($query1);
	$record1=mysql_fetch_array($data1);
	echo "<td>".$record1["designation"];
	echo "<td>".$record["dep_airport_id"];
	echo "<td>".$record["departure_date"];
	echo "</tr>";
}
echo "</table><br/><br/>";
mysql_close($dbcon)
?>

<a href="flight_crew.php"><button id=backbutton>Back</button></a><br><br>
</body>
</html>