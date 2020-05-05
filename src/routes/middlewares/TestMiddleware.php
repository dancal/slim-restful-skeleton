<?php

namespace Routes;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Psr\Http\Message\ResponseInterface as Response;

class TestMiddleware {

    /** 
     * @param Request $request
     * @param RequestHandler $handler
     * @return Response
     */
    public function __invoke(Request $request, RequestHandler $handler): Response {
        $response = $handler->handle($request);
        echo '<p>Successfully passed in TestMiddleware</p>';
        return $response;
    }
}