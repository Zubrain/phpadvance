$(document).ready(function(){
    // adding users
    $(document).on("submit", "#addform", function (event) {
        event.preventDefault();
        //ajax
        $.ajax({
            url: "/phpadvance/ajax.php",
            type: "POST",
            dataType: "json",
            data: new FormData(this),
            processData: false,
            contentType: false,
            beforeSend: function () {
                console.log("Wait...Data is Loading");
            },
            success: function (response){
                console.log(response);
                if(response){
                    $("#exampleModal").modal("hide");
                    $("#addform")[0].reset();
                }
            },
            error: function (request,error) {
                console.log(arguments);
                console.log("Error"+ error);
            },
        });
    });
});