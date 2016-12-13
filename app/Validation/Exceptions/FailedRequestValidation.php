<?php
namespace App\Validation\Exceptions;

use Illuminate\Contracts\Support\MessageBag;

class FailedRequestValidation extends \Exception
{
    /**
     * @var \Illuminate\Contracts\Support\MessageBag
     */
    protected $errors;

    public function __construct($message, MessageBag $errors)
    {
        $this->errors = $errors;

        parent::__construct($message);
    }

    /**
     * @return \Illuminate\Contracts\Support\MessageBag
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
