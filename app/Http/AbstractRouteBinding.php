<?php
namespace App\Http;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

abstract class AbstractRouteBinding
{
    public function bind($value)
    {
        if ($entity = $this->find($value)) {
            return $entity;
        }

        throw new NotFoundHttpException();
    }
}
