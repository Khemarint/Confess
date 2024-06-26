<?php

namespace App\Http\Controllers;

use App\Models\Brain;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $brains = Brain::orderBy("created_at", "desc");

        if (request()->has("search")) {
            $brains = $brains->where("content", "LIKE", "%" . request()->get('search', '') . '%');
        }

        // This is record
        return view("dashboard", [
            'brains' => $brains->paginate(2)
        ]);
    }
}
