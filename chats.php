<h3>Chats Activos</h3>
<div class="chat-list">
    <?php
    $userId = $_SESSION['usuario']['id'];
    $sql = "SELECT DISTINCT sender_id, receiver_id FROM chat_requests WHERE (sender_id = '$userId' OR receiver_id = '$userId') AND status = 'accepted'";
    $query = mysqli_query($link, $sql);

    if (mysqli_num_rows($query) > 0) {
        while ($chat = mysqli_fetch_assoc($query)) {
            $chatPartnerId = ($chat['sender_id'] == $userId) ? $chat['receiver_id'] : $chat['sender_id'];
            $userQuery = mysqli_query($link, "SELECT usu_nombre FROM usuarios WHERE id = '$chatPartnerId'");
            $user = mysqli_fetch_assoc($userQuery); ?>
            <div class='chat'>
                <p style="color:white;">Chat con:<?php echo $user['usu_nombre'] ?></p>
                <form action='chat-private.php' method='GET'>
                    <button type='submit'>Ir al chat</button>
                    <input type='hidden' name='chat_with' value='<?php echo $chatPartnerId; ?>'>

                </form>
            </div>
    <?php }
    } else {
        echo "<p>No tienes chats activos.</p>";
    }
    ?>
</div>