<?php
namespace SocymSlim\SlimMiddle\middlewares;

use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Outer implements MiddlewareInterface
{
	public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
	{
		print("<p>リクエスト処理の前の外側のミドルウェア</p>");

		$response = $handler->handle($request);

		$content = "<p>リクエスト処理の後の外側のミドルウェア</p>";
		$responseBody = $response->getBody();
		$responseBody->write($content);
		
		return $response;
	}
}
