<?php

namespace AvegaCms\Filters;

use AvegaCms\Utilities\Cms;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use ReflectionException;

class CorsFilter implements FilterInterface
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
     * @param  RequestInterface  $request
     * @param  array|null  $arguments
     *
     * @return RequestInterface|ResponseInterface|string|void
     * @throws ReflectionException
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        if (false && Cms::settings('core.auth.useCors')) {
            // Если предполётный запрос, то быстро формируем ответ
            if (strtoupper($request->getMethod()) === 'OPTIONS') {
                return service('response')->setHeader('Access-Control-Allow-Origin', '*')
                    ->setHeader('Access-Control-Allow-Credentials', 'true')
                    ->setHeader(
                        'Access-Control-Allow-Headers',
                        [
                            'X-API-KEY',
                            'Origin',
                            'DNT',
                            'X-Auth-Token',
                            'X-Requested-With',
                            'X-CustomHeader',
                            'Content-Type',
                            'Content-Length',
                            'Accept',
                            'Access-Control-Request-Method',
                            'Authorization',
                            'Keep-Alive',
                            'User-Agent',
                            'If-Modified-Since',
                            'Cache-Control',
                            'Content-Range',
                            'Range'
                        ]
                    )
                    ->setHeader('Access-Control-Allow-Methods', ['GET', 'PATCH', 'POST', 'PUT', 'OPTIONS', 'DELETE'])
                    ->setStatusCode(200);
            }

            /*
            // Проверяем заголовок Origin для разрешенного источника
            $allowedOrigins = ['http://example.com', 'https://example.com'];
            $origin = $request->getHeaderLine('Origin');

            // Если Origin не в списке разрешенных, то отвечаем ошибкой или другим кодом
            if (!in_array($origin, $allowedOrigins)) {
                return service('response')->setStatusCode(403); // Отправляем код 403 (Forbidden)
            }
            */
            Services::response()->setHeader('Access-Control-Allow-Origin', '*');
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param  RequestInterface  $request
     * @param  ResponseInterface  $response
     * @param  array|null  $arguments
     *
     * @return ResponseInterface|void
     * @throws ReflectionException
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (Cms::settings('core.auth.useCors')) {
            return $response->setHeader('Access-Control-Allow-Origin', '*')
                ->setHeader('Access-Control-Allow-Credentials', 'true')
                ->setHeader(
                    'Access-Control-Allow-Headers',
                    [
                        'X-API-KEY',
                        'Origin',
                        'DNT',
                        'X-Auth-Token',
                        'X-Requested-With',
                        'X-CustomHeader',
                        'Content-Type',
                        'Content-Length',
                        'Accept',
                        'Access-Control-Request-Method',
                        'Authorization',
                        'Keep-Alive',
                        'User-Agent',
                        'If-Modified-Since',
                        'Cache-Control',
                        'Content-Range',
                        'Range'
                    ]
                )
                ->setHeader('Access-Control-Allow-Methods', ['GET', 'PATCH', 'POST', 'PUT', 'OPTIONS', 'DELETE'])
                ->setStatusCode(200);
        }
    }
}
