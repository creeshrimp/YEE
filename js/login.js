$(document).ready(function () {
    "use strict";
    $("#submit").click(function () {

        var username = $("#username").val(), password = $("#password").val();

        if ((username === "") || (password === "")) {
            $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Please enter a username and a password</div>");
        } else {
            $.ajax({
                type: "POST",
                url: "login/checklogin.php",
                data: "username=" + username + "&password=" + password,
                dataType: 'JSON',
                success: function (html) {
                    if (html.response === 'success') {
                        location.reload();
                    } else {
                        $("#message").html(html.response);
                    }
                },
                error: function (textStatus, errorThrown) {
                    console.log(textStatus);
                    console.log(errorThrown);
                },
                beforeSend: function () {
                    $("#message").html("<p class='text-center'><img src='login/images/ajax-loader.svg'></p>");
                }
            });
        }
        return false;
    });
});
