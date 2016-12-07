<?php
namespace App\Database;

class InvalidModelException extends \Exception
{
    /**
     * @param string $model
     * @return static
     */
    public static function notRegistered($model)
    {
        return new static("The model [$model] is not registered with the current factory.");
    }
}
