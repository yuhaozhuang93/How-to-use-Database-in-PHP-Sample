<?php include "db.php"; ?>
<?php 


function showdata(){
    global $connection; 
    $query = "SELECT * FROM users";
    $result = mysqli_query($connection,$query);
        if(!$result){
            die('Query Failed' . mysqli_error());
        }
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['id'];
                echo "<option value='$id'>$id</option>";
            } 
}

function CreateData(){
    if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $connection = mysqli_connect('localhost','root','','loginapp');
    if(!$connection) {
    
        die("We connection failed");
    }
    
    $query = "INSERT INTO users(username, password)";
    $query .="VALUE('$username','$password')";
    $result = mysqli_query($connection,$query);
    if(!$result){
        die('Query Failed' . mysqli_error());
     } else {
            echo "Record create successfully";
        }

    }
}

function UpdataTable(){
  if(isset($_POST['submit'])){  
      global $connection; 
      $username = $_POST['username'];
        $password = $_POST['password'];
        $id = $_POST['id'];
        
        $query = "UPDATE users SET ";
        $query .= "username = '$username', ";
        $query .= "password = '$password' ";
        $query .= "WHERE id = $id ";
        
        $result = mysqli_query($connection, $query);
        if(!$result){
            die("Query Failed") . mysqli_error($connection);
        } else {
            echo "Record update successfully";
        }
  } 
}

function DeleteRow(){
    if(isset($_POST['submit'])){
        global $connection; 
        $username = $_POST['username'];
        $password = $_POST['password'];
        $id = $_POST['id'];
        
        $query = "DELETE FROM users ";
        $query .= "WHERE id = $id ";
        
        $result = mysqli_query($connection, $query);
        if(!$result){
            die("Query Failed") . mysqli_error($connection);
        } else {
            echo "Record delete successfully";
        }
    }
}
?>