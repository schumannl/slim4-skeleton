<?php

declare(strict_types=1);

namespace Sumi\TransactionDetails\Request;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class IndexRequestHandler
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $body = $response->getBody();
        $body->write('Index page');

        $response->withStatus(200)->withBody($body);

        return $response;
    }
}