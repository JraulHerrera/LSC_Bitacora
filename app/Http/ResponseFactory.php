<?php

namespace App\Http;

use JsonSerializable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Routing\ResponseFactory as BaseFactory;

class ResponseFactory extends BaseFactory
{
    /**
     * Return a new JSON response from the application.
     *
     * @param  string|array  $data
     * @param  int  $status
     * @param  array  $headers
     * @param  int  $options
     * @return \App\Http\JsonResponse
     */
    public function json($data = [], $status = 200, array $headers = [], $options = 0)
    {
        if ($data instanceof Arrayable && ! $data instanceof JsonSerializable) {
            $data = $data->toArray();
        }

        return new JsonResponse($data, $status, $headers, $options);
    }
}