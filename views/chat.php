<div>
    <h1>Bienvenido, <?php echo $_SESSION['usuario']['usu_nombre']; ?></h1>
    <div id="chat"></div>
    <input type="text" id="message" placeholder="Escribe un mensaje...">
    <button id="send">Enviar</button>
    <button id="disconnect">Desconectar</button>
    <div id="chatMessages" style="border: 1px solid #ccc; height: 300px; overflow-y: scroll; padding: 10px;">
        <!-- Los mensajes se agregarán aquí dinámicamente -->
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const socket = new WebSocket('ws://localhost:8080');
            const username = '<?php echo $_SESSION["usuario"]["usu_nombre"]; ?>';

            socket.onopen = function() {
                console.log('Conectado al servidor WebSocket');
                socket.send(JSON.stringify({ action: 'setUsername', username: username }));
            };

            socket.onmessage = function(event) {
                const data = JSON.parse(event.data);
                const chatMessages = document.getElementById('chatMessages');

                if (data.type === 'message') {
                    // Crear un nuevo elemento para el mensaje
                    const messageElement = document.createElement('div');
                    messageElement.textContent = data.text;
                    chatMessages.appendChild(messageElement);
                } else if (data.type === 'status') {
                    // Crear un nuevo elemento para el estado
                    const statusElement = document.createElement('div');
                    statusElement.textContent = data.text;

                    const usersList = Object.keys(data.users).map(id => data.users[id]).join(', ');
                    const usersElement = document.createElement('div');
                    usersElement.textContent = 'Usuarios conectados: ' + usersList;

                    chatMessages.appendChild(statusElement);
                    chatMessages.appendChild(usersElement);
                }

                // Desplazarse hacia abajo automáticamente
                chatMessages.scrollTop = chatMessages.scrollHeight;
            };

            document.getElementById('send').onclick = function() {
                const messageInput = document.getElementById('message');
                const message = messageInput.value.trim();
                
                if (message) {
                    console.log('Enviando mensaje:', message); // Debug
                    socket.send(JSON.stringify({ action: 'sendMessage', message: message }));
                    messageInput.value = ''; // Limpiar el campo de entrada
                } else {
                    alert('No puedes enviar un mensaje vacío.');
                }
            };

            document.getElementById('disconnect').onclick = function() {
                socket.close();
            };

            socket.onclose = function() {
                console.log('Desconectado del servidor WebSocket');
            };

            socket.onerror = function(error) {
                console.log('Error en el WebSocket: ', error);
            };
        });
    </script>
</div>
