<html>
<head>
<title>Airline</title>
<link href="css.css" rel="stylesheet">
<link href="css2.css" rel="stylesheet">
</head>
<body>
<h1>Airline Management System</h1>
<div id=navlist><ul>
<li><a href="airport.php">Airports</a></li>
<li id=active><a href="flight_crew.php">Flight Crew</a></li>
<li><a href="crew_master.php">Crew Details</a></li>
<li><a href="flight_master.php">Flight Details</a></li>
<li><a href="flight_schedule.php">Flight Schedule</a></li>
<li><a href="index.php">Log out</a></li>
</ul></div>
<?php
$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
mysql_select_db("airline",$con) or die(mysql_error()+" occurs");

 $attray=["flight_id", "member_id", "dep_airport_id", "departure_date"];
 $colray=["Flight Id", "Member Id", "Source Airport", "Date of departure"];
 
 $cols=$_POST["cols"];
 $attribute=$_POST["attribute"];
 $value=$_POST["value"];
 $symbol="=";
 $i=0;
 $list="";
 if(count($cols)>1){
 do{
	$list.=$attray[$cols[$i]].",";
	$i++;
 }while($i<=(count($cols))-2);
 }
 $list.=$attray[$cols[$i]];
 $query="select ".$list." from `flight_crew` where `".$attribute."` ".$symbol." '".$value."';";
 $result=mysql_query($query);
 if ($result){
 echo '<h2>Report Generated:</h2>';
 }else{
  echo "<h2>".mysql_error()."</h2>";
 }
echo "
<table border = 1 align=Center>
<tr>";
 for($i=0; $i<count($cols); $i++){
	 echo "<th>".$colray[$cols[$i]]."</th>";
 }
 while($record=mysql_fetch_array($result))
{
 echo "<tr>";
 for($i=0; $i<count($cols); $i++){
	 echo "<td>".$record[$attray[$cols[$i]]]."</th>";
 }
 echo "</tr>";
}
echo "</table><br/><br/>";
mysql_close($con) or die(mysql_error()+" occurs");
?>
</body></html>