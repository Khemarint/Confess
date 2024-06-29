<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {

        $users = User::latest()->paginate(5);
        return view('admin.users.index',compact('users'));
    }
}
