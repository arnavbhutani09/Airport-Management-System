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
<li><a href="crew_master.php">Crew Details</a></li>
<li><a href="flight_master.php">Flight Details</a></li>
<li id=active><a href="flight_schedule.php">Flight Schedule</a></li>
<li><a href="index.php">Log out</a></li>
</ul></div><br><br>

<fieldset><legend>Flight_Schedule : Update</legend>
<form action="" method=post>
<br>
<label>Current Flight ID : </label>
<select name= "flight_id">
		<?php
		$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
		mysql_select_db("airline",$con) or die(mysql_error()+" occurs");
		$query="select flight_id from flight_master";
		$data=mysql_query($query);
		while($record=mysql_fetch_array($data)){
			echo "<option value=\"".$record["flight_id"]."\">".$record["flight_id"]."</option>";
		} 
		mysql_close($con) or die(mysql_error()+" occurs");
		?>
</select><br><br><br>

<label>Current Departure Date : </label>
<input type="date" name= "dep_date" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
<br><br><br>

<label>Current Source Airport : </label>
<select name= "source_airport_id" required>
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
</select><br><br><br>


<label>Update: </label>
<select name= "attribute">
		<option value="flight_id">Flight Id</option>
		<option value="dep_date">Date of departure</option>
		<option value="dep_time">Departure Time</option>
		<option value="source_airport_id">Source Airport</option>
		<option value="dest_airport_id">Destination Airport</option>
		<option value="no_of_passengers">Passengers</option>
		<option value="status">Status</option>
		<option value="remarks">Remarks</option>
</select><br><br><br>

<label>New Value : </label><input type="text" name="new"><br><br><br>

<input type="submit" value="Update"/>
</form></fieldset>

<h2>Flight Schedule</h2>

<?php
$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
mysql_select_db("airline",$con) or die(mysql_error()+" occurs");

if($_POST)
{
		$flight_id=$_POST["flight_id"];
		$dep_date=$_POST["dep_date"];
		$source_airport_id=$_POST["source_airport_id"];

		$attribute=$_POST["attribute"];
		$new=$_POST["new"];
		$query="update flight_schedule set ".$attribute."=\"".$new."\" where flight_id=\"".$flight_id."\"and dep_date=\"".$dep_date."\"and source_airport_id=\"".$source_airport_id."\";";

		$result=mysql_query($query);

		if ($result)
		{
		echo '<h2>Your query has been executed. Successfully Updated</h2>';
		}
		else{
			echo "<h2>".mysql_error()."</h2>";
			}
}

$query="select * from flight_schedule";
$data=mysql_query($query);
echo "
<table border = 1 align=Center>
<tr>
<th>Flight Id</th>
<th>Departure Date</th>
<th>Departure Time</th>
<th>Source Airport</th>
<th>Destination Airport</th>
<th>Passengers</th>
<th>Status</th>
<th>Remarks</th>
</tr>";
while($record=mysql_fetch_array($data)){
	echo "<tr>";
	echo "<td>".$record["flight_id"];
	echo "<td>".$record["dep_date"];
	echo "<td>".$record["dep_time"];
	echo "<td>".$record["source_airport_id"];
	echo "<td>".$record["dest_airport_id"];
	echo "<td>".$record["no_of_passengers"];
	echo "<td>".$record["status"];
	echo "<td>".$record["remarks"];
	echo "</tr>";
}
echo "</table><br/><br/>";
mysql_close($con) or die(mysql_error()+" occurs");
?>

<a href="flight_schedule.php"><button id=backbutton>Back</button></a><br><br>
</body>
</html>