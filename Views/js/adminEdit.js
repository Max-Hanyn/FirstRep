$(document).ready(function(){

    $('#photoAddForm').submit(function (e) {
        e.preventDefault();


        $.ajax({
            url: window.location.href +"/photo/change",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(response)
            {
                console.log(response);
                $('img').attr('src',response);
            }
        });

    });


})