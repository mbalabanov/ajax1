<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1></h1>
    <p><button onclick="loadDoc()">Click</button></p>

    <div id="content">
        Content goes here.
    </div>

    <script>
function loadDoc() {
 var xhttp = new XMLHttpRequest();
 xhttp.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        document.getElementById("content").innerHTML =
        this.responseText;
   }
 };
 xhttp.open("GET", "data.xml", true);
 xhttp.send();
}
    </script>
</body>
</html>