<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use \Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // Get token from session
        $token = session()->get('token');


        // $token = $request->getHeaderLine('Authorization');

        if (!$token) {
            return service('response')->setStatusCode(401)->setJSON([
                'status' => 401,
                'message' => 'Unauthorized',
                'data' => []
            ]);
        }

        $key = getenv('JWT_SECRET');

        // // Extract
        $token = explode(" ", $token)[1];

        try {
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            return $request;
        } catch (\Exception $e) {
            return service('response')->setStatusCode(401)->setJSON([
                'status' => 401,
                'message' => 'Unauthorized',
                'data' => []
            ]);
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
