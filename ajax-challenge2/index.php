<?php
        $formmail = isset($_POST['emailfield']) ? $_POST['emailfield'] : null;

        $host= "localhost";
        $username="root";
        $password="";
        $dbname="ajaxtest";

        $host= "localhost";
        $username="root";
        $password="";
        $dbname="ajaxtest";
        
        $conn = mysqli_connect($host,$username,$password,$dbname);
        
        if($conn){
        // echo "success";
        }
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Registration Form</h1>
    <p>Enter your name and email address to create a new user. We will check if your email address is already registered.</p>
    <form id="regform">
        <div class="row my-4">
            <label for="namefield" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input class="form-control" id="namefield" name="namefield" type="text" value="" placeholder="Name"/>
            </div>
        </div>
        <div class="row my-4">
            <label for="emailfield" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input class="form-control" id="emailfield" name="emailfield" type="text" value="" placeholder="Email"/>
            </div>
        </div>
        
    </form>

    <div id="result"></div>
    <div id="message"></div>
</div>

<script>

$(document).ready(function(){


// Variable to hold request
var request;

/* ***** Function for KEYUP and email check ***** */
$("#emailfield").keyup(function(event){

   // setup some local variables
   var $form = $(this);

   // Let's select and cache all the fields
   var $inputs = $form.find("input, select, button, textarea");

   // Serialize the data in the form
   var serializedData = $form.serialize();

   // Fire off the request to /form.php
   request = $.ajax({
       url: "form.php",
       type: "post",
       data: serializedData
   });

   // Callback handler that will be called on success
   request.done(function (response, textStatus, jqXHR){
       // Log a message to the console
       document.getElementById("message").innerHTML=response;
   });

   // Callback handler that will be called on failure
   request.fail(function (jqXHR, textStatus, errorThrown){
       // Log the error to the console
       console.error(
           "The following error occurred: "+
           textStatus, errorThrown
       );
   });

   // Callback handler that will be called regardless
   // if the request failed or succeeded
   request.always(function () {
       // Reenable the inputs
       $inputs.prop("disabled", false);
   });
});


});

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>