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

$app->any("/ifStatement",
	function(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
		$assign["rand"] = rand(1, 3);
		$twig = Twig::create($_SERVER["DOCUMENT_ROOT"]."/slimview/templates");
		$response = $twig->render($response, "ifStatement.html", $assign);
		return $response;
	}
);

$app->any("/forStatement",
	function(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
		$validationMsgs[] = "お名前の入力は必須です。";
		$validationMsgs[] = "年齢は数値で入力してください。";
		$assign["validationMsgs"] = $validationMsgs;
		$twig = Twig::create($_SERVER["DOCUMENT_ROOT"]."/slimview/templates");
		$response = $twig->render($response, "forStatement.html", $assign);
		return $response;
	}
);

$app->any("/forStatement2",
	function(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
		$resultList = ["A"=>"田中", "B"=>"中野", "C"=>"野村"];
		$assign["resultList"] = $resultList;
		$twig = Twig::create($_SERVER["DOCUMENT_ROOT"]."/slimview/templates");
		$response = $twig->render($response, "forStatement2.html", $assign);
		return $response;
	}
);
