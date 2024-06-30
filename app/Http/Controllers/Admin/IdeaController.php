<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brain;

class IdeaController extends Controller
{
    public function index()
    {
        $brains = Brain::latest()->paginate(5);

        return view('admin.ideas.index', compact('brains'));
    }
}
