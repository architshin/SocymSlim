<?php
use SocymSlim\SlimController\controllers\HelloController;
use SocymSlim\SlimController\controllers\SeveralMethodsController;
use SocymSlim\SlimController\controllers\ConstructorController;

$app->setBasePath("/slimcontroller/public");
$app->any("/helloWithInvokableController", HelloController::class);
$app->any("/several/showFirst", SeveralMethodsController::class.":showFirst");
$app->any("/several/showSecond", SeveralMethodsController::class.":showSecond");
$app->any("/constructor/helloWithContainer", ConstructorController::class.":helloWithContainer");
