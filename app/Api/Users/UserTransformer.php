<?php
namespace App\Api\Users;

use App\Users\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * @param \App\Users\User $user
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id' => $user->id(),
            'name' => $user->name(),
            'email' => $user->email(),
            'last_login' => $user->lastLogin()->toIso8601String(),
            'language' => $user->language(),
            'phone' => $user->phone(),
            'created_at' => $user->createdAt()->toIso8601String(),
            'updated_at' => $user->updatedAt()->toIso8601String(),
        ];
    }
}
