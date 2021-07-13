

























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
            border:none;
            background: #d9d9d9;
        }
        button:hover{
            background-color:#777E8B;
            transform: scale(1.1);
            color:white;
        }

    </style>
</head>

<body style="background-color : #E6E6FA ;">

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
    <h2 class="text-center pt-4" style="color : black;">Transaction Panel</h2>


<?php
include 'connection.php';

if(isset($_POST['submit']))
{

    $from = $_GET['acc_no'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customber where acc_no=$from";
    $query = mysqli_query($resul,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from customber where acc_no=$to";
    $query = mysqli_query($resul,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
    {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }



    // constraint to check insufficient balance.
    else if($amount > $sql1['balance'])
    {

        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }



    // constraint to check zero values
    else if($amount == 0){

        echo "<script type='text/javascript'>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
    }


    else {

        // deducting amount from sender's account
        $newbalance = $sql1['balance'] - $amount;
        $sql = "UPDATE customber set balance=$newbalance where acc_no=$from";
        mysqli_query($resul,$sql);


        // adding amount to reciever's account
        $newbalance = $sql2['balance'] + $amount;
        $sql = "UPDATE customber set balance=$newbalance where acc_no=$to";
        mysqli_query($resul,$sql);

        $sender = $sql1['custname'];
        $receiver = $sql2['custname'];
        $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
        $query=mysqli_query($resul,$sql);

        if($query){
            echo "<script> alert('Transaction Successful');
                                     
                           </script>";

        }

        $newbalance= 0;
        $amount =0;
    }

}
?>









    <?php
    include 'connection.php';
    $sid=$_GET['acc_no'];
    $sql = "SELECT * FROM  customber where acc_no=$sid";
    $result=mysqli_query($resul,$sql);
    if(!$result)
    {
        echo "Error : ".$sql."<br>".mysqli_error($resul);
    }
    $rows=mysqli_fetch_assoc($result);
    ?>
    <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class="table table-striped table-condensed table-bordered">
                <tr style="color : black;">
                    
                    <th class="text-center">Your Balance</th>
                </tr>
                <tr style="color : black;">
                    
                    <td class="py-2"><?php echo $rows['balance'] ?></td>
                </tr>
            </table>
        </div>
        <br><br><br>
        <label style="color : black;"><b>Enter the Name:</b></label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            
            <?php
            include 'connection.php';
            $sid=$_GET['acc_no'];
            $sql = "SELECT * FROM customber where acc_no!=$sid";
            $result=mysqli_query($resul,$sql);
            if(!$result)
            {
                echo "Error ".$sql."<br>".mysqli_error($resul);
            }
            while($rows = mysqli_fetch_assoc($result)) {
                ?>
                <option class="table" value="<?php echo $rows['acc_no'];?>" >

                    <?php echo $rows['custname'] ;?> (Balance:
                    <?php echo $rows['balance'] ;?> )

                </option>
                <?php
            }
            ?>
            <div>
        </select>
        <br>
        <br>
        <label style="color : black;"><b>Enter the Amount:</b></label>
        <input type="number" class="form-control" name="amount" required>
        <br><br>
        <div class="text-center" >
            <button class="btn mt-3" name="submit" type="submit" id="myBtn"  >Transfer</button>
        </div>
    </form>
</div>
<footer class="footer">
     
     <p class="p-2 bg-dark text-white text-center">@SparkBankOfficial<br>      <a href="#"><i class="fab fa-facebook-f"></i></a>      <a href="#"><i class="fab fa-twitter"></i></a>        <a href="#"><i class="fab fa-instagram"></i></a>       <a href="#"><i class="fab fa-linkedin-in"></i></a> </p>
  </footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>