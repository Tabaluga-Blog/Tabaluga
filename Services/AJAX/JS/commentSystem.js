var userId;

function getComments(id, logUserId) {
    userId = logUserId;
    $.ajax({
        type: 'GET',
        url: 'http://localhost:3000/Services/AJAX/PHP/getComments.php?id=' + id,
        success: function(comments) {
            $("#comments").html(comments);
        }
    });
}

function addComment(id) {
    console.log("magic");
    var sender = $("#sender").val();
    var content = $("#content").val();
    
    $.ajax({
        type: 'POST',
        url: 'http://localhost:3000/Services/AJAX/PHP/addComment.php',
        data: {
                id: id,
                sender: sender, 
                content: content,
                userId: userId
            },
        success: function (responce){
            if (responce === "ERROR") {
                $("#content").val("Something went wrong.");
                $("#content").prop("disabled", true);
                $("#addComment").prop("disabled", true);
            }
        }
    });
    
    $("#content").val("");
    
    getComments(id, userId);
}