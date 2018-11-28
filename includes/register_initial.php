<?php
  // Include connection file
  require_once "connection.php";

  // Define variables and initialize with empty values
  $firstName = $lastName = $username = $dob = $sex = $contact = $address = $password = $confirm_password = $position = "";
  $firstName_err = $lastName_err = $username_err = $dob_err = $sex_err = $contact_err = $address_err = $position_err = $password_err = $confirm_password_err = "";

  if(isset($_POST['firstName'], $_POST['lastName'], $_POST['username'], $_POST['dob'], $_POST['sex'], $_POST['contact'], $_POST['password'], $_POST['confirm_password'], $_POST['position'])){
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Validate firstName
        if(empty(trim($_POST["firstName"]))){
            $firstName_err = "Please enter your First Name.";
        } else{
            // Prepare a select statement
            $sql = "SELECT id FROM users WHERE firstName = ?";

            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_firstName);

                // Set parameters
                $param_firstName = trim($_POST["firstName"]);

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    /* store result */
                    mysqli_stmt_store_result($stmt);

                    $firstName = trim($_POST["firstName"]);

                } else{
                    echo "Something went wrong. Please try again later.";
                }
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
        // Validate lastName
        if(empty(trim($_POST["lastName"]))){
            $lastName_err = "Please enter your Last Name.";
        } else{
            // Prepare a select statement
            $sql = "SELECT id FROM users WHERE lastName = ?";

            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_lastName);

                // Set parameters
                $param_lastName = trim($_POST["lastName"]);

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    /* store result */
                    mysqli_stmt_store_result($stmt);

                    $lastName = trim($_POST["lastName"]);

                } else{
                    echo "Something went wrong. Please try again later.";
                }
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

        // Validate username
        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter a username.";
        } else{
            // Prepare a select statement
            $sql = "SELECT id FROM users WHERE username = ?";

            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                // Set parameters
                $param_username = trim($_POST["username"]);

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    /* store result */
                    mysqli_stmt_store_result($stmt);

                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $username_err = "This username is already taken.";
                    } else{
                        $username = trim($_POST["username"]);
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
        // Validate dob
        if(empty(trim($_POST["dob"]))){
            $dob_err = "Please enter your Date of Birth.";
        } else{
            // Prepare a select statement
            $sql = "SELECT id FROM users WHERE dob = ?";

            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_dob);

                // Set parameters
                $param_dob = trim($_POST["dob"]);

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    /* store result */
                    mysqli_stmt_store_result($stmt);

                    $dob = trim($_POST["dob"]);

                } else{
                    echo "Something went wrong. Please try again later.";
                }
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

        // Validate sex

        // Validate sex
        if(empty(trim($_POST["sex"]))){
            $sex_err = "Please enter your gender.";
        } else{
          //$sex = $_POST["sex"];

        //  $SQL = "INSERT INTO users (sex) VALUES ('$sex')";
            // Prepare a select statement
           $sql = "SELECT id FROM users WHERE sex = ?";

            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_sex);

                // Set parameters
                $param_sex = trim($_POST["sex"]);

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    /* store result */
                    mysqli_stmt_store_result($stmt);

                    $sex = trim($_POST["sex"]);

                } else{
                    echo "Something went wrong. Please try again later.";
                }
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }


        // Validate contact
        if(empty(trim($_POST["contact"]))){
            $contact_err = "Please enter your Contact information.";
        } else{
            // Prepare a select statement
            $sql = "SELECT id FROM users WHERE contact = ?";

            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_contact);

                // Set parameters
                $param_contact = trim($_POST["contact"]);

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    /* store result */
                    mysqli_stmt_store_result($stmt);

                    $contact = trim($_POST["contact"]);

                } else{
                    echo "Something went wrong. Please try again later.";
                }
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
        // Validate address
        if(empty(trim($_POST["address"]))){
            $address_err = "Please enter your Address.";
        } else{
            // Prepare a select statement
            $sql = "SELECT id FROM users WHERE address = ?";

            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_address);

                // Set parameters
                $param_address = trim($_POST["address"]);

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    /* store result */
                    mysqli_stmt_store_result($stmt);

                    $address = trim($_POST["address"]);

                } else{
                    echo "Something went wrong. Please try again later.";
                }
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

        // Validate position
        if(empty(trim($_POST["position"]))){
            $position_err = "Please enter Your Position.";
        } else{
            // Prepare a select statement
            $sql = "SELECT id FROM users WHERE position = ?";

            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_position);

                // Set parameters
                $param_position = trim($_POST["position"]);

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    /* store result */
                    mysqli_stmt_store_result($stmt);

                  $position = trim($_POST["position"]);
                } else{
                    echo "Something went wrong. Please contact your Admin if this happens again.";
                }
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

        // Validate password
        if(empty(trim($_POST["password"]))){
            $password_err = "Please enter a password.";
        } elseif(strlen(trim($_POST["password"])) < 8){
            $password_err = "Password must have atleast 8 characters.";
        } else{
            $password = trim($_POST["password"]);
        }

        // Validate confirm password
        if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = "Please confirm password.";
        } else{
            $confirm_password = trim($_POST["confirm_password"]);
            if(empty($password_err) && ($password != $confirm_password)){
                $confirm_password_err = "Password did not match.";
            }
        }

        // Check input errors before inserting in database
        if(empty($firstName_err) && empty($lastName_err) && empty($username_err) && empty($dob_err) && empty($sex_err) && empty($contact_err) && empty($address_err) && empty($position_err) && empty($password_err) && empty($confirm_password_err)){

            // Prepare an insert statement
            $sql = "INSERT INTO users (firstName, lastName, username, dob, sex, contact, address, position, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sssssssss", $param_firstName, $param_lastName, $param_username, $param_dob, $param_sex, $param_contact, $param_address, $param_position, $param_password);

                // Set parameters
                $param_firstName = $firstName;
                $param_lastName = $lastName;
                $param_username = $username;
                $param_dob = $dob;
                $param_sex = $sex;
                $param_contact = $contact;
                $param_address = $address;
                $param_position = $position;
                $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Redirect to login page
                    header("location: login.php");
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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Startup Registration</title>
    <link rel="stylesheet" href="../styles/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/registerDesign.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
  <center>

    <div class="wrapper">
      <img src="../assets/Guyana_Prison_Service_logo.png" class="avatar" style="width:81.498px;height:105.841px" id="logo">
        <br></br>
        <font color="yellow"><h3>Welcome!</h3></font>
        <font color="white"><p>Please fill this Administrative form to create an Account.</p></font>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">

                <input type="text" required name="firstName" class="form-control" value="<?php echo $firstName; ?>"
                placeholder="Enter First Name" oninvalid="this.setCustomValidity('Please Enter Your First Name')" oninput="setCustomValidity('')" >
            </div>

            <div class="form-group <?php echo (!empty($lastName_err)) ? 'has-error' : ''; ?>">
                <input type="text" required name="lastName" class="form-control" value="<?php echo $lastName; ?>"
                placeholder="Enter Last Name" oninvalid="this.setCustomValidity('Please Enter Your Last Name')" oninput="setCustomValidity('')">
            </div>

            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <input type="text" required name="username" class="form-control" value="<?php echo $username; ?>"
                placeholder="Enter a Username" oninvalid="this.setCustomValidity('Please Create a User Name')" oninput="setCustomValidity('')">
            </div>

            <div class="form-group <?php echo (!empty($dob_err)) ? 'has-error' : ''; ?>">
                <input type="date" required name="dob" class="form-control" value="<?php echo $dob; ?>"
                placeholder="Enter your Date of Birth" oninvalid="this.setCustomValidity('Please Enter Your Date of Birth in the form of (Month, Day, Year)')" oninput="setCustomValidity('')">
            </div>

            <div class="form-group <?php echo (!empty($contact_err)) ? 'has-error' : ''; ?>">
                <input type="text" required name="contact" class="form-control" value="<?php echo $contact; ?>"
                placeholder="Enter Contact information" oninvalid="this.setCustomValidity('Please provide your Contact Information')" oninput="setCustomValidity('')">
            </div>

            <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                <input type="text" required name="address" class="form-control" value="<?php echo $address; ?>"
                placeholder="Enter your Address" oninvalid="this.setCustomValidity('Please provide your Address')" oninput="setCustomValidity('')">
            </div>

            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <input type="password" required name="password" class="form-control" value="<?php echo $password; ?>"
                placeholder="Enter Password" oninvalid="this.setCustomValidity('You must provide a Password with atleast (8) characters')" oninput="setCustomValidity('')">
                <font color="yellow"><span class="help-block"><?php echo $password_err; ?></span></font>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <input type="password" required name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>"
                placeholder="Confirm your Password" oninvalid="this.setCustomValidity('Please Confirm your Password')" oninput="setCustomValidity('')">
                <font color="yellow"><span class="help-block"><?php echo $confirm_password_err; ?></span></font>
            </div>

            <div action ="register_initial.php" name="sex" method = "POST" class="form-group">
              <div>
                <select name="sex" id="sex" class="custom-select" id="inlineFormCustomSelect">
                  <option selected>Select Gender</option>
                  <option value="1">Male</option>
                  <option value="2">Female</option>
                </select>
              </div>
              </div>

            <div action ="register_initial.php" name="position" method = "POST" class="form-group">
              <div>
                <select name="position" id="position" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                  <option value="1">Administrator</option>
                </select>
              </div>
              </div>

                <input type="submit" class="btn btn-success" value="Submit">
                <div class="divider"/>
                <input type="reset" class="btn btn-default" value="Reset">

          </form>
    </div>
  </center>
</body>
</html>
