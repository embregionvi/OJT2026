<?php

namespace App\Services\Administrator;

use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Shield\Models\UserModel;

class UserService
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    /**
     * Get all users with pagination.
     */
    public function getAllUsers(int $perPage = 10)
    {
        return [
            'users' => $this->userModel->paginate($perPage, 'users'),
            'pager' => $this->userModel->pager,
        ];
    }

    /**
     * Get a single user by ID.
     */
    public function getUserById(int $id)
    {
        return $this->userModel->find($id);
    }

    /**
     * Store a new user.
     */
    public function storeUser(array $data)
    {
        $user = new User([
            'username'   => $data['username'],
            'email'      => $data['email'],
            'password'   => $data['password'],
            'first_name' => $data['firstname'] ?? null,
            'last_name'  => $data['lastname'] ?? null,
        ]);

        if (!$this->userModel->save($user)) {
            return false;
        }

        // To get the complete user object with ID, we need to find it again
        $user = $this->userModel->findById($this->userModel->getInsertID());

        // Add to specified group or default
        $group = $data['group'] ?? 'user';
        $user->addGroup($group);

        return true;
    }

    /**
     * Update an existing user.
     */
    public function updateUser(int $id, array $data)
    {
        $user = $this->userModel->find($id);
        if (!$user) {
            return false;
        }

        $user->fill([
            'username'   => $data['username'],
            'email'      => $data['email'],
            'first_name' => $data['firstname'] ?? null,
            'last_name'  => $data['lastname'] ?? null,
        ]);

        if (!empty($data['password'])) {
            $user->setPassword($data['password']);
        }

        if (!$this->userModel->save($user)) {
            return false;
        }

        // Sync groups
        if (!empty($data['group'])) {
            $user->syncGroups($data['group']);
        }

        return true;
    }

    /**
     * Delete a user.
     */
    public function deleteUser(int $id)
    {
        return $this->userModel->delete($id, true);
    }

    /**
     * Toggle user active status.
     */
    public function toggleStatus(int $id)
    {
        $user = $this->userModel->find($id);
        if (!$user) {
            return false;
        }

        if ($user->active) {
            $user->deactivate();
        } else {
            $user->activate();
        }

        return $this->userModel->save($user);
    }
}
