<?php declare(strict_types=1);

use Lift\Framework\App;
use Lift\Framework\Exceptions\MethodNotAllowed;
use Lift\Framework\Exceptions\NotFound;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * @param Throwable $exception
 * @return Response
 * @throws Exception
 */
function lift_exception_handler(\Throwable $exception): Response {
    $response = new JsonResponse();
    if ($exception instanceof MethodNotAllowed || $exception instanceof NotFound) {
        $data = [
            'errors' => [
                [
                    'status' => $exception->getHttpStatus(),
                    'title'  => $exception->getTitle(),
                    'detail' => $exception->getMessage()
                ]
            ]
        ];
        $response->setStatusCode($exception->getHttpStatus());
    } else {
        $data = [
            'errors' => [
                [
                    'status' => 500,
                    'title'  => 'Error processing request',
                    'detail' => $exception->getMessage()
                ]
            ]
        ];
        $response->setStatusCode(500);
    }
    $response->setData($data);
    return $response->send();
}
set_exception_handler('lift_exception_handler');

return new App();