<?php

namespace App\Http;

use Illuminate\Http\JsonResponse as BaseResponse;

class JsonResponse extends BaseResponse
{
    const HTTP_AUTHENTICATION_TIMEOUT = 419;
    const HTTP_USER_NOT_FOUND = 425;
    const HTTP_TOKEN_INVALID = 498;
    const HTTP_TOKEN_REQUIRED = 499;

    public static $statusTexts = [
        419 => 'Authentication Timeout',
        425 => 'User Not Found',
        498 => 'Token Invalid',
        499 => 'Token Required'
    ];

    /**
     * Sets the response status code.
     *
     * @param int   $code HTTP status code
     * @param mixed $text HTTP status text
     *
     * If the status text is null it will be automatically populated for the known
     * status codes and left empty otherwise.
     *
     * @return Response
     *
     * @throws \InvalidArgumentException When the HTTP status code is not valid
     */
    public function setStatusCode($code, $text = null)
    {
        $this->statusCode = $code = (int) $code;
        if ($this->isInvalid()) {
            throw new \InvalidArgumentException(sprintf('The HTTP status code "%s" is not valid.', $code));
        }

        if (null === $text) {
            if (isset(self::$statusTexts[$code])) {
                $this->statusText = self::$statusTexts[$code];
            } else if (isset(parent::$statusTexts[$code])) {
                $this->statusText = parent::$statusTexts[$code];
            } else {
                $this->statusText = 'Unknown Status';
            }
            return $this;
        }

        if (false === $text) {
            $this->statusText = '';
            return $this;
        }

        $this->statusText = $text;

        return $this;
    }
}