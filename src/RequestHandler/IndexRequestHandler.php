<?php

declare(strict_types=1);

namespace Schumannl\Slim4Skeleton\RequestHandler;

use PDO;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class IndexRequestHandler
{
    private Twig $view;
    private PDO $pdo;

    public function __construct(
        Twig $view,
        PDO $pdo
    ) {
        $this->view = $view;
        $this->pdo = $pdo;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $statement = $this->pdo->query('SELECT * FROM `transaction` LIMIT 1;');
        $statement->fetchAll();

        $this->view->render($response, 'index.twig');

        return $response;
    }
}