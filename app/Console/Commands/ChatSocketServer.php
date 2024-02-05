<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use App\Http\Controllers\ChatSocketController;

class ChatSocketServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chatwebsocket:init';

    /**
     * The console command description.
     *
     * @var string
     */
      protected $description = 'Initializing Websocket server to receive and manage connections';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
             $server = \Ratchet\Server\IoServer::factory(
            new \Ratchet\Http\HttpServer(
            new \Ratchet\WebSocket\WsServer(
            new \App\Http\Controllers\ChatSocketController()
            )
            ),
            9091
            );
            $server->run();
    }
}
