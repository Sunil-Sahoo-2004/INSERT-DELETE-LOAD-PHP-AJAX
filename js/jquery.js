$(document).ready(function(){
    function loadTable(){
        $.ajax({
            url : "",
            type : "",
            success : function(data){
                $("#id").html(data);
            }
        });
    }
    loadTable();

    $("#id").on("click", function(e){
        e.preventDefault();

        var val = $("#id").val();

        $.ajax({
            url : "",
            type : "",
            data : {value : val},
            success : function(data) {
                
            }
        });
    })
});