<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    // Show the dashboard
    public function index()
    {

        return view('pages.backend.dashboard');
    }

    public function users()
    {
        $users = User::orderBy('name', 'asc')->paginate(15);

        return view('pages.backend.users.index', compact('users'));
    }
}
