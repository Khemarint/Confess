<?php

namespace App\Http\Controllers;

use App\Models\Brain;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $brains = Brain::when(request()->has('search'), function ($query) {
            $query->search(request('search',''));
        })->orderBy('created_at','desc')->paginate(5);
        // This is record
        return view("dashboard", [
            'brains' => $brains,
        ]);
    }
}
