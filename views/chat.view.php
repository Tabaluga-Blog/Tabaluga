<div class="panel panel-default large centerBlock">
    <div class="panel-heading">
        <h2 class="text-center"><?= $receiver_name ?></h1>
    </div>
    
    <div class="panel-body chat">
        
        <div class="chatContainer">
            
            <?php foreach ($messages as $message) {
                $class = "";
                if ($message['name'] == $_SESSION['user']->getName()) {
                    $class = "message sent";
                } else {
                    $class = "message received";
                }
                
                echo "  <div class=\"{$class}\">
                            <p>
                                <span>
                                    {$message['name']}
                                </span>
                            {$message['content']}
                            </p>
                        </div>";
                
             } ?>
        </div>
        
        <hr>
        
        <div class="form-group">
            <form autocomplete="off"action="chat.php?id=<?=$receiver_id?>" method="post">
                <input class="form-control" type="text" name="content" placeholder="Message">
                
                <input class="btn btn-success" type="submit" name="chat" value="Send" >
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('.chatContainer').scrollTop($('.chatContainer')[0].scrollHeight);
</script>