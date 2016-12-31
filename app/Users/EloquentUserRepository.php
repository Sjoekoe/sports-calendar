<?php
namespace App\Users;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

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

    /**
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAllPaginated($limit = 10)
    {
        return $this->user
            ->paginate($limit);
    }

    /**
     * @param array $values
     * @return \App\Users\User
     */
    public function create(array $values)
    {
        $user = new EloquentUser();
        $user->name = $values['name'];
        $user->phone = '';
        $user->language = 'nl';
        $user->password = Hash::make($values['password']);
        $user->is_admin = false;
        $user->email = $values['email'];
        $user->last_login = Carbon::now();

        $user->save();

        return $user;
    }

    /**
     * @param \App\Users\User $user
     * @param array $values
     * @return \App\Users\User
     */
    public function update(User $user, array $values)
    {
        $user->name = $values['name'];
        $user->email = $values['email'];

        if (array_key_exists('phone', $values)) {
            $user->phone = $values['phone'];
        };

        if (array_key_exists('language', $values)) {
            $user->language = $values['language'];
        };

        $user->save();

        return $user;
    }

    /**
     * @param \App\Users\User $user
     */
    public function delete(User $user)
    {
        $user->delete();
    }
}
