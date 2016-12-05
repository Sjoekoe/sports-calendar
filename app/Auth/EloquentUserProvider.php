<?php
namespace App\Auth;

use App\Teams\Team;
use App\Teams\TeamRepository;
use App\Users\UserRepository;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Hashing\Hasher;

class EloquentUserProvider implements UserProviderInterface
{
    /**
     * @var \Illuminate\Contracts\Hashing\Hasher
     */
    private $hasher;

    /**
     * @var \App\Users\UserRepository
     */
    private $users;

    /**
     * @var \App\Teams\TeamRepository
     */
    private $teams;

    public function __construct(Hasher $hasher, UserRepository $users, TeamRepository $teams)
    {
        $this->hasher = $hasher;
        $this->users = $users;
        $this->teams = $teams;
    }

    /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed $identifier
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($identifier)
    {
        return $identifier ? $this->users->find($identifier) : null;
    }

    /**
     * Retrieve a user by their unique identifier and "remember me" token.
     *
     * @param  mixed $identifier
     * @param  string $token
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByToken($identifier, $token)
    {
        return $identifier ? $this->users->findByIdAndToken($identifier, $token) : null;
    }

    /**
     * Update the "remember me" token for the given user in storage.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @param  string $token
     * @return void
     */
    public function updateRememberToken(Authenticatable $user, $token)
    {
        $user->setRememberToken($token);

        $user->save();
    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array $credentials
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        $criteria = [];

        foreach ($credentials as $key => $value) {
            if (! str_contains($key, 'password')) {
                $criteria[$key] = $value;
            }
        }

        $email = array_get($criteria, 'email');

        return $email ? $this->users->findByEmail($email) : null;
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @param  array $credentials
     * @return bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        return $this->hasher->check($credentials['password'], $user->getAuthPassword());
    }

    /**
     * @param int $identifier
     * @return \App\Teams\Team
     */
    public function retrieveTeamById($identifier)
    {
        return $this->teams->find($identifier);
    }

    /**
     * @param \App\Teams\Team $team
     */
    public function updateLastTeamLogin(Team $team)
    {
        return;
    }
}
