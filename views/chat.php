<div>
    <h1>Bienvenido, <?php echo $_SESSION['usuario']['usu_nombre']; ?></h1>
    <div id="chat"></div>
    <input type="text" id="message" placeholder="Escribe un mensaje..." disabled>
    <button id="send" disabled>Enviar</button>
    <button id="connect">Conectar</button>
    <button id="disconnect" disabled>Desconectar</button>
    <div id="chatMessages" style="border: 1px solid #ccc; height: 300px; overflow-y: scroll; padding: 10px;">
    </div>
    <script>
        let socket;
        const chatMessages = document.getElementById('chatMessages');
        const messageInput = document.getElementById('message');
        const sendButton = document.getElementById('send');
        const connectButton = document.getElementById('connect');
        const disconnectButton = document.getElementById('disconnect');
        const username = '<?php echo $_SESSION["usuario"]["usu_nombre"]; ?>';

        connectButton.onclick = function() {
            socket = new WebSocket('ws://localhost:8080');

            socket.onopen = function() {
                console.log('Conectado al servidor WebSocket');
                socket.send(JSON.stringify({ action: 'setUsername', username: username }));
                messageInput.disabled = false;
                sendButton.disabled = false;
                connectButton.disabled = true;
                disconnectButton.disabled = false;
            };

            socket.onmessage = function(event) {
                const data = JSON.parse(event.data);

                if (data.type === 'message') {
                    const messageElement = document.createElement('div');
                    messageElement.textContent = data.text;
                    chatMessages.appendChild(messageElement);
                } else if (data.type === 'status') {
                    const statusElement = document.createElement('div');
                    statusElement.textContent = data.text;

                    const usersList = Object.keys(data.users).map(id => data.users[id]).join(', ');
                    const usersElement = document.createElement('div');
                    usersElement.textContent = 'Usuarios conectados: ' + usersList;

                    chatMessages.appendChild(statusElement);
                    chatMessages.appendChild(usersElement);
                }

                chatMessages.scrollTop = chatMessages.scrollHeight;
            };

            socket.onclose = function() {
                console.log('Desconectado del servidor WebSocket');
                messageInput.disabled = true;
                sendButton.disabled = true;
                connectButton.disabled = false;
                disconnectButton.disabled = true;
            };

            socket.onerror = function(error) {
                console.log('Error en el WebSocket: ', error);
            };
        };

        sendButton.onclick = function() {
            const message = messageInput.value.trim();
            
            if (message) {
                console.log('Enviando mensaje:', message);
                socket.send(JSON.stringify({ action: 'sendMessage', message: message }));
                messageInput.value = ''; 
            } else {
                alert('No puedes enviar un mensaje vacío.');
            }
        };

        disconnectButton.onclick = function() {
            if (socket) {
                socket.close();
            }
        };
    </script>
</div>
