<?php
namespace App\Users;

interface UserRepository
{
    /**
     * @param int $id
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function find($id);

    /**
     * @param int $id
     * @param string $token
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function findByIdAndToken($id, $token);

    /**
     * @param string $email
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function findByEmail($email);
}
