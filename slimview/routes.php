<?php
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\Twig;

$app->setBasePath("/slimview/public");

$app->any("/getDataByJSON/{id}",
	function(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
		$id = $args["id"];
		$jsonArray = ["id" => $id, "name" => "田中和彦", "age" => 26];
		$jsonData = json_encode($jsonArray);
		$responseBody = $response->getBody();
		$responseBody->write($jsonData);
		$response = $response->withHeader("Content-Type", "application/json");
		return $response;
	}
);

$app->any("/helloTwig",
	function(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
		$twig = Twig::create($_SERVER["DOCUMENT_ROOT"]."/slimview/templates");
		$response = $twig->render($response, "hello.html");
		return $response;
	}
);

$app->any("/helloWithVals",
	function(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
		$assign["name"] = "夏目";
		$twig = Twig::create($_SERVER["DOCUMENT_ROOT"]."/slimview/templates");
		$response = $twig->render($response, "helloWithVals.html", $assign);
		return $response;
	}
);
