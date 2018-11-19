<?php

require_once "connection.php";

$query=mysqli_query($link,"SELECT id FROM users");
$row=mysqli_fetch_array($query);

if ($row!=""){

// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../index.php");
    exit;
}

// Include connection file
require_once "connection.php";

// Define variables and initialize with empty values
$firstName = $lastName = $username = $password = $position = "";
$firstName_err = $lastName_err = $username_err = $password_err = $position_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){


    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }



    // Validate credentials
    if(empty($name_err) && empty($username_err) && empty($password_err) && empty($position_err)){
        // Prepare a select statement
        $sql = "SELECT id, firstName, lastName, username, password, position FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $firstName, $lastName, $username, $hashed_password, $position);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["firstName"] = $firstName;
                            $_SESSION["lastName"] = $lastName;
                            $_SESSION["username"] = $username;
                            $_SESSION["position"] = $position;

                            if($_SESSION["position"] == 'Administrator'){
                              header("Location:pages/administrator_page.php");

                            }elseif($_SESSION["position"] == 'Departments'){
                              header("Location:pages/departments_page.php");

                            }elseif($_SESSION["position"] == 'Reception') {
                              header("Location:pages/reception_page.php");

                            }elseif($_SESSION["position"] == 'Ministry_Personnel'){
                              header("Location:pages/ministry_personnel_page.php");

                            }elseif($_SESSION["position"] == 'Service_Directorate'){
                              header("Location:pages/service_directorate_page.php");

                            }elseif($_SESSION["position"] == 'Civilian_Directorate') {
                              header("Location:pages/civilian_directorate_page.php");
                            }

                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
  }
}
else{
  header("Location:register_initial.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../styles/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/loginDesign.css">


    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
  <!--<center>
    <br></br>
    <font color="white"><h2><strong>Inmates Information Management System</strong></h2></font>
  </center> -->
  <br></br>
  <br></br>
    <center>
  <img src="../assets/Guyana_Prison_Service_logo.png" class="avatar" style="width:81.498px;height:105.841px" id="logo">
    <div class="wrapper">
        <font color="white"><h2>Login to IMIS</h2></font>

        <font color="white"><p>Please fill in your credentials to login.</p></font>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
              <font color="yellow"><span class="help-block"><?php echo $username_err; ?></span></font>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" placeholder="Enter Username">
              </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
              <font color="yellow"><span class="help-block"><?php echo $password_err; ?></span></font>
                <input type="password" name="password" class="form-control" placeholder="Enter password">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
        </form>
    </div>
  </center>
</body>
</html>
