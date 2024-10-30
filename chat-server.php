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

    public function __construct(){
        $this->clients = new \SplObjectStorage;
    }
    ///metodo cuando se abre una conecion(del lado del servidor, osea la consola)
    public function onOpen(ConnectionInterface $conn){
        $this->clients->attach($conn);
        echo "Nuevo cliente conectado: {$conn->resourceId}\n";
    }
    ///metodo para manejar el envio de los mensajes
    public function onMessage(ConnectionInterface $from, $msg){
        $data = json_decode($msg, true);
        echo "Mensaje recibido: ", print_r($data, true);
        if ($data['action'] === 'setUsername') {
            $this->usernames[$from->resourceId] = $data['username'];
            $this->broadcastUserStatus();
            $this->notifyAll("{$data['username']} se ha unido.");
        } elseif ($data['action'] === 'sendMessage') {
            $username = $this->usernames[$from->resourceId] ?? 'Usuario';
            $time = date('H:i');
            $messageData = [
                'type' => 'message',
                'text' => $data['message'],
                'sender' => $username,
                'time' => $time 
            ];
            // Enviar el mensaje a todos los clientes conectados
            foreach ($this->clients as $client) {
                $client->send(json_encode($messageData));
            }
        }
    }
    //metodo cuando se cierra una conecion(del lado del servidor, osea la consola)
    public function onClose(ConnectionInterface $conn){
        $username = $this->usernames[$conn->resourceId] ?? "Usuario {$conn->resourceId}";
        $this->clients->detach($conn);
        unset($this->usernames[$conn->resourceId]);
        $this->broadcastUserStatus();
        $this->notifyAll("{$username} se ha desconectado.");
        echo "Cliente desconectado: {$conn->resourceId}\n";
    }
    ///MEtodo para recibir errores del lado de la consola
    public function onError(ConnectionInterface $conn, \Exception $e){
        echo "Error: {$e->getMessage()}\n";
        $conn->close();
    }
    ///metodo de impresion de mensajes de los usuarios
    protected function broadcastMessage($message){
        foreach ($this->clients as $client) {
            $client->send(json_encode(['type' => 'message', 'text' => $message]));
        }
    }
    ///metoso para impresion mensajes del servidos
    protected function broadcastUserStatus(){
        $userList = array_values($this->usernames);
        foreach ($this->clients as $client) {
            $client->send(json_encode([
                'type' => 'status',
                'text' => "Usuarios en línea: " . count($userList),
                'users' => $userList
            ]));
        }
    }
     ////proximamente para notificaciones
     protected function notifyAll($message){
        foreach ($this->clients as $client) {
            $client->send(json_encode(['type' => 'statusMessage', 'text' => $message]));
        }
    }
}
///para iniciar el servisor. NO LO TOQUEN
$server = IoServer::factory(
    new HttpServer(new WsServer(new Chat())),
    8080
);

$server->run();
