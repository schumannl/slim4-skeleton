<?php

declare(strict_types=1);

use Slim\App;
use Schumannl\Slim4Skeleton\LandingPage\LandingPageRequestHandler;

return static function (App $app) {
    $app->get('/index.php', LandingPageRequestHandler::class);
};