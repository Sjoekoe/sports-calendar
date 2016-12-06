<?php
namespace App\Users;

class EloquentUserRepository implements UserRepository
{
    /**
     * @var \App\Users\EloquentUser
     */
    private $user;

    public function __construct(EloquentUser $user)
    {
        $this->user = $user;
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function find($id)
    {
        return $this->user
            ->where('id', $id)
            ->first();
    }

    /**
     * @param int $id
     * @param string $token
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function findByIdAndToken($id, $token)
    {
        return $this->user
            ->where('id', $id)
            ->where('remember_token', $token)
            ->first();
    }

    /**
     * @param string $email
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function findByEmail($email)
    {
        return $this->user
            ->where('email', $email)
            ->first();
    }
}
