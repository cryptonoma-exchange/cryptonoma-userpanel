<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class WebSocketServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'websocket:init';

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
		$app = new \Ratchet\Http\HttpServer(
            new \Ratchet\WebSocket\WsServer(
                new  \App\Http\Controllers\WebSocketController()
            )
        );

        $loop = \React\EventLoop\Factory::create();

        $secure_websockets = new \React\Socket\Server(config("app.websocket.server_url"), $loop);
        $secure_websockets = new \React\Socket\SecureServer($secure_websockets, $loop, [
            'local_cert' => config("app.websocket.crt_path"),
            'local_pk' => config("app.websocket.key_path"),
            'allow_self_signed' => FALSE, // Allow self signed certs (should be false in production)
            'verify_peer' => FALSE
        ]);

        $secure_websockets_server = new \Ratchet\Server\IoServer($app, $secure_websockets, $loop);
        $secure_websockets_server->run();
        
    }
}
