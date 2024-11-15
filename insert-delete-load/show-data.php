<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Table</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <table id="main" border="0" cellspacing="0">
        <tr>
            <td id="header">
                <h1>PHP with Ajax</h1>
            </td>
        </tr>
        <tr>
            <td id="table-load">
                <h1>Data Table</h1>
            </td>
        </tr>
        <tr>
            <td class="btn">
                <input type="button" id="load-button" value="Load Data">
            </td>
        </tr>
        <tr>
            <td id="table-data">
            </td>
        </tr>
    </table>

    <script>
        $(document).ready(function(){
            $("#load-button").on("click", function(e){
                $.ajax({
                    url: "ajex-load.php", // Make sure this file exists
                    type: "POST",
                    success: function(data){
                        $("#table-data").html(data);
                    }
                });
            });
        });
    </script>
</body>
</html>
