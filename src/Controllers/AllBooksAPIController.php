<?php

namespace App\Controllers;

use App\Models\BooksModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Response;

class AllBooksAPIController
{

    private BooksModel $model;

    public function __construct(BooksModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $books = $this->model->getBooks();
        $responseBody = [
            'message' => 'Books successfully retrieved from database.',
            'status' => 200,
            'data' => $books
        ];
        return $response->withJson($responseBody);
    }

}