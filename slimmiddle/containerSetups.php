<?php
use DI\Container;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;

$container = new Container();
$container->set("twig",
	function() {
		$twig = Twig::create($_SERVER["DOCUMENT_ROOT"]."/slimmiddle/templates");
		return $twig;
	}
);
AppFactory::setContainer($container);
