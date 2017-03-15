function getUsers() {
    $("#receiver").on('input', function() {
        var suggest = $("#receiver").val();
        if (suggest.length != 0) {
            $.ajax({
                type: 'POST',
                url: 'http://localhost:3000/Services/AJAX/PHP/getUsers.php',
                data: {sugg: suggest},
                success: function(responce) {
                    $("#found").html(responce);
                }
            });
        } else {
            $("#found").html("");
        }
    });
}