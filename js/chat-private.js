// chat-private.js

let socket;
const chatMessages = document.getElementById('chatMessages');
const messageInput = document.getElementById('message');
const sendButton = document.getElementById('send');

// Conectar al servidor WebSocket
function connectToChat() {
    socket = new WebSocket('ws://localhost:8081');

    socket.onopen = () => {
        console.log('Conectado al servidor de chat privado');
        enableChat();
        
        // Notificar al servidor del ID del usuario actual y del receptor
        console.log(`Estableciendo ID de usuario actual: ${currentUserId}, ID del receptor: ${receiverId}`);
        socket.send(JSON.stringify({
            action: 'setUser',
            user_id: currentUserId,
            receiver_id: receiverId
        }));
    };
    
    socket.onmessage = function (event) {
        const data = JSON.parse(event.data);
        
        console.log("Mensaje recibido:", data); // Esto debería aparecer en la consola
    
        if (data.type === 'message') {
            addMessageToChat(data.text, data.sender, data.time);
            socket.send(JSON.stringify({ action: 'confirmation', sender_id: data.sender }));
        } else if (data.type === 'confirmation') {
            console.log(`Mensaje recibido por el usuario a las ${data.time}`);
        } else if (data.type === 'error') {
            alert(`Error: ${data.message}`);
            console.error(`Error recibido del servidor: ${data.message}`);
        } else if (data.type === 'connectionStatus') {
            handleConnectionStatus(data); // Maneja el mensaje de estado de conexión
        }
    };
    
}

// Manejar el estado de la conexión
function handleConnectionStatus(data) {
    if (data.status === 'connected') {
        showNotification(`Te conectaste. El usuario del ID: ${data.otherUserId} se conectó. Listo para el chat.`);
    } else {
        showNotification(`Te conectaste. El usuario del ID: ${data.otherUserId} no está conectado. No hay chat.`);
    }
}


// Evento para enviar mensaje
sendButton.onclick = () => {
    const message = messageInput.value.trim();
    if (message) {
        console.log("Enviando mensaje:", message); 
        socket.send(JSON.stringify({
            action: 'sendMessage',
            message: message,
            receiver_id: receiverId
        }));
        addMessageToChat(message, 'Tú', new Date().toLocaleTimeString());
        messageInput.value = '';
    } else {
        alert('No puedes enviar un mensaje vacío.');
    }
};

// Función para habilitar el chat
function enableChat() {
    messageInput.disabled = false;
    sendButton.disabled = false;
}

// Función para deshabilitar el chat
function disableChat() {
    messageInput.disabled = true;
    sendButton.disabled = true;
}

// Añadir mensaje al chat
function addMessageToChat(text, sender, time) {
    const messageElement = document.createElement('div');
    messageElement.classList.add('chat-message');
    messageElement.textContent = `${sender}: ${text} - ${time}`;
    chatMessages.appendChild(messageElement);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

// Mostrar notificación en la interfaz
function showNotification(message) {
    const notificationElement = document.createElement('div');
    notificationElement.classList.add('notification');
    notificationElement.textContent = message;
    chatMessages.appendChild(notificationElement);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

// Conectar automáticamente cuando se carga la página
document.addEventListener('DOMContentLoaded', connectToChat);
