<form class="medium panel panel-default messageForm" action="message.php" method="post">
    <h1 class="fill text-center titleFont">Message somebody:</h1>
    <div class="form-group">
        <input type="text" id="receiver" class="form-control" name="receiverName" placeholder="Jack" oninput="getUsers()">
        <textarea name="content" rows="6" class="fill" placeholder="Say 'Hi!'"></textarea>
    </div>
    <input type="submit"  class="btn btn-success" name="submit" value="Send Message">
</form>
<script type="text/javascript" src="../Services/AJAX/messagingSystem.js"></script>
