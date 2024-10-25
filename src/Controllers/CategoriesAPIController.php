<?php

namespace App\Controllers;

use App\Models\BooksModel;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\RequestInterface;

class CategoriesAPIController
{

    private BooksModel $model;

    public function __construct(BooksModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response)
    {
        $categories = $this->model->getCategories();
        $responseBody = [
            'message' => 'Successfully retrieved categories.',
            'status' => 200,
            'data' => $categories
        ];
        return $response->withHeader('access-control-allow-origin', '*')->withJson($responseBody);
    }
}