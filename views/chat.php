<link rel="stylesheet" href="css/chat.css">
<div style="padding: 20px;">
    <!-- Usuarios en línea -->
    <div id="userOnline" style="margin-bottom: 10px;" hidden>
        <span><strong>Usuarios en línea:</strong> <span id="onlineCount">0</span></span>
    </div>

    <!-- Dropdown de usuarios conectados -->
    <div class="dropdown-container" id="dropdownContainer">
        <button id="dropdownToggle" hidden>Usuarios Conectados</button>
        <ul class="dropdown-menu" id="connectedUsersList"></ul>
    </div><br>

    <!-- Caja de mensajes -->
    <div id="chatMessages" class="chat-messages ace" style="background-color: white;"></div>
    <br><br>

    <textarea id="message" placeholder="Escribe un mensaje..." disabled></textarea>
    <button id="send" disabled>Enviar</button>
    <button id="connect">Conectar</button>
    <button id="disconnect" disabled>Desconectar</button>

    <script>
        let socket;
        const chatMessages = document.getElementById('chatMessages');
        const messageInput = document.getElementById('message');
        const sendButton = document.getElementById('send');
        const connectButton = document.getElementById('connect');
        const disconnectButton = document.getElementById('disconnect');
        const onlineCount = document.getElementById('onlineCount');
        const connectedUsersList = document.getElementById('connectedUsersList');
        const dropdownToggle = document.getElementById('dropdownToggle');
        const username = '<?php echo $_SESSION["usuario"]["usu_nombre"]; ?>';
        const divUser = document.getElementById("userOnline");

        connectButton.onclick = () => {
            socket = new WebSocket('ws://localhost:8080');

            socket.onopen = () => {
                console.log('Conectado al servidor WebSocket');
                socket.send(JSON.stringify({
                    action: 'setUsername',
                    username
                }));
                enableChat();

                // Mover la asignación de onmessage aquí
                socket.onmessage = function(event) {
                    const data = JSON.parse(event.data);

                    if (data.type === 'message') {
                        addMessageToChat(data.text, data.sender, data.time); // Pasar el tiempo también
                    } else if (data.type === 'statusMessage') {
                        addMessageToChat(data.text, 'status');
                    } else if (data.type === 'status') {
                        updateOnlineUsers(data.users);
                        onlineCount.textContent = Object.keys(data.users).length;
                    }
                };
            };

            socket.onclose = () => {
                console.log('Desconectado del servidor WebSocket');
                disableChat();
            };

            socket.onerror = (error) => {
                console.error('Error en el WebSocket:', error);
            };
        };

        sendButton.onclick = () => {
            const message = messageInput.value.trim();
            if (message) {
                socket.send(JSON.stringify({
                    action: 'sendMessage',
                    message
                }));
                messageInput.value = '';
            } else {
                alert('No puedes enviar un mensaje vacío.');
            }
        };

        disconnectButton.onclick = () => {
            socket.close();
        };

        function enableChat() {
            messageInput.disabled = false;
            sendButton.disabled = false;
            connectButton.disabled = true;
            disconnectButton.disabled = false;
            divUser.hidden = false;
            dropdownToggle.hidden = false;
        }

        function disableChat() {
            messageInput.disabled = true;
            sendButton.disabled = true;
            connectButton.disabled = false;
            disconnectButton.disabled = true;
            divUser.hidden = true;
            dropdownToggle.hidden = true;
        }


        socket.onmessage = function(event) {
            const data = JSON.parse(event.data);

            if (data.type === 'message') {
                addMessageToChat(data.text, data.sender, data.time); // Pasar el tiempo también
            } else if (data.type === 'statusMessage') {
                addMessageToChat(data.text, 'status');
            } else if (data.type === 'status') {
                updateOnlineUsers(data.users);
                onlineCount.textContent = Object.keys(data.users).length;
            }
        };

        function addMessageToChat(text, sender = '', time = '') {
            const messageElement = document.createElement('div');
            messageElement.classList.add('chat-message');

            // Verificar si el mensaje es del usuario actual o de otro usuario
            if (sender === username) {
                // Mensaje enviado
                messageElement.classList.add('sent-message');
                messageElement.textContent = `${text} - ${time}`; // Texto y hora para mensajes enviados
            } else if(sender=="status"){
                messageElement.classList.add('sistem-message');
                messageElement.textContent = `${sender} - ${text}`;
            }else {
                // Mensaje recibido
                messageElement.classList.add('received-message');
                messageElement.textContent = `${sender}: ${text} - ${time}`; // Texto y hora para mensajes recibidos
            }

            chatMessages.appendChild(messageElement);
            chatMessages.scrollTop = chatMessages.scrollHeight; // Desplazar hacia el último mensaje
        }


        function updateOnlineUsers(users) {
            connectedUsersList.innerHTML = '';

            // Validar si 'users' es un array antes de usar forEach
            if (Array.isArray(users)) {
                users.forEach(user => {
                    const userItem = document.createElement('li');
                    userItem.textContent = user;
                    connectedUsersList.appendChild(userItem);
                });
            } else {
                console.error('El formato de usuarios no es válido:', users);
            }
        }
    </script>
</div>