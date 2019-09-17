<?php
use SocymSlim\SlimController\controllers\HelloController;

$app->any("/helloWithInvokableController", HelloController::class);
