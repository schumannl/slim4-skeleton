<?php

declare(strict_types=1);

return static function (array $environment) {
    return [
        'debug' => (bool)($environment['DEBUG'] ?? true),
        'rootDirectory' => realpath(__DIR__ . '/..'),
        'connection' => [
            'host' => $environment['MYSQL_HOST'],
            'port' => $environment['MYSQL_PORT'],
            'database' => $environment['MYSQL_DATABASE'],
            'username' => $environment['MYSQL_USER'],
            'password' => $environment['MYSQL_PASSWORD'],
        ],
    ];
};