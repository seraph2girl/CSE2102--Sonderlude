<!DOCTYPE html>
<html>
<body>
<table width="600" border="1" cellspacing="1">
<tr>
 <th>Court_ID</th><br>
 <th>Inmate_ID</th><br>
 <th>Remand_ID</th><br>
 <th>Date</th><br>


<?php
$servername = "localhost";
$username = "mdk";
$password = "KLA19bk50.";
$dbname = "GPS_IMIS

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


$sql = "SELECT Court_ID, Inmate_ID, Remand_ID, Date FROM courtdate";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row

    while($courtdate = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$courtdate['Court_ID']."</td>";
	echo "<td>".$courtdate['Inmate_ID']."</td>";
	echo "<td>".$courtdate['Remand_ID']."</td>";
	echo "<td>".$courtdate['Date']."</td>";

	echo "</tr>";

    }
} else {
    echo "0 results";
}

$conn->close();
?>
</table>
</body>
</html>
