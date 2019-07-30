<?php
use Slim\Factory\AppFactory;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

require($_SERVER["DOCUMENT_ROOT"]."/firstslim/vendor/autoload.php");
$app = AppFactory::create();

$app->get("/firstslim/public/hello",
	function(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface{
		print("Hello world!");
		return $response;
	}
);

$app->run();
