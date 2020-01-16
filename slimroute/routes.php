<?php
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

$app->setBasePath("/slimroute/public");
$app->post("/helloPost",
	function(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
		print("POSTメソッドでHello World!");
		return $response;
	}
);

$app->post("/showParams",
	function(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
		$postParams = $request->getParsedBody();
		$name = $postParams["name"];
		$age = $postParams["age"];
		print("送信されたパラメータ: 名前は".$name."で年齢が".$age);
		return $response;
	}
);

$app->get("/writeBody",
	function(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
		$content = "レスポンスボディに文字列を格納";
		$responseBody = $response->getBody();
		$responseBody->write($content);
		return $response;
	}
);

$app->any("/helloAny",
	function(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
		$method = $request->getMethod();
		$content = $method."メソッドでHello World!";
		$responseBody = $response->getBody();
		$responseBody->write($content);
		return $response;
	}
);

$app->map(["POST", "GET"], "/helloMap",
	function(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
		$content = "POSTまたはGETメソッドでHello World!";
		$responseBody = $response->getBody();
		$responseBody->write($content);
		return $response;
	}
);

$app->get("/showDetail/{id}",
	function(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
		$id = $args["id"];
		$content = "IDが".$id."の詳細です!";
		$responseBody = $response->getBody();
		$responseBody->write($content);
		return $response;
	}
);

$app->redirect("/google", "https://www.google.com/");
$app->redirect("/hey", "/slimroute/public/helloAny", 301);

$app->any("/redirectOrNot/{flg}",
	function(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
		$flg = $args["flg"];
		if($flg == 0) {
			$response = $response->withHeader("Location", "https://www.google.com/");
			$response = $response->withStatus(302);
		}
		else {
			$content = "リダイレクトは行いません";
			$responseBody = $response->getBody();
			$responseBody->write($content);
		}
		return $response;
	}
);
