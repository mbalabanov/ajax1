
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
        <div class="form-group row my-4">
            <label for="namefield" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input class="form-control" id="namefield" name="namefield" type="text" value="" placeholder="Name"/>
            </div>
        </div>
        <div class="form-group row my-4">
            <label for="emailfield" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input class="form-control" id="emailfield" name="emailfield" type="text" value="" placeholder="Email"/>
            </div>
        </div>
        <input class="btn btn-primary" type="submit" value="Send" />
    </form>

    <div id="result"></div>
</div>

<script>
// Variable to hold request
var request;

// Bind to the submit event of our form
$("#regform").submit(function(event){

   // Prevent default posting of form - put here to work in case of errors
   event.preventDefault();

   // Abort any pending request
   if (request) {
       request.abort();
   }
   // setup some local variables
   var $form = $(this);

   // Let's select and cache all the fields
   var $inputs = $form.find("input, select, button, textarea");

   // Serialize the data in the form
   var serializedData = $form.serialize();

   // Let's disable the inputs for the duration of the Ajax request.
   // Note: we disable elements AFTER the form data has been serialized.
   // Disabled form elements will not be serialized.
   $inputs.prop("disabled", true);

   // Fire off the request to /form.php
   request = $.ajax({
       url: "form.php",
       type: "post",
       data: serializedData
   });

   // Callback handler that will be called on success
   request.done(function (response, textStatus, jqXHR){
       // Log a message to the console
       console.log("Hooray, it worked!");
       document.getElementById("result").innerHTML=response;
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
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>