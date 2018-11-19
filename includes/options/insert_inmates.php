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
          $lastName_err = "Please enter your First Name.";
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
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <div class="wrapper">
        <h2>Register Inmate</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                <label>First Name </label>
                <input type="text" name="firstName" class="form-control" value="<?php echo $firstName; ?>">
                <span class="help-block"><?php echo $firstName_err; ?></span>
              </div>
            <div class="form-group <?php echo (!empty($lastName_err)) ? 'has-error' : ''; ?>">
                <label>Last Name</label>
                <input type="text" name="lastName" class="form-control" value="<?php echo $lastName; ?>">
                <span class="help-block"><?php echo $lastName_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($dob_err)) ? 'has-error' : ''; ?>">
                <label>Date of Birth</label>
                <input type="text" name="dob" class="form-control" value="<?php echo $dob; ?>">
                <span class="help-block"><?php echo $dob_err; ?></span>
            </div>

            <div action ="register.php" name="sex" method = "POST" class="form-row align-items-center">
              <div class="col-auto my-1">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Gender</label>
                <select name="sex" id="sex" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                  <option selected>Select their Gender</option>
                  <option value="1">Male</option>
                  <option value="2">Female</option>
                </select>
              </div>
              </div>

            <div class="form-group <?php echo (!empty($contact_err)) ? 'has-error' : ''; ?>">
                <label>Contact</label>
                <input type="text" name="contact" class="form-control" value="<?php echo $contact; ?>">
                <span class="help-block"><?php echo $contact_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                <label>Address</label>
                <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
                <span class="help-block"><?php echo $address_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>

            <div action ="register.php" name="position" method = "POST" class="form-row align-items-center">
              <div class="col-auto my-1">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Position</label>
                <select name="position" id="position" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                  <option selected>Select their Position</option>
                  <option value="1">Administrator</option>
                  <option value="2">Departments</option>
                  <option value="3">Reception</option>
                  <option value="4">Ministry_Personnel</option>
                  <option value="5">Service_Directorate</option>
                  <option value="6">Civilian_Directorate</option>
                </select>
              </div>
              </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>

        </form>
    </div>
</body>
</html>
