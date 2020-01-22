<?php
namespace SocymSlim\SlimController\controllers;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Container\ContainerInterface;

class ConstructorController
{
	private $container;

	public function __construct(ContainerInterface $container)
	{
		$this->container = $container;
	}
	
	public function helloWithContainer(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
	{
		$assign["name"] = "コントローラ";
		$twig = $this->container->get("view");
		$response = $twig->render($response, "helloWithVals.html", $assign);
		return $response;
	}
}
