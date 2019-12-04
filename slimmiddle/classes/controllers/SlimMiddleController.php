<?php
namespace SocymSlim\SlimMiddle\controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Container\ContainerInterface;

class SlimMiddleController
{
	private $container;

	public function __construct(ContainerInterface $container)
	{
		$this->container = $container;
	}

	public function middlewareTest(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
	{
		$content = "<p>ミドルウェアのテスト。こちらはリクエスト処理。</p>";
		$responseBody = $response->getBody();
		$responseBody->write($content);
		return $response;
	}

	public function useTwigExtension(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
	{
		$twig = $this->container->get("view");
		$response = $twig->render($response, "withTwigExtension.html");
		return $response;
	}
}
