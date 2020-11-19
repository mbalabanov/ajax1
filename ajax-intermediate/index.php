<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX Example Intermediate</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>List of Songs using AJAX</h1>
        <p><button class="btn btn-primary" onclick="loadDoc()">Generate Table</button></p>
        <table id="content" class="table">
        </table>
    </div>
    <script>
        function loadDoc() {
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", "songs.xml", true);
            xhttp.send();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                xmlFormatter(this);
                }
            };
        }

        function xmlFormatter(xml) {
            var xmlDoc = xml.responseXML;
            var table = "<tr><th>Title</th><th>Artist</th><th>Country</th><th>Genre</th><th>Year</th></tr>";
            var x = xmlDoc.getElementsByTagName("song");
            for (var i = 0; i < x.length; i++) {
                
                table += "<tr><td>" +
                    x[i].getElementsByTagName("title")[0].childNodes[0].nodeValue +
                    "</td><td>" +
                    x[i].getElementsByTagName("artist")[0].childNodes[0].nodeValue +
                    "</td><td>"  +
                    x[i].getElementsByTagName("country")[0].childNodes[0].nodeValue +
                    "</td><td>" +
                    x[i].getElementsByTagName("genre")[0].childNodes[0].nodeValue +
                    "</td><td>" +
                    x[i].getElementsByTagName("year")[0].childNodes[0].nodeValue +
                    "</td></tr>";
                
            }
            document.getElementById("content").innerHTML = table;
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>