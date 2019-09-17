<?php
use DI\Container;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$container = new Container();
$container->set("twig",
	function() {
		$twig = Twig::create($_SERVER["DOCUMENT_ROOT"]."/slimcontainer/templates");
		return $twig;
	}
);
$container->set("logger",
	function() {
		$logger = new Logger("slimcontainer");
		$fileHandler = new StreamHandler($_SERVER["DOCUMENT_ROOT"]."/slimcontainer/logs/app.log");
		$logger->pushHandler($fileHandler);
		return $logger;
	}
);
AppFactory::setContainer($container);
