<?php
require 'vendor/autoload.php';

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

class Chat implements MessageComponentInterface
{
    protected $clients;
    protected $usernames = [];

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
        echo "Nuevo cliente conectado: {$conn->resourceId}\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
{
    $data = json_decode($msg, true);
    echo "Mensaje recibido: ", print_r($data, true);

    if ($data['action'] === 'setUsername') {
        $this->usernames[$from->resourceId] = $data['username'];
        $this->broadcastUserStatus();
        $this->notifyAll("{$data['username']} se ha unido.");
    } elseif ($data['action'] === 'sendMessage') {
        $username = $this->usernames[$from->resourceId] ?? 'Usuario';
    
        // Obtener la hora actual en formato 'H:i'
        $time = date('H:i');
    
        // Construir el mensaje para incluir el tipo, el texto y la hora
        $messageData = [
            'type' => 'message',
            'text' => $data['message'],
            'sender' => $username,
            'time' => $time // Añadir la hora
        ];
    
        // Enviar el mensaje a todos los clientes conectados
        foreach ($this->clients as $client) {
            $client->send(json_encode($messageData));
        }
    }
    
}



    public function onClose(ConnectionInterface $conn)
    {
        $username = $this->usernames[$conn->resourceId] ?? "Usuario {$conn->resourceId}";
        $this->clients->detach($conn);
        unset($this->usernames[$conn->resourceId]);

        $this->broadcastUserStatus();
        $this->notifyAll("{$username} se ha desconectado.");
        echo "Cliente desconectado: {$conn->resourceId}\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "Error: {$e->getMessage()}\n";
        $conn->close();
    }

    protected function notifyAll($message)
    {
        foreach ($this->clients as $client) {
            $client->send(json_encode(['type' => 'statusMessage', 'text' => $message]));
        }
    }

    protected function broadcastMessage($message)
    {
        foreach ($this->clients as $client) {
            $client->send(json_encode(['type' => 'message', 'text' => $message]));
        }
    }

    protected function broadcastUserStatus()
    {
        $userList = array_values($this->usernames);

        foreach ($this->clients as $client) {
            $client->send(json_encode([
                'type' => 'status',
                'text' => "Usuarios en línea: " . count($userList),
                'users' => $userList  // Asegúrate de enviar esto como un array
            ]));
        }
    }
}

$server = IoServer::factory(
    new HttpServer(new WsServer(new Chat())),
    8080
);

$server->run();
