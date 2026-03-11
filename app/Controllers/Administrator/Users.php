<?php

namespace App\Controllers\Administrator;

use App\Controllers\BaseController;
use App\Services\Administrator\UserService;

class Users extends BaseController
{
    protected $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    /**
     * List all users.
     */
    public function index()
    {
        $data = $this->userService->getAllUsers();
        return view('Administrator/users/list', $data);
    }

    /**
     * Show create user form.
     */
    public function create()
    {
        $data = [
            'title'  => 'Create New User',
            'user'   => null,
            'groups' => config('AuthGroups')->groups,
        ];
        return view('Administrator/users/form', $data);
    }

    /**
     * Store a new user.
     */
    public function store()
    {
        $rules = [
            'username' => 'required|is_unique[users.username]|min_length[3]|max_length[30]',
            'email'    => 'required|valid_email|is_unique[auth_identities.secret]',
            'password' => 'required|min_length[8]',
            'group'    => 'required|string',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if ($this->userService->storeUser($this->request->getPost())) {
            return redirect()->to('/administrator/users')->with('message', 'User created successfully.');
        }

        return redirect()->back()->withInput()->with('error', 'Failed to create user.');
    }

    /**
     * Show edit user form.
     */
    public function edit(int $id)
    {
        $user = $this->userService->getUserById($id);
        if (!$user) {
            return redirect()->to('/administrator/users')->with('error', 'User not found.');
        }

        $data = [
            'title'  => 'Edit User: ' . $user->username,
            'user'   => $user,
            'groups' => config('AuthGroups')->groups,
        ];
        return view('Administrator/users/form', $data);
    }

    /**
     * Update an existing user.
     */
    public function update(int $id)
    {
        $rules = [
            'username' => "required|is_unique[users.username,id,{$id}]|min_length[3]|max_length[30]",
            'email'    => "required|valid_email|is_unique[auth_identities.secret,user_id,{$id}]",
            'group'    => 'required|string',
        ];

        if (!empty($this->request->getPost('password'))) {
            $rules['password'] = 'min_length[8]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if ($this->userService->updateUser($id, $this->request->getPost())) {
            return redirect()->to('/administrator/users')->with('message', 'User updated successfully.');
        }

        return redirect()->back()->withInput()->with('error', 'Failed to update user.');
    }

    /**
     * Delete a user.
     */
    public function delete(int $id)
    {
        if ($this->userService->deleteUser($id)) {
            return redirect()->to('/administrator/users')->with('message', 'User deleted successfully.');
        }

        return redirect()->to('/administrator/users')->with('error', 'Failed to delete user.');
    }

    /**
     * Toggle user active status.
     */
    public function toggle(int $id)
    {
        if ($this->userService->toggleStatus($id)) {
            return redirect()->to('/administrator/users')->with('message', 'User status updated successfully.');
        }

        return redirect()->to('/administrator/users')->with('error', 'Failed to update user status.');
    }
}
