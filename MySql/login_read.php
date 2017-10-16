<?php

    
    $connection = mysqli_connect('localhost','root','','loginapp');
    if($connection) {
        echo "We connect successfully" . "<br>";
    
    } else {
        die("We connection failed");
    }
    
    $query = "SELECT * FROM users";

    $result = mysqli_query($connection,$query);
    if(!$result){
        die('Query Failed' . mysqli_error());
    }
    
   // echo $username . "<br>";
    //echo $password . "<br>";




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="col-xs-6">
            <?php
                while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <pre>
                  <?php      
                   
                    print_r($row);
                }?>
                 </pre>
            
            ?>
        </div>
    </div>
</body>
</html>