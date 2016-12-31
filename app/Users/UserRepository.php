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

    /**
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAllPaginated($limit = 10);

    /**
     * @param array $values
     * @return \App\Users\User
     */
    public function create(array $values);

    /**
     * @param \App\Users\User $user
     * @param array $values
     * @return \App\Users\User
     */
    public function update(User $user, array $values);

    /**
     * @param \App\Users\User $user
     */
    public function delete(User $user);
}
