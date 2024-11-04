///definicion de variables importantes
let socket;
const chatMessages = document.getElementById('chatMessages');
const messageInput = document.getElementById('message');
const sendButton = document.getElementById('send');
const connectButton = document.getElementById('connect');
const disconnectButton = document.getElementById('disconnect');
const onlineCount = document.getElementById('onlineCount');
const connectedUsersList = document.getElementById('connectedUsersList');
const dropdownToggle = document.getElementById('dropdownToggle');
const divUser = document.getElementById("userOnline");
const username = document.getElementById('userOnline').getAttribute('data-username');
/// Evento para conectarse al servidor WebSocket
connectButton.onclick = () => {
    socket = new WebSocket('ws://localhost:8080'); // Ruta del servidor
    /// Manejar la apertura de conexión
    socket.onopen = () => {
        console.log('Conectado al servidor WebSocket');
        socket.send(JSON.stringify({
            action: 'setUsername',
            username: username
        }));
        enableChat();
    };
    /// Manejar los mensajes entrantes
    socket.onmessage = function (event) {
        const data = JSON.parse(event.data);
        console.log('Mensaje recibido:', data);
        if (data.type === 'message') {
            addMessageToChat(data.text, data.sender, data.time);
        } else if (data.type === 'statusMessage') {
            addMessageToChat(data.text, 'status');
        } else if (data.type === 'status') {
            updateOnlineUsers(data.users);
            onlineCount.textContent = Object.keys(data.users).length;
        }
    };

    /// Manejar el cierre de conexión
    socket.onclose = () => {
        console.log('Desconectado del servidor WebSocket');
        disableChat();
    };

    /// Manejar errores
    socket.onerror = (error) => {
        console.error('Error en el WebSocket:', error);
    };
};

/// Enviar un mensaje
sendButton.onclick = () => {
    const message = messageInput.value.trim();
    if (message) {
        socket.send(JSON.stringify({
            action: 'sendMessage',
            message: message
        }));
        messageInput.value = '';
    } else {
        alert('No puedes enviar un mensaje vacío.');
    }
};

/// Desconectarse manualmente
disconnectButton.onclick = () => {
    socket.close();
};

/// Habilitar la interfaz del chat
function enableChat() {
    messageInput.disabled = false;
    sendButton.disabled = false;
    connectButton.disabled = true;
    disconnectButton.disabled = false;
    divUser.hidden = false;
}

/// Deshabilitar la interfaz del chat
function disableChat() {
    messageInput.disabled = true;
    sendButton.disabled = true;
    connectButton.disabled = false;
    disconnectButton.disabled = true;
    divUser.hidden = true;
}

/// Añadir un mensaje a la caja de mensajes
function addMessageToChat(text, sender = '', time = '') {
    const messageElement = document.createElement('div');
    messageElement.classList.add('chat-message');

    if (sender === username) { // Mensaje enviado por el usuario actual
        messageElement.classList.add('sent-message');
        messageElement.textContent = `${text} - ${time}`;
    } else if (sender === 'status') { // Mensaje del sistema
        messageElement.classList.add('sistem-message');
        messageElement.textContent = text; // No añadimos 'status -'
    } else { // Mensaje recibido de otro usuario
        messageElement.classList.add('received-message');
        messageElement.textContent = `${sender}: ${text} - ${time}`;
    }

    chatMessages.appendChild(messageElement);
    chatMessages.scrollTop = chatMessages.scrollHeight; // Auto-scroll
}

/// Actualizar la lista de usuarios en línea
function updateOnlineUsers(users) {
    if (!onlineCount) {
        console.error('No se encontró el elemento para el contador de usuarios en línea.');
        return;
    }
    if (Array.isArray(users)) {
        onlineCount.textContent = users.length; // Actualiza el contador con el número de usuarios conectados
    } else {
        console.error('El formato de usuarios no es válido:', users);
    }
}