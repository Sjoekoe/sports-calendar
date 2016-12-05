<?php
namespace App\Athletes;

interface Athlete
{
    const TABLE = 'athletes';

    /**
     * @return int
     */
    public function id();

    /**
     * @return string
     */
    public function name();

    /**
     * @return \Carbon\Carbon
     */
    public function birthday();

    /**
     * @return string
     */
    public function email();

    /**
     * @return string
     */
    public function phone();

    /**
     * @return \App\Users\User
     */
    public function user();

    /**
     * @return \Carbon\Carbon
     */
    public function createdAt();

    /**
     * @return \Carbon\Carbon
     */
    public function updatedAt();
}
