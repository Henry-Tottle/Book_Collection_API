<?php

namespace App\Controllers;

use App\Models\BooksModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class HighestRatedBooksAPIController
{
    private BooksModel $model;
    public function __construct(BooksModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $highestRatedBooks = $this->model->getHighestRatedBooks();
        $responseBody = [
            'message' => 'Successfully retrieved highest rated books.',
            'status' => 200,
            'data' => $highestRatedBooks
        ];
        return $response->withHeader('Access-Control-Allow-Origin', '*')->withJson($responseBody);
    }
}