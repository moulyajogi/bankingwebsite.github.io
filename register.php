<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 4 Example</title>

  <?php include 'link.php' ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style2.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<body style="background-color : #E6E6FA;">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SparkBank</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">ABOUT</a>
           <li class="nav-item">
          <a class="nav-link" href="register.php">CUSTOMBER</a>
          <li class="nav-item">
          <a class="nav-link" href="trans.php">TRANSCATIONS</a>
        
        
      </ul>
      
    </div>
  </div>
</nav>
</head>
<body bgcolor="lightblue">
<h1 align="center">CUSTOMBER DETAILS</h1>
<table align=center width="80%" cellpadding=5 cellspacing=5 border=2>
<tr><td>AccountNo</td><td>Custombername</td><td>Email</td><td>Balance</td></tr>



 <?php

include("connection.php");
session_start();
$sqlvar="select *from customber";
	$result=$resul->query($sqlvar);
	while($row=$result->fetch_row()) {
		echo("<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td></tr>");
	}
error_reporting(E_ERROR | E_PARSE);

?>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>




	
  




