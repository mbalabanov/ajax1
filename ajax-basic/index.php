<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax1 - Basic</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Show content from XML file</h1>
    <p><button class="btn btn-primary" onclick="loadDoc()">Show message</button></p>

    <div id="content" class="alert alert-secondary" role="alert">
        The content will be shown here.
    </div>
</div>
    <script>
        function loadDoc() {
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", "data1.xml", true);
            xhttp.send();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    document.getElementById("content").innerHTML =
                    this.responseText;
                }
            };
        }
    </script>
</body>
</html>