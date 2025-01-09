<?php

namespace App\Services;

use App\Contracts\Registerable;
use App\Models\District;
use App\Models\Region;
use App\Models\School;
use App\Models\State;
use App\Models\User;

class UserService
{
    /**
     * Create a new user.
     */
    public function createUser(array $data): User
    {
        return User::create($data);
    }

    /**
     * Update an user's data.
     */
    public function updateUser(User $user, array $data): User
    {
        $user->update($data);

        return $user;
    }


    /**
     * Get all users.
     */
    public function getUsers(array $filters)
    {
        $query = User::query();

        if (isset($filters['type'])) {
            $query->where('type', $filters['type']);
        }


        return $query->paginate(config('app.pagination.per_page'));
    }

    /**
     * Search users by name or email.
     */
    public function searchUsers(string $search, array $filters)
    {
        $query = User::search($search);

        if (isset($filters['type'])) {
            $query->where('type', $filters['type']);
        }


        return $query->paginate(config('app.pagination.per_page'));
    }
}
