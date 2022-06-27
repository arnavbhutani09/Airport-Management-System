<html>
<head>
<title>Airline</title>
<link href="css.css" rel="stylesheet">
<link href="css2.css" rel="stylesheet">
<style>
th{
	width:100px;
}
table{
	margin-left:160px;
}
h2{
	text-decoration:none;
	font-size:30px;
}
</style>

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
<li ><a href="flight_crew.php">Flight Crew</a></li>
<li><a href="crew_master.php">Crew Details</a></li>
<li id=active><a href="flight_master.php">Flight Details</a></li>
<li><a href="flight_schedule.php">Flight Schedule</a></li>
<li><a href="index.php">Log out</a></li>
</ul></div><br><br>


<fieldset><legend>Flight_Details: Update</legend>
<form action="" method="POST">
<br>
<label>Current Flight Number: </label><select name= "flight_id">
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
mysql_select_db("airline",$con) or die(mysql_error()+" occurs");
$query="select flight_id from flight_master;";
$data=mysql_query($query);
while($record=mysql_fetch_array($data)){
	echo "<option value=\"".$record["flight_id"]."\">".$record["flight_id"]."</option>";
} 
mysql_close($con) or die(mysql_error()+" occurs");
?></select><br><br>

<label>Update: </label><select name= "attribute">
<option value="flight_id">Flight Id</option><option value="airline">Airline</option>
<option value="class">Class</option><option value="Capacity">Capacity</option></select><br><br>

<label>New Value: </label><input type="text" name="new"><br><br>

<input type="submit" value="Update"/>
</form></fieldset>
<br><br><br><br>

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

if($_POST){
$flight_id=$_POST["flight_id"];
$attribute=$_POST["attribute"];
$new=$_POST["new"];
$query="update flight_master set ".$attribute."=\"".$new."\" where flight_id=\"".$flight_id."\";";
$result=mysql_query($query);
if ($result){
echo '<h2>Updation Successful.</h2>';
}else{
	echo "<h2>".mysql_error()."</h2>";
}
}

$query="select * from flight_master;";
$data=mysql_query($query);
echo "
<table border = 1>
<tr>
<th>Flight Id</th>
<th>Airlines</th>
<th>Class Type</th>
<th>Capacity</th>
</tr>";
while($record=mysql_fetch_array($data)){
	echo "<tr>";
	echo "<td>".$record["flight_id"];
	echo "<td>".$record["airline"];
	echo "<td>".$record["class"];
	echo "<td>".$record["capacity"];
	echo "</tr>";
}
echo "</table><br/><br/>";

mysql_close($dbcon)
?>


<a href="flight_master.php"><button id=backbutton>Back</button></a><br><br>
</body>
</html>