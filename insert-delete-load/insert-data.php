<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP AJEX</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <table id="main" border="0" cellspacing="0">
        <tr>
            <td id="header">
                <h1>ADD and DELETE Records with PHP Ajax</h1>
            </td>
        </tr>
        <tr>
            <td id="table-load">
                <h1>Data Table</h1>
            </td>
        </tr>
        <tr>
            <td class="table-form">
                <form id="addForm">
                    First Name : <input type="text" id="fname">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Last Name : <input type="text" id="lname">
                    <input type="submit" id="save-button" value="Save">
                </form>
            </td>
        </tr>
        <tr>
            <td id="table-data">
            </td>
        </tr>
    </table>
    <div id="error-message"></div>
    <div id="success-message"></div>
    <script>
        $(document).ready(function () {
            // load data
            function loadTable() {
                $.ajax({
                    url: "ajex-load.php",
                    type: "POST",
                    success: function (data) {
                        $("#table-data").html(data);
                    }
                });
            }
            loadTable();

            // insert data
            $("#save-button").on("click", function (e) {
                e.preventDefault();

                var fname = $("#fname").val();
                var lname = $("#lname").val();

                if (fname == "" || lname == "") {
                    $("#error-message").html("All filds are requird!!").slideDown();
                    $("#success-message").slideUp();
                } else {
                    $.ajax({
                        url: "ajex-insert.php",
                        type: "POST",
                        data: { first_name: fname, last_name: lname },
                        success: function (data) {
                            if (data == 1) {
                                loadTable();
                                $("#addForm").trigger("reset");
                                $("#success-message").html("Data inserted successfully.......").slideDown();
                                $("#error-message").slideUp();
                            } else {
                                $("#error-message").html("Can't save record....").slideDown();
                                $("#success-message").slideUp();
                            }

                        }
                    });
                }
            })

            // delete data
            $(document).on("click", ".delete-btn", function () {
                if (confirm("DO You realy want to delete this record?")) {
                    var studentId = $(this).data("id");
                    var element = this;


                    $.ajax({
                        url: "ajex-delete.php",
                        type: "POST",
                        data: { id: studentId },
                        success: function (data) {
                            if (data == 1) {
                                $(element).closest("tr").fadeOut()
                            } else {
                                $("#error-message").html("Can't delete record.").slideDown();
                                $("#success-message").slideUp();
                            }
                        }
                    });
                }
            })
        
        });
    </script>
</body>

</html>