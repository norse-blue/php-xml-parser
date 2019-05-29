<?php

namespace NorseBlue\Xmlify\Exceptions;

use RuntimeException;
use Throwable;

abstract class PathException extends RuntimeException
{
    protected $path;

    public function __construct($path = '', $message = '', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->path = $path;
    }

    public function getPath(): string
    {
        return $this->path;
    }
}
