<?php
use Symfony\Component\HttpFoundation\Request;

return [
    ['httpMethod' => Request::METHOD_GET, 'route' => '/', 'handler' => 'App\Actions\getMessage'],
    ['httpMethod' => Request::METHOD_GET, 'route' => '/user/{id:\d+}', 'handler' => 'App\Actions\getUserHandler']
];