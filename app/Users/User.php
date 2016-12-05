<?php
namespace App\Users;

interface User
{
    const TABLE = 'users';

    /**
     * @return int
     */
    public function id();

    /**
     * @return string
     */
    public function name();

    /**
     * @return string
     */
    public function email();

    /**
     * @return string
     */
    public function rememberToken();

    /**
     * @return string
     */
    public function password();

    /**
     * @return string
     */
    public function phone();

    /**
     * @return string
     */
    public function language();

    /**
     * @return \Carbon\Carbon
     */
    public function lastLogin();

    /**
     * @return bool
     */
    public function isAdmin();

    /**
     * @return \App\Athletes\Athlete[]
     */
    public function athletes();

    /**
     * @return \Carbon\Carbon
     */
    public function createdAt();

    /**
     * @return \Carbon\Carbon
     */
    public function updatedAt();
}
