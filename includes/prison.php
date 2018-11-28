<?php
$LastName = $_POST['LastName'];
$FirstName = $_POST['FirstName'];
$Date_Of_Birth = $_POST['Date_Of_Birth'];
$Address = $_POST['Address'];
$Occupation = $_POST['Occupation'];
$Marital_Status=$_POST['Marital_Status'];
$Children=$_POST['Children'];
$Literacy=$_POST['Literacy'];
$Height=$_POST['Height'];
$Weight=$_POST['Weight'];
$Colour=$_POST['Colour'];
$Identification_Marks=$_POST['Identification_Marks'];
$Facial_Structure=$_POST['Facial_Structure'];
$Eye_Colour=$_POST['Eye_Colour'];
$Tattoos=$_POST['Tattoos'];
$Next_Of_Kin=$_POST['Next_Of_Kin'];
$Next_Of_Kin_Address=$_POST['Next_Of_Kin_Address'];
$Next_Of_Kin_Relationship=$_POST['Next_Of_Kin_Relationship'];
$Contact=$_POST['Contact'];

if (!empty($LastName) || !empty($FirstName) || !empty($Date_Of_Birth) || !empty($Address) || !empty($Occupation) || !empty($Marital_Status) || !empty($Children) || !empty($Literacy) || !empty($Height) || !empty($Weight) || !empty($Colour) || !empty($Identification_Marks) || !empty($Facial_Structure) || !empty($Eye_Colour) || !empty($Tattoos) || !empty($Next_Of_Kin) || !empty($Next_Of_Kin_Address) || !empty($Next_Of_Kin_Relationship) || !empty($Contact)){
	$host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "gps_imis";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT Contact From inmates Where Contact = ? limit 1";
     $INSERT = "INSERT Into inmates (LastName, FirstName, Date_Of_Birth, Address, Occupation, Marital_Status, Children, Literacy, Height, Weight, Colour, Identification_Marks, Facial_Structure, Eye_Colour, Tattoos, Next_Of_Kin, Next_Of_Kin_Address, Next_Of_Kin_Relationship, Contact) values(?,?, ?, ?, ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

     $stmt = $conn->prepare($SELECT);
	 $stmt->bind_param("i", $Contact);
     $stmt->execute();
     $stmt->bind_result($Contact);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssssssssssssssssi", $LastName, $FirstName, $Date_Of_Birth, $Address,$Occupation, $Marital_Status,$Children,$Literacy, $Height,$Weight, $Colour, $Identification_Marks, $Facial_Structure, $Eye_Colour, $Tattoos, $Next_Of_Kin, $Next_Of_Kin_Address, $Next_Of_Kin_Relationship, $Contact);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this number";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>
