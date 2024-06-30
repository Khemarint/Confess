<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Brain;
use App\Models\Comment;

class DashboardController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $totalUsers = User::count();
        $totalIdeas = Brain::count();
        $totalComments = Comment::count();
        return view('admin.dashboard',
    compact('totalUsers','totalIdeas','totalComments'));
    }
}
