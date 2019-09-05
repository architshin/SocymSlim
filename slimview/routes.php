<?php
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\Twig;

require_once("DotAccessData.php");

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

$app->any("/dotAccess",
	function(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
		$itemData = ["name"=>"黒ラベル", "price"=>260];
		$assign["item"] = $itemData;
		$dotAccessData = new DotAccessData();
		$assign["dotAccessData"] = $dotAccessData;
		$twig = Twig::create($_SERVER["DOCUMENT_ROOT"]."/slimview/templates");
		$response = $twig->render($response, "dotAccess.html", $assign);
		return $response;
	}
);

$app->any("/useFilter",
	function(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
		$assign["msg"] = "こんにちは。\nさようなら。";
		$twig = Twig::create($_SERVER["DOCUMENT_ROOT"]."/slimview/templates");
		$response = $twig->render($response, "useFilter.html", $assign);
		return $response;
	}
);
