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
<li><a href="flight_crew.php">Flight Crew</a></li>
<li id=active><a href="crew_master.php">Crew Details</a></li>
<li><a href="flight_master.php">Flight Details</a></li>
<li><a href="flight_schedule.php">Flight Schedule</a></li>
<li><a href="login.php">Log out</a></li>
</ul></div><br><br>


<fieldset><legend>Crew_master: Delete</legend>
<form action="" method=post>
<br>
<label>Member id: </label><select name= "member_id">
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
mysql_select_db("airline",$con) or die(mysql_error()+" occurs");
$query="select member_id from crew_master;";
$data=mysql_query($query);
while($record=mysql_fetch_array($data)){
	echo "<option value=\"".$record["member_id"]."\">".$record["member_id"]."</option>";
} 
mysql_close($con) or die(mysql_error()+" occurs");
?></select><br><br>


<input type="submit" value="Delete"/>
</form></fieldset>

<h2>Crew_master</h2>

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
	$member_id=$_POST["member_id"];
	$query="delete from crew_master where member_id='$member_id'";
	$result=mysql_query($query);
	if ($result){
	echo "<h2>Successfully Deleted</h2>";
	}else{
		echo "<h2>".mysql_error()."</h2>";
	}
}
$query="select * from crew_master;";
$data=mysql_query($query);
echo "
<table border = 1 align=Center>
<tr>
<th>Member id</th>
<th>Member name</th>
<th>Designation</th>
<th>Mobile number</th>
<th>Email</th>
</tr>";
while($record=mysql_fetch_array($data)){
	echo "<tr>";
	echo "<td>".$record["member_id"]."</td>";
	echo "<td>".$record["member_name"]."</td>";
	echo "<td>".$record["designation"]."</td>";
	echo "<td>".$record["mobile"]."</td>";
	echo "<td>".$record["email"]."</td>";
	echo "</tr>";
}
echo "</table><br/><br/>";
mysql_close($dbcon)
?>

<a href="crew_master.php"><button id=backbutton>Back</button></a><br><br>
</body>
</html>