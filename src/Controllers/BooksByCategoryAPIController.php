<?php

namespace App\Controllers;

use App\Models\BooksModel;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class BooksByCategoryAPIController
{
    private BooksModel $model;
    public function __construct(BooksModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, $args)
    {
        $booksByCategory = $this->model->getBooksByCategory($args['category']);
        $responseBody = [
            'message' => 'Successfully retrieved books by category.',
            'status' => 200,
            'data' => $booksByCategory
        ];
        return $response->withHeader('Access-Control-Allow-Origin', '*')->withJson($responseBody);
    }
}