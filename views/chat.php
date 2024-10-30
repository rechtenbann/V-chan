<link rel="stylesheet" href="css/chat.css">
<div style="padding: 20px; ">

    <!-- Usuarios en línea -->
    <div id="userOnline" style="margin-bottom: 10px;" hidden>
        <span><strong>Usuarios en línea:</strong> <span id="onlineCount">0</span></span>
    </div>

    <!-- Dropdown de Usuarios conectados -->
    <div class="dropdown-container" id="dropdownContainer">
        <button id="dropdownToggle" hidden>Usuarios Conectados</button>
        <ul class="dropdown-menu" id="connectedUsersList"></ul>
    </div><br>
    <!-- Entrada de mensaje y botones -->


    <!-- Caja de mensajes -->
    <div id="chatMessages" class="chat-messages ace" style="background-color: White;">
    </div>
    <br><br>
    <textarea type="text" id="message" placeholder="Escribe un mensaje..." disabled></textarea>
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
        const divUser = document.getElementById("userOnline")
        connectButton.onclick = function() {
            socket = new WebSocket('ws://localhost:8080');

            socket.onopen = function() {
                console.log('Conectado al servidor WebSocket');
                socket.send(JSON.stringify({
                    action: 'setUsername',
                    username: username
                }));
                messageInput.disabled = false;
                sendButton.disabled = false;
                connectButton.disabled = true;
                disconnectButton.disabled = false;
                divUser.hidden = false;
                dropdownToggle.hidden = false;
                const text = `<strong>${username}</strong> se ha unido al chat.`;
                const textDiv = document.getElementById('text');
                const textSegments = text.split(/(<strong>.*?<\/strong>)/);
                textSegments.forEach(textSegment => {
                    if (textSegment.includes('strong')) {
                        const span = document.createElement('strong');
                        span.appendChild(document.createTextNode(textSegment.replace('<strong>', '').replace('</strong>', '')));
                        chatMessages.appendChild(span);
                    } else {
                        const text = document.createTextNode(textSegment);
                        chatMessages.appendChild(text);
                    }
                })
                //addMessageToChat();
            };

            socket.onmessage = function(event) {
                const data = JSON.parse(event.data);

                if (data.type === 'message') {
                    addMessageToChat(data.text);
                } else if (data.type === 'statusMessage') {
                    addMessageToChat(data.text, 'status');
                } else if (data.type === 'status') {
                    updateOnlineUsers(data.users);
                    onlineCount.textContent = Object.keys(data.users).length;
                }
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
                // 1. Mostrar el mensaje localmente
                // var msg = document.createElement("div");
                // msg.style.color="blue";
                // msg.style.backgroundColor = 'red';
                // msg.textContent = addMessageToChat(`${username}: ${message}`);
                // chatMessages.appendChild(msg);


                // 2. Enviar el mensaje al servidor
                socket.send(JSON.stringify({
                    action: 'sendMessage',
                    message: message
                }));

                // Limpiar el campo de entrada
                messageInput.value = '';
            } else {
                alert('No puedes enviar un mensaje vacío.');
            }
        };

        disconnectButton.onclick = function() {
            if (socket) {
                const text = `<strong>${username}</strong> se ha ido.`;
                const textDiv = document.getElementById('text');
                const textSegments = text.split(/(<strong>.*?<\/strong>)/);
                textSegments.forEach(textSegment => {
                    if (textSegment.includes('strong')) {
                        const span = document.createElement('strong');
                        span.appendChild(document.createTextNode(textSegment.replace('<strong>', '').replace('</strong>', '')));
                        chatMessages.appendChild(span);
                    } else {
                        const text = document.createTextNode(textSegment);
                        chatMessages.appendChild(text);
                    }

                })
                socket.close();
            }
        };

        function addMessageToChat(text, type = 'message') {
            const messageElement = document.createElement('div');
            messageElement.style.border = "2px solid black";
            messageElement.style.margin = "5px";
            messageElement.style.padding="5px";
            messageElement.textContent = text;
            if (type === 'status') {
                messageElement.style.color = 'gray';
            }
            chatMessages.appendChild(messageElement);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function updateOnlineUsers(users) {
            connectedUsersList.innerHTML = '';
            Object.values(users).forEach(user => {
                const userItem = document.createElement('li');
                userItem.textContent = user;
                connectedUsersList.appendChild(userItem);
            });
        }
    </script>

</div>