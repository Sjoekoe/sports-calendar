<?php
namespace App\Plans;

interface Plan
{
    const TABLE = 'plans';

    /**
     * @return int
     */
    public function id();

    /**
     * @return mixed
     */
    public function name();

    /**
     * @return mixed
     */
    public function price();

    /**
     * @return \Carbon\Carbon
     */
    public function createdAt();

    /**
     * @return \Carbon\Carbon
     */
    public function updatedAt();
}
