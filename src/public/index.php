<?php

declare(strict_types=1);

use DI\ContainerBuilder;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

try {
    // Create settings
    $settings = (require(__DIR__ . '/../config/settings.php'))(getenv());

    // Create container
    $definitions = (require(__DIR__ . '/../config/definitions.php'))($settings);
    $container = (new ContainerBuilder())->addDefinitions($definitions)->build();

    // Create application
    AppFactory::setContainer($container);
    $app = AppFactory::create();

    // Register middleware
    (require(__DIR__ . '/../config/middleware.php'))($app, $settings);

    // Register routes
    (require(__DIR__ . '/../config/routes.php'))($app);

    $app->run();
} catch (Throwable $exception) {
    echo $exception->getMessage();
}
