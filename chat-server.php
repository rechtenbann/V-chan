<?php
require 'vendor/autoload.php'; // Asegúrate de que este sea el correcto

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

class Chat implements MessageComponentInterface {
    protected $clients;
    protected $usernames = [];

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        $this->broadcastUserStatus();
        echo "Nuevo cliente conectado: {$conn->resourceId}\n"; 
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $data = json_decode($msg, true);
        echo "Mensaje recibido: ", print_r($data, true); 

        if (isset($data['action'])) {
            if ($data['action'] === 'sendMessage') {
                $this->broadcastMessage($from, $data['message']);
            } elseif ($data['action'] === 'setUsername') {
                $this->usernames[$from->resourceId] = $data['username'];
                $this->broadcastUserStatus();
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
        unset($this->usernames[$conn->resourceId]);
        $this->broadcastUserStatus();
        echo "Cliente desconectado: {$conn->resourceId}\n"; 
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "Ha ocurrido un error: {$e->getMessage()}\n";
        $conn->close();
    }

    protected function broadcastMessage(ConnectionInterface $from, $message) {
        $username = $this->usernames[$from->resourceId] ?? 'Usuario';
        $fullMessage = "{$username}: {$message}";

        foreach ($this->clients as $client) {
            if ($from !== $client) {
                $client->send(json_encode(['type' => 'message', 'text' => $fullMessage]));
            }
        }
    }

    protected function broadcastUserStatus() {
        $onlineUsers = array_keys($this->usernames);
        $userCount = count($onlineUsers);
        $statusMessage = "Usuarios en línea: $userCount";

        foreach ($this->clients as $client) {
            $client->send(json_encode([
                'type' => 'status',
                'text' => $statusMessage,
                'users' => $this->usernames
            ]));
        }
    }
}

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new Chat()
        )
    ),
    8080
);

$server->run();
