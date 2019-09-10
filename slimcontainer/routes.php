<?php
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

$app->setBasePath("/slimcontainer/public");
$app->any("/helloWithContainer",
	function(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
		$assign["name"] = "コンテナ";
		$twig = $this->get("twig");
		$response = $twig->render($response, "helloWithVals.html", $assign);
		return $response;
	}
);
