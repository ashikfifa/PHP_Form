<?php

$insert=false;
if(isset($_POST['name'])){
    //set connection variable
$server="localhost";
$username="root";
$password="";

//create a database
$con=mysqli_connect($server,$username,$password);

//check for connection success

if(!$con){
    die("connection to this database failed due to".mysqli_connect_errror());
}
//echo"Successfully connected to the database";



//collect post variable
$name=$_POST['name'];
$age=$_POST['age'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$other=$_POST['other'];


$sql="INSERT INTO `trip`.`trip` ( `name`, `age`, `email`, `phone`, `other`, `dt`) 
VALUES ('$name', '$age', '$email', '$phone', '$other',current_timestamp());";
//echo $sql;


//execute the query

if($con-> query($sql)==TRUE){

    //flag for successful insertion
    $insert=true;
    //echo"Successfully Inserted";
}
else{
    echo"ERROR: $sql </br> $con->error";
    
}
//close the database connection

$con->close();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Travel Form</title>
</head>
<body>

    <div class="container">
        <h1>Travel Form</h1>
        <strong>Welcome to MIST travel agency</strong>
</br>

        <?php
            if($insert==true){
            echo  "<p> Thanks for submiting your form</p>";
            }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
        </br>
            <input type="text" name="age" id="age" placeholder="Enter your age">
        </br>
            <input type="email" name="email" id="email" placeholder="Enter your email">
        </br>
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
        </br>
    </br>
            <textarea name="other" id="desc" cols="108" rows="4" placeholder="Enter your other information here"></textarea>
        </br>
            <button class="submit" >Submit</button>
        </br>
            <button class="reset">Reset</button>
        </form>

    </div>

    <script src="index.js"></script>
    

</body>
</html>