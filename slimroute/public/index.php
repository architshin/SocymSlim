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

$app->post("/slimroute/public/showParams",
	function(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
		$postParams = $request->getParsedBody();
		$name = $postParams["name"];
		$age = $postParams["age"];
		print("送信されたパラメータ: 名前は".$name."で年齢が".$age);
		return $response;
	}
);

$app->get("/slimroute/public/writeBody",
	function(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
		$content = "レスポンスボディに文字列を格納";
		$responseBody = $response->getBody();
		$responseBody->write($content);
		return $response;
	}
);

$app->any("/slimroute/public/helloAny",
	function(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
		$method = $request->getMethod();
		$content = $method."メソッドでHello World!";
		$responseBody = $response->getBody();
		$responseBody->write($content);
		return $response;
	}
);

$app->run();
