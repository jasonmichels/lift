<?php declare(strict_types=1);

/**
 * Actions that this application will use, just like controller actions
 */
namespace App\Actions {

    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\HttpFoundation\Request;
    use Lift\Framework\Http\Response;

    /**
     * Get a message for testing
     *
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    function getMessage(Request $request): JsonResponse {
        $response = Response\json();
        $response->setData(['message' => 'Welcome To Lift!']);
        return $response;
    }

    /**
     * Get the users information
     *
     * @param Request $request
     * @param array $args
     * @return JsonResponse
     * @throws \Exception
     */
    function getUserHandler (Request $request, array $args): JsonResponse {
        $response = Response\json();
        $response->setData(['userId' => $args['id'], 'name' => 'Jason Michels']);
        return $response;
    }
}
