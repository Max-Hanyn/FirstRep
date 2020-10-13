$(document).ready(function () {

    $('#photoAddForm').submit(function (e) {
        e.preventDefault();


        $.ajax({
            url: "/profile/photo/add",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                console.log(response);
                $('img').attr('src', response);
            }
        });

    });

    $('#changeProfileForm').submit(function (e) {
        e.preventDefault();

        var data = $("#changeProfileForm").serializeArray();

        $.ajax({
            url: window.location.href + "/change",
            type: "POST",
            data: data,
            success: function () {

                $('#first-second-name').text(data[0].value + " " + data[1].value);
                $('#first-name').text(data[0].value);
                $('#second-name').text(data[1].value);
                $('#adress').text(data[2].value);
                $('#number').text(data[3].value);

                $('#massage').append('<div class="alert alert-success alert-block">' +
                    ' <button type="button" class="close" data-dismiss="alert">×</button>' +
                    ' <strong>Info changed</strong> </div>');

            }
        });

    })

    $('#changeEmailForm').submit(function (e) {
        e.preventDefault();

        var empty = false;
        var inputs = $("#changeEmailForm").find('input');
        var data = $("#changeEmailForm").serializeArray();

        inputs.each(function () {
            if (!$(this).val()) {
                $(this).attr('id', 'error');
                empty = true;
            } else {

                $(this).attr('id', '');
            }


        })
        if (!empty) {

            $.ajax({
                url: '/email/change',
                dataType: 'json',
                type: "POST",
                data: data,

                success: function (response) {
                    if (response.success) {
                        $('#massage').append('<div class="alert alert-success alert-block">' +
                            ' <button type="button" class="close" data-dismiss="alert">×</button>' +
                            ' <strong>To apply changes confirm your new email</strong> </div>');

                    } else {

                        $('#massage').append('<div class="alert alert-danger alert-block">' +
                            ' <button type="button" class="close" data-dismiss="alert">×</button>' +
                            ' <strong>Such email already exists</strong> </div>');

                    }

                }
            })
        }

    })

    $('#changePasswordForm').submit(function (e) {
        e.preventDefault();

        var empty = false;
        var inputs = $("#changePasswordForm").find('input');
        var data = $("#changePasswordForm").serializeArray();

        inputs.each(function () {
            if (!$(this).val()) {
                $(this).attr('id', 'error');
                empty = true;
            } else {

                $(this).attr('id', '');
            }


        })

        if (!empty) {

            $.ajax({
                url: '/password/change',
                dataType: 'json',
                type: "POST",
                data: data,

                success: function (response) {
                    console.log(response);

                    if (response.success) {
                        $('#massage').append('<div class="alert alert-success alert-block">' +
                            ' <button type="button" class="close" data-dismiss="alert">×</button>' +
                            ' <strong>'+response.msg+'</strong> </div>');

                    }
                    if (!response.success){

                        $('#massage').append('<div class="alert alert-danger alert-block">' +
                            ' <button type="button" class="close" data-dismiss="alert">×</button>' +
                            ' <strong>'+response.msg+'</strong> </div>');

                    }


                }
            })
        }

    })
});