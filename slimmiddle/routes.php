<?php
use SocymSlim\SlimMiddle\controllers\SlimMiddleController;
use SocymSlim\SlimMiddle\middlewares\RecordIPAddress;
use SocymSlim\SlimMiddle\middlewares\RecordIPAddressBefore;
use SocymSlim\SlimMiddle\middlewares\BeforeAndAfter;
use SocymSlim\SlimMiddle\middlewares\Outer;
use SocymSlim\SlimMiddle\middlewares\RecordIPAddressToLog;

$app->setBasePath("/slimmiddle/public");
$app->any("/doRecordIPAddress", SlimMiddleController::class.":middlewareTest")->add(new RecordIPAddress());
$app->any("/doRecordIPAddressBefore", SlimMiddleController::class.":middlewareTest")->add(new RecordIPAddressBefore());
$app->any("/beforeAndAfter", SlimMiddleController::class.":middlewareTest")->add(new BeforeAndAfter());
$app->any("/nested", SlimMiddleController::class.":middlewareTest")->add(new BeforeAndAfter())->add(new Outer());
$app->any("/doRecordIPAddressToLog", SlimMiddleController::class.":middlewareTest")->add(new RecordIPAddressToLog($container));
