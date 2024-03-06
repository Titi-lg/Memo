<?php

namespace App\Exceptions;
use Exception;
use Throwable;

class MonException extends Exception
{
    protected $message = 'Unknown exception'; // exception message
    private $string; // __toString cache
    protected $code = 0; // user defined exception code
    private $trade;
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        if(empty($message)){
            throw new $this('Unknown', get_class($this));
        }
        parent::__construct($message, $code);
    }
    public function __toString()
    {
        return get_class($this) . " '{$this->message}' in {$this->file}({$this->line})\n"
            . "{$this->getTraceAsString()}";
    }
}
?>
