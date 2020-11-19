<?php 
// You can access the values posted by jQuery.ajax
// through the global variable $_POST, like this:
$formname = isset($_POST['namefield']) ? $_POST['namefield'] : null;
$formmail = isset($_POST['emailfield']) ? $_POST['emailfield'] : null;

// var_dump($formmail);
$host= "localhost";
$username="root";
$password="";
$dbname="ajaxtest";

$conn = mysqli_connect($host,$username,$password,$dbname);

if($conn){
   // echo "success";
}

$exists = "SELECT * FROM `example` WHERE `email` LIKE '{$formmail}%';";
$result = mysqli_query($conn,$exists);

if($result->num_rows == 0) {
    echo '<input class="btn btn-primary" type="submit" value="Save"/><div class="alert alert-success mt-4 text-center" role="alert">Email does not exist yet, keep going..!</div>';
} else {
    echo '<div class="alert alert-danger mt-4 text-center" role="alert">Email is already in the database!</div>';
}

if(isset($_POST['submit'])) {
    $query= "INSERT INTO `example` (`name`, `email`) VALUES ('$formname', '$formmail');";
    if(mysqli_query($conn,$query)){
        echo '<div class="alert alert-success mt-4 text-center" role="alert">Record inserted successfully!</div>';
    };
}

?>