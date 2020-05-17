<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous">

    </script>
    <script>
        $(document).ready(function () {
            $("#btn").click(function(){
                $("#test").load("data");
            });
        });
    </script>
</head>
<body>

<div id="test">
    <p>This is the first content!!</p>
</div>
<button id="btn">Click to change</button>
</body>
</html>