<?php
use Slim\Factory\AppFactory;
use Slim\Views\TwigMiddleware;

require_once($_SERVER["DOCUMENT_ROOT"]."/slimmiddle/vendor/autoload.php");

require_once($_SERVER["DOCUMENT_ROOT"]."/slimmiddle/containerSetups.php");
$app = AppFactory::create();
$twigMiddleware = TwigMiddleware::createFromContainer($app);
$app->add($twigMiddleware);
require_once($_SERVER["DOCUMENT_ROOT"]."/slimmiddle/routes.php");
$app->run();
