<?php
require 'vendor/autoload.php';

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
class Chat implements MessageComponentInterface {
    protected $clients;
    protected $usernames = [];
    protected $userMessageCounts = [];  // Contador de mensajes duplicados
    protected $blockedUsers = [];  // Lista de usuarios bloqueados temporalmente

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "Nuevo cliente conectado: {$conn->resourceId}\n";
    }

    protected $penaltyDuration = 60; // Duración de la penalización en segundos

    public function onMessage(ConnectionInterface $from, $msg) {
        $data = json_decode($msg, true);
        echo "Mensaje recibido: ", print_r($data, true);
    
        if ($data['action'] === 'setUsername') {
            $this->usernames[$from->resourceId] = $data['username'];
            $this->broadcastUserStatus();
            $this->notifyAll("{$data['username']} se ha unido.");
        } elseif ($data['action'] === 'sendMessage') {
            $username = $this->usernames[$from->resourceId] ?? 'Usuario';
            $time = date('H:i');
    
            // Verificar si el usuario está bloqueado por spam
            if (isset($this->blockedUsers[$from->resourceId]) && time() < $this->blockedUsers[$from->resourceId]) {
                $remainingTime = $this->blockedUsers[$from->resourceId] - time();
                $from->send(json_encode([
                    'type' => 'statusMessage', 
                    'text' => "Estás bloqueado temporalmente por spam.",
                    'penaltyTime' => $remainingTime
                ]));
                return;
            }
    
            // Verificar si el mensaje es duplicado
            if (isset($this->userMessageCounts[$from->resourceId]) && $this->userMessageCounts[$from->resourceId]['message'] === $data['message']) {
                $this->userMessageCounts[$from->resourceId]['count']++;
    
                if ($this->userMessageCounts[$from->resourceId]['count'] === 2) {
                    // Envía el segundo mensaje y luego la advertencia
                    $this->sendMessageToAll($data['message'], $username, $time);
                    $from->send(json_encode(['type' => 'statusMessage', 'text' => "Advertencia: has enviado el mismo mensaje dos veces."]));
                } elseif ($this->userMessageCounts[$from->resourceId]['count'] >= 3) {
                    // Notificar al usuario que será bloqueado y luego desconectarlo por spam
                    $this->blockedUsers[$from->resourceId] = time() + $this->penaltyDuration;
                    $from->send(json_encode([
                        'type' => 'statusMessage',
                        'text' => "Se te desconectó por spam.",
                        'penaltyTime' => $this->penaltyDuration // Envía la duración de penalización
                    ]));
                    $from->close();
    
                    // Notificar a los demás usuarios de la desconexión por spam
                    $this->notifyAll("Se desconectó al usuario {$username} por spam.");
                }
            } else {
                // Reinicia el contador si el mensaje es diferente
                $this->userMessageCounts[$from->resourceId] = ['message' => $data['message'], 'count' => 1];
                $this->sendMessageToAll($data['message'], $username, $time);
            }
        }
    }
    
    

    public function onClose(ConnectionInterface $conn) {
        $username = $this->usernames[$conn->resourceId] ?? "Usuario {$conn->resourceId}";
        $this->clients->detach($conn);
        unset($this->usernames[$conn->resourceId]);
        unset($this->userMessageCounts[$conn->resourceId]);
        unset($this->blockedUsers[$conn->resourceId]);

        $this->broadcastUserStatus();
        $this->notifyAll("{$username} se ha desconectado.");
        echo "Cliente desconectado: {$conn->resourceId}\n";
    }

    protected function sendMessageToAll($message, $username, $time) {
        $messageData = [
            'type' => 'message',
            'text' => $message,
            'sender' => $username,
            'time' => $time
        ];

        foreach ($this->clients as $client) {
            $client->send(json_encode($messageData));
        }
    }

    protected function broadcastUserStatus() {
        $userList = array_values($this->usernames);
        foreach ($this->clients as $client) {
            $client->send(json_encode([
                'type' => 'status',
                'text' => "Usuarios en línea: " . count($userList),
                'users' => $userList
            ]));
        }
    }

    protected function notifyAll($message) {
        foreach ($this->clients as $client) {
            $client->send(json_encode(['type' => 'statusMessage', 'text' => $message]));
        }
    }
    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "Error: {$e->getMessage()}\n";
        $conn->close();
    }
}



///para iniciar el servisor. NO LO TOQUEN
$server = IoServer::factory(
    new HttpServer(new WsServer(new Chat())),
    8080
);

$server->run();
