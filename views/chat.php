<link rel="stylesheet" href="css/chat.css">
<div style="padding: 20px;">
    <!-- Usuarios en línea -->
    <div id="userOnline" data-username="<?php echo $_SESSION['usuario']['usu_nombre']; ?>" style="margin-bottom: 10px;" hidden>
        <span><strong>Usuarios en línea:</strong> <span id="onlineCount">0</span></span>
    </div>
    <!-- Conectar y desconectar del servidor-->
    <button id="connect">Conectar</button>
    <button id="disconnect" disabled>Desconectar</button>
    <!-- Caja de mensajes -->
    <div class="chat-container">
    <div id="chatMessages" class="chat-messages"></div>
    <div class="chat-input">
        <textarea id="message" placeholder="Escribe un mensaje..." disabled></textarea>
        <button id="send" disabled>Enviar</button>
    </div>
</div>

    <script src="js/chat.js"></script>
</div>