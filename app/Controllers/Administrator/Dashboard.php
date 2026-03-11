<?php

namespace App\Controllers\Administrator;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    /**
     * Display the Administrator Dashboard.
     */
    public function index()
    {
        $data = [
            'title' => 'Administrator Dashboard',
            'user'  => auth()->user(),
        ];

        return view('Administrator/dashboard', $data);
    }
}
