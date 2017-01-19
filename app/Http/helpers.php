<?php

/**
 * We supply our own instance of the response in order to load
 * our own response class when the response() helper is called.
 *
 * @param  string $content
 * @param  int    $status
 * @param  array  $headers
 *
 * @return \App\Http\JsonResponse
 */
function response($content = '', $status = 200, array $headers = [])
{
    $factory = app('App\Http\ResponseFactory');

    if (func_num_args() === 0) {
        return $factory;
    }

    return $factory->make($content, $status, $headers);
}