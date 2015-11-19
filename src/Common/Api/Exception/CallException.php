<?php
namespace mikemix\Wiziq\Common\API\Exception;

use mikemix\Wiziq\API\Response;

class CallException extends \RuntimeException
{
    public static function from(Response $response)
    {
        return new self(sprintf('%d: %s', $response->getErrorCode(), $response->getErrorMessage()));
    }
}