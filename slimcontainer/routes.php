<?php
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

$app->setBasePath("/slimcontainer/public");
$app->any("/helloWithContainer",
	function(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
		$assign["name"] = "コンテナ";
		$twig = $this->get("view");
		$response = $twig->render($response, "helloWithVals.html", $assign);
		return $response;
	}
);
$app->any("/writeToLog",
	function(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
		$logger = $this->get("logger");
		$logger->info("ログに書き出しました。"); 
		$content = "ログへの書き出し実験";
		$responseBody = $response->getBody();
		$responseBody->write($content);
		return $response;
	}
);
