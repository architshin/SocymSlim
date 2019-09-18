<?php
use SocymSlim\SlimController\controllers\HelloController;

$app->setBasePath("/slimcontroller/public");
$app->any("/helloWithInvokableController", HelloController::class);
