function getComments(id) {
    $.ajax({
        type: 'GET',
        url: '/js/getComments.php?id=' + id,
        success: function(comments) {
            $("#comments").html(comments);
        }
    });
}

function addComment(id) {
    
    var sender = $("#sender").val();
    var content = $("#content").val();
    
    $.ajax({
        type: 'POST',
        url: '/js/addComment.php',
        data: {id: id, sender: sender, content: content}
    });
    
    $("#content").val("");
    
    getComments(id);
}