<?php

declare(strict_types=1);

use Slim\Views\Twig;

return static function(array $settings) {
    return [
        Twig::class => function() use ($settings) {
            return new Twig($settings['rootDirectory'] . '/template');
        },

        PDO::class => function() use ($settings) {
            $dsn = sprintf(
                'mysql:host=%s;dbname=%s;charset=utf8;port=%s',
                $settings['connection']['host'],
                $settings['connection']['database'],
                $settings['connection']['port']
            );

            return new PDO(
                $dsn,
                $settings['connection']['username'],
                $settings['connection']['password'],
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]
            );
        },
    ];
};