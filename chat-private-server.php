<?php
require 'vendor/autoload.php';

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

class PrivateChat implements MessageComponentInterface {
    protected $clients;
    protected $userPairs = []; // Relación de usuario con conexión

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "Nuevo cliente conectado: {$conn->resourceId}\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $data = json_decode($msg, true);
        
        if ($data['action'] === 'setUser') {
            $this->userPairs[$from->resourceId] = $data['user_id'];
            echo "Usuario {$data['user_id']} configurado en el servidor con conexión {$from->resourceId}\n";
        } elseif ($data['action'] === 'sendMessage') {
            $senderId = $this->userPairs[$from->resourceId] ?? null;
            $receiverId = $data['receiver_id'];
            echo "Mensaje recibido de usuario {$senderId} para usuario {$receiverId}: {$data['message']}\n";
    
            $messageSent = false; // Para comprobar si se envía el mensaje al receptor
    
            foreach ($this->clients as $client) {
                if ($this->userPairs[$client->resourceId] === $receiverId) {
                    $client->send(json_encode([
                        'type' => 'message',
                        'text' => $data['message'],
                        'sender' => $senderId,
                        'time' => date('H:i')
                    ]));
                    $messageSent = true;
                    echo "Mensaje reenviado al usuario {$receiverId}\n";
                }
            }
    
            if (!$messageSent) {
                echo "Error: No se pudo enviar el mensaje al usuario {$receiverId}\n";
            }
        } elseif ($data['action'] === 'confirmation') {
            $receiverId = $this->userPairs[$from->resourceId] ?? null;
            $senderId = $data['sender_id'];
            echo "Confirmación de recepción para el usuario {$senderId}\n";
    
            foreach ($this->clients as $client) {
                if ($this->userPairs[$client->resourceId] === $senderId) {
                    $client->send(json_encode([
                        'type' => 'confirmation',
                        'receiver' => $receiverId,
                        'time' => date('H:i')
                    ]));
                }
            }
        }
    }
    
    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "Error en el servidor: {$e->getMessage()}\n";
        $conn->close();
    }
    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
        unset($this->userPairs[$conn->resourceId]);
        echo "Cliente desconectado: {$conn->resourceId}\n";
    }

   
}

$server = IoServer::factory(
    new HttpServer(new WsServer(new PrivateChat())),
    8081 // Puerto diferente para el chat privado
);

$server->run();
