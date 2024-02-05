<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use App\Http\Controllers\Mobilep2pWebSocketController;

class MobileWebSocketServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mobilewebsocket:init';

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
            $server = IoServer::factory(
            new HttpServer(
                 new WsServer(
                     new Mobilep2pWebSocketController()
                 )
            ),
            8596
            );
            $server->run();

        /*
		$app = new \Ratchet\Http\HttpServer(
            new \Ratchet\WebSocket\WsServer(
            new  \App\Http\Controllers\WebSocketController()
            )
            );

            $loop = \React\EventLoop\Factory::create();

            $secure_websockets = new \React\Socket\Server('165.227.176.228:9090', $loop);
            $secure_websockets = new \React\Socket\SecureServer($secure_websockets, $loop, [
            'local_cert' => '/home/admin/conf/web/crt.pem',
            'local_pk' => '/home/admin/conf/web/key.pem',
            'allow_self_signed' => FALSE, // Allow self signed certs (should be false in production)
            'verify_peer' => FALSE
            ]);

            $secure_websockets_server = new \Ratchet\Server\IoServer($app, $secure_websockets, $loop);
            $secure_websockets_server->run();
        */
    }
}
