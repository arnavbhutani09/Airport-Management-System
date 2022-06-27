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
<table width="100%">
<tr><td><fieldset><legend>Flight Crew: Generate Report</legend>
<form action="flight_crew_reportp.php" method=post>
<label>Which coloumns do you want to view?</label><br><br>
<select name="cols[]" multiple="multiple">
<option value=0>Flight Id</option>
<option value=1>Member Id</option>
<option value=2>Source Airport</option>
<option value=3>Date of departure</option>
</select><br/><br>
<label>The criterion of selection is:</label><br><br>
<select name="attribute">
<option value="flight_id">Flight Id</option>
<option value="member_id">Member Id</option>
<option value="dep_airport_id">Source Airport</option>
<option value="departure_date">Date of departure</option>
</select>&emsp;=&emsp;
<!--
<select name="symbol">
<option value="="> = </option>
<option value=">"> > </option>
<option value="<"> < </option>
</select>
-->
<input type="text" name="value" default="value"><br><br>
<input type="submit" value="Submit"/>
</form></fieldset>
</td></tr></table>
<!-- *************************************************** -->
<a href="flight_crew.php"><button id=backbutton>Back</button></a><br><br>

</body></html>

