<!DOCTYPE html>
<html>
<body>
<table width="600" border="1" cellspacing="1">
<tr>
 <th>Incident_ID</th><br>
 <th>Inmate_ID</th><br>
 <th>Statement Officer_On_Duty</th><br>
 <th>Date</th><br>
 <th>Time</th><br>
 <th>Action</th><br>
 <th>Victim</th><br>
 <th>Offence</th><br>

<tr>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gps_imis";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT Incident_ID, Inmate_ID, Statement Officer_On_Duty, Date, Time, Action, Victim, Offence FROM incidents";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
	
    while($incidents = $result->fetch_assoc()) {
	echo "<tr>";
	echo "<td>".$incidents['Incident_ID']."</td>";
	echo "<td>".$incidents['Inmate_ID']."</td>";
	echo "<td>".$incidents['Statement Officer_On_Duty']."</td>";
	echo "<td>".$incidents['Date']."</td>";
	echo "<td>".$incidents['Time']."</td>";
	echo "<td>".$incidents['Action']."</td>";
	echo "<td>".$incidents['Victim']."</td>";
	echo "<td>".$incidents['Offence']."</td>";
	
	
    }
} else {
    echo "0 results";
}

$conn->close();
?> 
</table>
</body>
</html>