<?php

if ( ! function_exists('initClientSession')) {
    function initClientSession(): void
    {
        $session = session();

        if ( ! $session->has('avegacms')) {
            $session->set('avegacms',
                [
                    'client'  => [

                        'lang'        => [],
                        'user'        => [],
                        'geolocation' => [

                            'city' => ''
                        ],
                        'confirm'     => [

                            'use_cookie' => false,
                            'gdpr'       => false
                        ]
                    ],
                    'modules' => [],
                    'admin'   => []
                ]
            );
        }
    }
}

if ( ! function_exists('arrayToObject')) {
    function arrayToObject(array $array): object
    {
        return (object) array_map(function ($item) {
            if (is_array($item)) {
                return arrayToObject($item);
            }
            return $item;
        }, $array);
    }
}

if ( ! function_exists('getTree')) {
    /**
     * @param  array  $data
     * @return array
     */
    function getTree(array $data = []): array
    {
        $tree = [];

        if ( ! empty($data)) {
            foreach ($data as $id => &$node) {
                if (isset($node['parent'])) {
                    if ( ! $node['parent']) {
                        $tree[$id] = &$node;
                    } else {
                        $data[$node['parent']]['list'][$id] = &$node;
                    }
                }
            }
        }

        return $tree;
    }
}

if ( ! function_exists('settings')) {
    /**
     * Provides a convenience interface to the Settings service.
     *
     * @param  mixed  $value
     *
     * @return array|bool|float|int|object|Settings|string|void|null
     * @phpstan-return ($key is null ? Settings : ($value is null ? array|bool|float|int|object|string|null : void))
     */
    function settings(?string $key = null, $value = null, $config = null)
    {
        /** @var Settings $setting */
        $setting = service('settings');

        if (empty($key)) {
            throw new InvalidArgumentException('$key cannot be empty');
        }

        // Getting the value?
        if (count(func_get_args()) === 1) {
            return $setting->get($key);
        }

        // Setting the value
        $setting->set($key, $value, $config);
    }
}