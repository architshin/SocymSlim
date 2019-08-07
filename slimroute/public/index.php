<?php
use Slim\Factory\AppFactory;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

require_once($_SERVER["DOCUMENT_ROOT"]."/slimroute/vendor/autoload.php");

$app = AppFactory::create();

$app->post("/slimroute/public/helloPost",
	function(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
		print("POSTメソッドでHello World!");
		return $response;
	}
);

$app->run();
