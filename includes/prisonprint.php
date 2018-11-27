<!DOCTYPE html>
<html>
<body>
<table width="600" border="1" cellspacing="1">
<tr>
 <th>Inmate_ID</th><br>
 <th>LastName</th><br>
 <th>FirstName</th><br>
 <th>Date_Of_Birth</th><br>
 <th>Address</th><br>
 <th>Occupation</th><br>
 <th>Marital_Status</th><br>
 <th>Children</th><br>
 <th>Literacy</th><br>
 <th>Height</th><br>
 <th>Weight</th><br>
 <th>Colour</th><br>
 <th>Identification_Marks</th><br>
 <th>Facial_Structure</th><br>
 <th>Eye_Colour</th><br>
 <th>Tattoos</th><br>
 <th>Next_Of_Kin</th><br>
 <th>Next_Of_Kin_Address</th><br>
 <th>Next_Of_Kin_Relationship</th><br>
 <th>Contact</th><br>
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

$sql = "SELECT Inmate_ID, LastName, FirstName, Date_Of_Birth, Address, Occupation, Marital_Status, Children, Literacy, Height, Weight, Colour, Identification_Marks, Facial_Structure, Eye_Colour, Tattoos, Next_Of_Kin, Next_Of_Kin_Address, Next_Of_Kin_Relationship, Contact FROM inmates";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
	
    while($inmates = $result->fetch_assoc()) {
	echo "<tr>";
	echo "<td>".$inmates['Inmate_ID']."</td>";
	echo "<td>".$inmates['LastName']."</td>";
	echo "<td>".$inmates['FirstName']."</td>";
	echo "<td>".$inmates['Date_Of_Birth']."</td>";
	echo "<td>".$inmates['Address']."</td>";
	echo "<td>".$inmates['Occupation']."</td>";
	echo "<td>".$inmates['Marital_Status']."</td>";
	echo "<td>".$inmates['Children']."</td>";
	echo "<td>".$inmates['Literacy']."</td>";
	echo "<td>".$inmates['Height']."</td>";
	echo "<td>".$inmates['Weight']."</td>";
	echo "<td>".$inmates['Colour']."</td>";
	echo "<td>".$inmates['Identification_Marks']."</td>";
	echo "<td>".$inmates['Facial_Structure']."</td>";
	echo "<td>".$inmates['Eye_Colour']."</td>";
	echo "<td>".$inmates['Tattoos']."</td>";
	echo "<td>".$inmates['Next_Of_Kin']."</td>";
	echo "<td>".$inmates['Next_Of_Kin_Address']."</td>";
	echo "<td>".$inmates['Next_Of_Kin_Relationship']."</td>";
	echo "<td>".$inmates['Contact']."</td>";
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