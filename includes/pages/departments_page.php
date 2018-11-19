<?php
// Initialize the session
session_start();

if($_SESSION["position"] !== 'Departments'){
  header("Location:../../index.php");

}else{

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Departments</title>
    <link rel="stylesheet" href="../../styles/bootstrap.css">
    <script src="../../styles/jquery.min.js"></script>
    <script src="../../styles/bootstrap.min.js"></script>

    <style type="text/css">
        body{ font: 14px sans-serif; text-align: `right;;`; }

    </style>
</head>
<body>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <img src="../../assets/Guyana_Prison_Service_logo.png" style="width:31.140px;height:40.442px" id="logo" />
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand" href="../../assets/Guyana_Prison_Service_logo.png">Guyana Prison Service</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="../../index.php"><strong>Home</strong></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b>Options</b><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../database.php">View Database</a></li>
            <li><a href="../users.php">Endorse Reception Actions</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="../logs.php">Update Inmate Courtdate</a></li>
            <li><a href="../logs.php">Update Inmate Discipline</a></li>
            <li><a href="../logs.php">Update Inmate Medical</a></li>
            <li><a href="../logs.php">Update Inmate Incident</a></li>
            <li><a href="../logs.php">Update Inmate Transfer</a></li>
            <li><a href="../logs.php">Update Inmate Visits</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b>
            <?php echo htmlspecialchars($_SESSION["username"]); ?></b> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../../index.php"><?php echo htmlspecialchars($_SESSION["firstName"]); ?> <?php echo htmlspecialchars($_SESSION["lastName"]); ?></li>
            <li><a><?php echo htmlspecialchars($_SESSION["position"]); ?> Privileges</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="../reset_password.php">Reset Password</a><li>
            <li><a href="../logout.php">Log out</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<center><h3><b>Departments</b></h3></center>
</body>

</body>
</html>
