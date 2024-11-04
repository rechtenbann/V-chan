<link rel="stylesheet" href="css/chat.css">

<div style="padding: 20px;">
    <h2>Chat Privado con Usuario ID: <?php echo $profile_id; ?></h2>
    
    <div class="chat-container">
        <div id="chatMessages" class="chat-messages"></div>
        <div class="chat-input">
            <textarea id="message" placeholder="Escribe un mensaje..." disabled></textarea>
            <button id="send" disabled>Enviar</button>
        </div>
    </div>

    <script src="js/chat-private.js"></script>
    <script>
        const currentUserId = <?php echo json_encode($current_user_id); ?>;
        const receiverId = <?php echo json_encode($profile_id); ?>;
    </script>
</div>
