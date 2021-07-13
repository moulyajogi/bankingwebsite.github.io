<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" href="css/stylefoot.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <style type="text/css">
        button{
            transition: 1.5s;
            background-color:#FFC0CB;
        }
        button:hover{
            
            color: white;
        }
    </style>
</head>

<body style="background-color :  #E6E6FA;">
<?php
include 'connection.php';

$sql = "SELECT * FROM customber";
$result = mysqli_query($resul,$sql);
?>

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
          <a class="nav-link" href="transction.php">TRANSCATIONS</a>
        
        
      </ul>
      
    </div>
  </div>
</nav>

<div class="container">
    <h2 class="text-center pt-4" style="color : black">Transaction</h2>
    <br>
    <div class="row">
        <div class="col">
            <div class="table-responsive-sm">
                <table class="table table-hover table-sm table-striped table-condensed table-bordered" style="border-color:black;">
                    <thead style="color : black;">
                    <tr>
                        <th scope="col" class="text-center py-2">NO</th>
                        <th scope="col" class="text-center py-2"> Your Name</th>
                        <th scope="col" class="text-center py-2">Email Id</th>
                        <th scope="col" class="text-center py-2"> Your Balance</th>
                        <th scope="col" class="text-center py-2">Operation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($rows=mysqli_fetch_assoc($result)){
                        ?>
                        <tr style="color : black;">
                            <td class="py-2"><?php echo $rows['acc_no'] ?></td>
                            <td class="py-2"><?php echo $rows['custname']?></td>
                            <td class="py-2"><?php echo $rows['email']?></td>
                            <td class="py-2"><?php echo $rows['balance']?></td>
                            <td><a href="moneytransfer.php?acc_no= <?php echo $rows['acc_no'] ;?>"> <button type="button" class="btn" style="background-color : #E6E6FA;">Transact</button></a></td>
                        </tr>
                        <?php
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br>


















































<footer class="footer">
     
     <p class="p-2 bg-dark text-white text-center">@SparkBankOfficial<br>      <a href="#"><i class="fab fa-facebook-f"></i></a>      <a href="#"><i class="fab fa-twitter"></i></a>        <a href="#"><i class="fab fa-instagram"></i></a>       <a href="#"><i class="fab fa-linkedin-in"></i></a> </p>
  </footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>