<?php

declare(strict_types=1);

use Slim\App;
use Sumi\TransactionDetails\RequestHandler\IndexRequestHandler;

return static function (App $app) {
    $app->get('/index.php', IndexRequestHandler::class);
};