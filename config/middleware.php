<?php

declare(strict_types=1);

use Slim\App;

return static function(App $application, array $settings) {
    if ($settings['debug']) {
        $application->addErrorMiddleware(true, true, true);
    }
};