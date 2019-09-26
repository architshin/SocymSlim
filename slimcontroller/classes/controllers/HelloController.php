<?php
namespace SocymSlim\SlimController\controllers;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class HelloController
{
	public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
	{
		$content = "コントローラクラスでHello World!";
		$responseBody = $response->getBody();
		$responseBody->write($content);
		return $response;
	}
}
