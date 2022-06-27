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
<li><a href="flight_crew.php">Flight Crew</a></li>
<li><a href="crew_master.php">Crew Details</a></li>
<li id=active><a href="flight_master.php">Flight Details</a></li>
<li><a href="flight_schedule.php">Flight Schedule</a></li>
<li><a href="index.php">Log out</a></li>
</ul></div>

<?php
$con=mysql_connect("localhost","root","") or die(mysql_error()+" occurs");
mysql_select_db("airline",$con) or die(mysql_error()+" occurs");

 $attray=["flight_id", "airline", "class", "capacity"];
 $colray=["Flight Id", "Airlines", "Class Type", "Capacity"];
 
 $cols=$_POST["cols"];//0, 1, 3
 $attribute=$_POST["attribute"];//capacity
 $value=$_POST["value"];//100
 $symbol=$_POST["symbol"];//>
 $i=0;
 $list="";
 if(count($cols)>1){
 do{
	$list.=$attray[$cols[$i]].",";
	$i++;
 }while($i<=(count($cols))-2);
 }
 $list.=$attray[$cols[$i]];//flight_id,airline,capacity
 
 $query="select ".$list." from `flight_master` where `".$attribute."` ".$symbol." '".$value."';";
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
	 echo "<td>".$record[$attray[$cols[$i]]]."</td>";
 }
 echo "</tr>";
}
echo "</table><br/><br/>";
mysql_close($con) or die(mysql_error()+" occurs");
?>
</body></html>