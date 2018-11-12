<?php
include_once'connection2.php';
if (isset($_POST['submit'])) {
    // receive all input values from the form
    $LastName = mysqli_real_escape_string($db, $_POST['LastName']);
    $FirstName= mysqli_real_escape_string($db, $_POST['FirstName']);
    $Date_Of_Birth = mysqli_real_escape_string($db, $_POST['Date_Of_Birth']);
    $Sex = mysqli_real_escape_string($db, $_POST['Sex']);
  


$sql=" INSERT INTO inmates(
LastName,
FirstName,
Date_Of_Birth,
Sex,
Address,
Occupation,
Marital_Status,
Children,
Literacy,
Height,
Weight,
Colour,
Identification_Marks,
Facial_Structure,
Eye_Colour,
Hair_Colour,
Tattoos,
Next_Of_Kin,
Next_Of_Kin_Address,
Next_Of_Kin_Relationship,
Contact
) VALUES
( 
'LastName',
'FirstName',
'Date_Of_Birth'
'Sex',
'Address',
'Occupation',
'Marital_Status',
'Children',
'Literacy',
'Height',
'Weight',
'Colour',
'Identification_Marks',
'Facial_Structure',
'Eye_Colour',
'Hair_Colour',
'Tattoos',
'Next_Of_Kin',
'Next_Of_Kin_Address',
'Next_Of_Kin_Relationship',
'Contact',

 
 
 
 );";
mysqli_query($conn,$sql);



?>