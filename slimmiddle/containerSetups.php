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
$container->set("logger",
	function() {
		$logger = new Logger("slimcontainer");
		$fileHandler = new StreamHandler($_SERVER["DOCUMENT_ROOT"]."/slimmiddle/logs/app.log");
		$logger->pushHandler($fileHandler);
		return $logger;
	}
);
AppFactory::setContainer($container);
