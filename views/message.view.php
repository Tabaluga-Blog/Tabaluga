<form class="medium panel panel-default messageForm" action="message.php" method="post">
    <h1 class="fill text-center titleFont">Who do you want to text?</h1>
    <div class="form-group">
        <input type="text" id="receiver" class="form-control" name="receiverName" placeholder="Jack" oninput="getUsers()">
        <div id="found">
            
        </div>
    </div>
</form>

<script type="text/javascript" src="./../Services/AJAX/JS/messagingSystem.js"></script>
