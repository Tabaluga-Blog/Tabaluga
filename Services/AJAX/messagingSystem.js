function getUsers() {
    $("#receiver").on('input', function() {
        $.ajax({
            type: 'POST',
            url: 'http://localhost:3000/'
        });
    });
}