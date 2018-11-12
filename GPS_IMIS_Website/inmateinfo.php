<!DOC html>
<html>
<head>
    <title>inmateinfo</title>
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style.css">
   
</head>
<body>
<form action="inmateinfo.php" method ="post">


LastName                 <input type="text" name="LastName"></br>
FirstName                <input type="text" name="FirstName"></br>
Date_of_Birth            <input type="text" name="Date_of_Birth"></br>
Address                  <input type="text" name="Address"></br>
Occupation               <input type="text" name="Occupation"></br>
Marital_Status           <input type="text" name="Marital_Status"></br>
Children                 <input type="text" name="Children"></br>
Literacy                 <input type="text" name="Literacy"></br>
Height                   <input type="text" name="Height"></br>
Weight                   <input type="text" name="Weight"></br>
Colour                   <input type="text" name="Colour"></br>
Identification_Marks     <input type="text" name="Identification_Marks"></br>
Facial_Structure         <input type="text" name="Facial_Structure"></br>
Eye_Colour               <input type="text" name="Eye_Colour"></br>
Tattoos                  <input type="text" name="Tattoos"></br>
Next_Of_Kin              <input type="text" name="Next_Of_Kin"></br>
Next_Of_Kin_Address      <input type="text" name="Next_Of_Kin_Address"></br>
Next_Of_Kin_Relationship <input type="text" name="Next_Of_Kin_Relationship"></br>
Contact                  <input type="text" name="Contact"></br>
<input type="submit" name="submit"></br>

</form>

<body>
<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'gps_imis');

$sql="SELECT *FROM users;";
$result=mysqli_query($conn,$sql);
$resultCheck=mysql_num_rows($result);

if($resultcheck>0)
{
  while($row=mysqli_ftech_accoc($result)){
    echo$row['LastName']."<br>";
  }
}
?>
 
</body>
</html>
