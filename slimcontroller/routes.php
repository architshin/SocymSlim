<?php
use SocymSlim\SlimController\controllers\SeveralHelloController;
use SocymSlim\SlimController\controllers\OneHelloController;
use SocymSlim\SlimController\controllers\ConstructorController;

$app->setBasePath("/slimcontroller/public");
$app->any("/several/showFirst", SeveralHelloController::class.":showFirst");
$app->any("/several/showSecond", SeveralHelloController::class.":showSecond");
$app->any("/one/sayHello", OneHelloController::class);
$app->any("/constructor/helloWithContainer", ConstructorController::class.":helloWithContainer");
